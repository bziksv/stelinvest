<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arParams["POPUP_POSITION"] = (isset($arParams["POPUP_POSITION"]) && in_array($arParams["POPUP_POSITION"], array("left", "right"))) ? $arParams["POPUP_POSITION"] : "left";

use Bitrix\Main\Loader;
Loader::includeModule("iblock");

$idPropsQueuesId = 50; // свойство очереди
$idPropsBuild = 49; // свойство жк
$arElementBuilds = []; // список комплексов и их очередей
$arQueuesId = []; // id очередей

//получаем id очередей для жк 
$arFilterObjectElement = array(
     'IBLOCK_ID' => IBLOCK_OBJECT_ID,
     "ID" => array_keys($arResult["ITEMS"][$idPropsBuild]["VALUES"]),
     "ACTIVE" => "Y",
     "GLOBAL_ACTIVE" => "Y"
 );
$rsElement = CIBlockElement::GetList(array('id' => 'asc'), $arFilterObjectElement, false, false, array("ID", "IBLOCK_ID", "NAME", "CODE", "PROPERTY_QUEUE"));
while($arEl = $rsElement->Fetch()){
   $arElementBuilds[$arEl["ID"]] = $arEl["PROPERTY_QUEUE_VALUE"];
   if(is_array($arEl["PROPERTY_QUEUE_VALUE"]) && !empty($arEl["PROPERTY_QUEUE_VALUE"])){
       $arQueuesId = array_merge($arQueuesId, $arEl["PROPERTY_QUEUE_VALUE"]);
   }
}

$arQueues = []; // массив данных очередей
// получаем данные очередей и связываем с жк
if(!empty($arQueuesId)){
    $arFilter = array('IBLOCK_ID' => IBLOCK_APARTAMENT_ID, "ACTIVE" => "Y", 
       "GLOBAL_ACTIVE" => "Y",  "ID" => $arQueuesId);
    $rsSections = CIBlockSection::GetList(
           array("SORT" => "ASC"), 
           $arFilter, 
           false, 
           array("IBLOCK_ID", "ID", "CODE", "NAME"), 
           false
       );
    while($arSection = $rsSections->GetNext()) {
        foreach ($arElementBuilds as $id => $arIdQueues) {
            if(in_array($arSection["ID"], $arIdQueues)){
                $arSection["BUILD_ID"] = $id;
            }
        }
       $arQueues[$arSection["ID"]] = $arSection; 
    }
}

$arResult["ITEMS"][$idPropsQueuesId]["QUEUES"] = $arQueues;

foreach($arResult["ITEMS"] as $key => $arItem){

	if (!$arItem['VALUES']) {
		$arItem['VALUES'] = [];
	}

    if($arItem['PROPERTY_TYPE'] != "N" && count($arItem['VALUES']) > 1){

        $keys = array_keys($arItem['VALUES']);
        $key_value = $keys[array_rand($keys,1)];
        $name_value = $arItem['VALUES'][$key_value]['VALUE'];
        $url_value = $arItem['VALUES'][$key_value]['URL_ID'];

        $full_name = $arItem['NAME'].' '.$name_value;
        $SEF_RULE = str_replace('/#SECTION_CODE_PATH#',"",$arParams['SEF_RULE']);
        $full_url = str_replace('#SMART_FILTER_PATH#',mb_strtolower($arItem['CODE']).'-is-'.$url_value,$SEF_RULE);

        $arResult["RELATED_REQUEST"][$arItem["ID"]] = array(
            "NAME" => $full_name,
            "URL" => $full_url
        );
    }
}



global $sotbitFilterResult;
$sotbitFilterResult = $arResult;


