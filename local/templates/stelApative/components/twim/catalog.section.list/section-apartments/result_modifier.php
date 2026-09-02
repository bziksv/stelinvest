<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
/**
 * DEPTH_LEVEL 0 - список квартир
 * DEPTH_LEVEL 1 - переход к объекту
 * DEPTH_LEVEL 2 - страница очереди
 * DEPTH_LEVEL 3 - подъезд 
 * DEPTH_LEVEL 4 - этаж 
 */
 
// получаем активный раздел, по уровню определяем тип выводимых данных
$arResult["TYPE_PAGE"] = "queue"; // тип страницы
switch ($arResult["SECTION"]["DEPTH_LEVEL"]) {
    case 1:
        $arResult["TYPE_PAGE"] = "build"; // переход на страницу объект
        break;
    case 2:
        $arResult["TYPE_PAGE"] = "queue"; // страница очереди
        break;
    case 3:
        $arResult["TYPE_PAGE"] = "entrance"; //переход с  подъезд на первый активный этаж
        break;
    case 4:
        $arResult["TYPE_PAGE"] = "floor"; // страница этаж
        break;
    default:
        $arResult["TYPE_PAGE"] = "build"; // если неизвестно, то переход на объект или можно 404 ошибку 
        break;
} 
// get Picture
if($arResult["SECTION"]["PICTURE"]){
    $arResult["SECTION"]["PICTURE"] = CFile::GetFileArray($arResult["SECTION"]["PICTURE"]);
}
// получение  дерево разделов вверх, первый раздел имеет ссылку на объект
$arSelectQueue = []; // активная очередь
$arSelectEntrance = []; // активный подъезд
$arSelectFloor = []; // активный этаж
foreach ($arResult["SECTION"]["PATH"] as $arSectionPath) {
    if($arSectionPath["DEPTH_LEVEL"] == 1){
        $arUF = $GLOBALS["USER_FIELD_MANAGER"]->GetUserFields("IBLOCK_".$arResult["SECTION"]["IBLOCK_ID"]."_SECTION", $arSectionPath["ID"]);
        $arResult["BUILD_ID"] = $arUF["UF_BUILD"]["VALUE"];  // ссылка на ID объекта
    }
    if($arResult["TYPE_PAGE"] == "queue"){ // если очередь
        if($arSectionPath["DEPTH_LEVEL"] == 2){
            $arSelectQueue = $arSectionPath; // данные текущей очереди
        }
    } elseif($arResult["TYPE_PAGE"] == "entrance"){ // если подъезд
        if($arSectionPath["DEPTH_LEVEL"] == 2){
            $arSelectQueue = $arSectionPath; // получаем данные очереди
        }
        if($arSectionPath["ID"] == $arResult["SECTION"]["ID"]){
            $arSelectEntrance = $arSectionPath; // получаем данные текущего подъезда
        }   
    }elseif($arResult["TYPE_PAGE"] == "floor"){  // если подъезд этаж
        if($arSectionPath["DEPTH_LEVEL"] == 2){
            $arSelectQueue = $arSectionPath; // получаем данные очереди
        }
        if($arSectionPath["DEPTH_LEVEL"] == 3){
            $arSelectEntrance = $arSectionPath; // получаем данные текущего подъезда
        }
        if($arSectionPath["ID"] == $arResult["SECTION"]["ID"]){
            $arSelectFloor = $arSectionPath; // получаем данные текущего этаж
        }
    } 
}
$arResult["QUEUES"] = []; // очередь
$arResult["ENTRANCES"] = []; // подезды
$arResult["FLOORS"] = []; // этажи
// получение дерева разделов, для построения ссылок и карты изображения
if(!empty($arSelectQueue)){
    $arFilter = array(
        'IBLOCK_ID' => $arSelectQueue['IBLOCK_ID'], 
        "ACTIVE" => "Y", "GLOBAL_ACTIVE" => "Y", 
        'LEFT_MARGIN' => $arSelectQueue['LEFT_MARGIN'], 
        'RIGHT_MARGIN' => $arSelectQueue['RIGHT_MARGIN']
            );
    $rsSections = CIBlockSection::GetList(
            array("LEFT_MARGIN" => "ASC"), 
            $arFilter, 
            false, 
            array("IBLOCK_ID", "ID", "SECTION_PAGE_URL", "NAME", "DEPTH_LEVEL", "IBLOCK_SECTION_ID", "UF_*"), 
            false
        );
    while($arSection = $rsSections->GetNext()) {
        switch ($arSection["DEPTH_LEVEL"]) {
            case 3:
                $arResult["ENTRANCES"][$arSection["ID"]] = $arSection;  
                break;
            case 4:
                $arResult["FLOORS"][$arSection["ID"]] = $arSection;   
                break;
            default:
                break;
        }
    }
}
//если ссылка на квартиру
if($arParams["ELEMENT_ID"] > 0 || !empty($arParams["SECTION_CODE"])){
    $arResult["TYPE_PAGE"] = "apartament"; // детальная квартиры
}
if($arResult["TYPE_PAGE"] == "build" && isset($arResult["BUILD_ID"])){ //если страница объекта
    // получаем ссылку на объект и сохраняем ее
    $arFilterObjectElement = array(
        'IBLOCK_ID' => IBLOCK_OBJECT_ID,
        "ID" => intval($arResult["SECTION"]["UF_BUILD"]),
        "ACTIVE" => "Y",
        "GLOBAL_ACTIVE" => "Y"
    );
    $rsElement = CIBlockElement::GetList(array('id' => 'asc'), $arFilterObjectElement, false, false, array("ID", "NAME", "CODE", "DETAIL_PAGE_URL"));
    while($arEl = $rsElement->GetNext()){
        $arResult["REDIRECT_LINK"] = $arEl["DETAIL_PAGE_URL"];
        break;
    }
} elseif($arResult["TYPE_PAGE"] == "queue"){ //если ссылка на очередь
    $arFilter = array('IBLOCK_ID' => 
        $arSelectQueue['IBLOCK_ID'], "ACTIVE" => "Y", 
        "GLOBAL_ACTIVE" => "Y", 'DEPTH_LEVEL' => $arSelectQueue['DEPTH_LEVEL'], 
        "SECTION_ID" => $arSelectQueue['IBLOCK_SECTION_ID']);
    $rsSections = CIBlockSection::GetList(
            array("SORT" => "ASC"), 
            $arFilter, 
            false, 
            array("IBLOCK_ID", "ID", "SECTION_PAGE_URL", "NAME", "DEPTH_LEVEL"), 
            false
        );
    while($arSection = $rsSections->GetNext()) {
        $arResult["QUEUES"][$arSection["ID"]] = $arSection; 
    }
    $arResult["arJsonFloors"] = []; // массив для карты изображения
    // выборка активных этажей 
    foreach ($arResult["FLOORS"] as $idFloor => $arFloor) {
        if(array_key_exists($arFloor["IBLOCK_SECTION_ID"], $arResult["ENTRANCES"])){
            $arResult["ENTRANCES"][$arFloor["IBLOCK_SECTION_ID"]]["FLOORS"][$idFloor] = $arFloor;
            $arResult["arJsonFloors"][] = [
                'id'=> $arFloor["ID"],
                'title'=> $arFloor["NAME"],
                'coord'=> $arFloor["UF_QUEUE_COORD"],
                'link'=> $arFloor["SECTION_PAGE_URL"],
                'code'=> $arFloor["CODE"]
            ];
        }
    }
    //установка ссылки для подъезда на первый активный этаж
    foreach ($arResult["ENTRANCES"] as $idEntance => $arEntance) {
        $firstFloor = current($arEntance["FLOORS"]); 
        $arResult["ENTRANCES"][$idEntance]["SECTION_PAGE_URL"] = $firstFloor["SECTION_PAGE_URL"];
    }
} elseif($arResult["TYPE_PAGE"] == "entrance"){ // если ссылка на подъезд
    // переход на первый доступный этаж
    foreach ($arResult["FLOORS"] as $idFloor => $arFloor) {
        if($arFloor["IBLOCK_SECTION_ID"] == $arResult["SECTION"]["ID"]){
            $arResult["REDIRECT_LINK"] = $arFloor["SECTION_PAGE_URL"];
            break;
        }
    }
} elseif($arResult["TYPE_PAGE"] == "floor"){ // если ссылка на этаж
    $arResult["QUEUE"] = $arSelectQueue;
    $arResult["SELECTED_FLOOR"] = $arResult["FLOORS"][$arSelectFloor["ID"]];
    // положение компаса
    if($arResult["FLOORS"][$arSelectFloor["ID"]]["UF_COMPAS_DIRECTION"]){
        $rsEnum = CUserFieldEnum::GetList(array(), array("ID" =>$arResult["FLOORS"][$arSelectFloor["ID"]]["UF_COMPAS_DIRECTION"]));
        if($arEnum = $rsEnum->GetNext()){
            $arResult["FLOOR_COMPAS_DIRECTION"] = $arEnum["XML_ID"];
        }
    } 
    // выборка активных этажей 
    foreach ($arResult["FLOORS"] as $idFloor => $arFloor) {
        if(array_key_exists($arFloor["IBLOCK_SECTION_ID"], $arResult["ENTRANCES"])){
            $arResult["ENTRANCES"][$arFloor["IBLOCK_SECTION_ID"]]["FLOORS"][$idFloor] = $arFloor;
            if($arFloor["ID"] == $arResult["SELECTED_FLOOR"]["ID"]){
                $arResult["SELECTED_ENTRANCES"] = $arResult["ENTRANCES"][$arFloor["IBLOCK_SECTION_ID"]]; // активный подъезд
            }
        }
    }
    // список квартир
    $arResult["APARTAMETS"] = [];
    $arResult["arJsonApartaments"] = [];
    $arSelect = Array("IBLOCK_ID", "ID", "NAME", 
        "DATE_ACTIVE_FROM", "PROPERTY_COORD", "PROPERTY_SHOW_LABEL_SOLD", 
        "PROPERTY_SOLD", "PROPERTY_HIDE_LINK", "DETAIL_PAGE_URL");
    $arFilter = Array(
        "IBLOCK_ID"=>IntVal($arSelectFloor["IBLOCK_ID"]), 
        "SECTION_ID" => $arResult["SELECTED_FLOOR"]["ID"], 
        "NCLUDE_SUBSECTIONS" => "N", 
        "SECTION_GLOBAL_ACTIVE" => "Y", 
        "ACTIVE_DATE"=>"Y", 
        "ACTIVE"=>"Y"
        );
    $res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, $arSelect);
    while($arElement = $res->GetNext()){
        $arResult["APARTAMETS"][$arElement["ID"]] = $arElement;
        $arResult["arJsonApartaments"][] = [
            'id'=> $arElement["ID"],
            'title'=> ($arElement["PROPERTY_SHOW_LABEL_SOLD_VALUE"] == "Y") ? getMessage("LABEL_SALE") : $arElement["NAME"],
            'coord'=> $arElement["PROPERTY_COORD_VALUE"],
            'link'=> $arElement["DETAIL_PAGE_URL"],
            'code'=> $arElement["CODE"],
            "sold"=> $arElement["PROPERTY_SOLD_VALUE"],
            "hide_link"=> $arElement["PROPERTY_HIDE_LINK_VALUE"],
            "show_label_sold"=> $arElement["PROPERTY_SHOW_LABEL_SOLD_VALUE"]
        ];  
    }
} elseif($arResult["TYPE_PAGE"] == "apartament"){ // если ссылка на квартиру
    $arResult["QUEUE"] = $arSelectQueue;
    $arResult["SELECTED_FLOOR"] = $arResult["FLOORS"][$arSelectFloor["ID"]];
    // выборка активных этажей 
    foreach ($arResult["FLOORS"] as $idFloor => $arFloor) {
        if(array_key_exists($arFloor["IBLOCK_SECTION_ID"], $arResult["ENTRANCES"])){
            $arResult["ENTRANCES"][$arFloor["IBLOCK_SECTION_ID"]]["FLOORS"][$idFloor] = $arFloor;
            if($arFloor["ID"] == $arResult["SELECTED_FLOOR"]["ID"]){
                $arResult["SELECTED_ENTRANCES"] = $arResult["ENTRANCES"][$arFloor["IBLOCK_SECTION_ID"]]; // активный подъезд
            }
        }
    }
}
//сохраяем в кеш ссылку для редиректа и ID объекта для передачи на странице
$cp = $this->__component; 
if($arResult["BUILD_ID"]){
    if (is_object($cp)){
        $cp->arResult['REDIRECT_LINK'] = $arResult["REDIRECT_LINK"];
        $cp->arResult['BUILD_ID'] = $arResult["BUILD_ID"];
        $cp->SetResultCacheKeys(array('BUILD_ID', 'REDIRECT_LINK'));
    }
}  
