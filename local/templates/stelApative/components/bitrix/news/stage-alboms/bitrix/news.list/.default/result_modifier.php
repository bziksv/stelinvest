<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
//images photos
foreach($arResult["ITEMS"] as $key => $arItem){ 
    $arResult["ITEMS"][$key]["PICTURE"] = [];
    if(count($arItem["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"]) > 0){
        if(count($arItem["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"]) == 1){
            $arItem["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"] = [$arItem["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"]];
        }
        $firstPic = current($arItem["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"]);
        //trumb medium
        $file_md = CFile::ResizeImageGet($firstPic["ID"], array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_md['src'])){ $file_md["src"] = $firstPic["SRC"]; } 
        $arResult["ITEMS"][$key]["PICTURE"]["SM"] = $file_md;
        //trumb large
        $file_lg = CFile::ResizeImageGet($firstPic["ID"], array('width'=>1280, 'height'=>960), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_lg['src'])){ $file_lg["src"] = $firstPic["SRC"]; } 
        $arResult["ITEMS"][$key]["PICTURE"]["LG"] = $file_lg;
    }
}
//get back link
$sectionId = $arResult["SECTION"]["PATH"][0];
if($sectionId){
    $arUF = $GLOBALS["USER_FIELD_MANAGER"]->GetUserFields("IBLOCK_".$sectionId["IBLOCK_ID"]."_SECTION", $sectionId["ID"]);
    if($arUF["UF_OBJECT"]["VALUE"] > 0){
        $arFilterObjectElement = array(
            'IBLOCK_ID' => IBLOCK_OBJECT_ID,
            "ID" => intval($arUF["UF_OBJECT"]["VALUE"]),
            "ACTIVE" => "Y",
            "GLOBAL_ACTIVE" => "Y"
        );
        $rsElement = CIBlockElement::GetList(array('id' => 'asc'), $arFilterObjectElement, false, false, array("ID", "NAME", "CODE", "DETAIL_PAGE_URL"));
        while($arEl = $rsElement->GetNext()){
            $arResult["BACK_OBJECT_LINK"] = $arEl["DETAIL_PAGE_URL"];
            break;
        }
    }
}


