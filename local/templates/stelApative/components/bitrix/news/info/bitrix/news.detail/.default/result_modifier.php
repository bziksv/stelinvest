<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
Loader::includeModule('dev2fun.opengraph');

\Dev2fun\Module\OpenGraph::Show($arResult['ID'],'element'); 

//detail picture
if($arResult["DETAIL_PICTURE"]["ID"] > 0){
    $file_trumb = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width'=>1240, 'height'=>2000), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
    if(!isset($file_trumb['src'])){ $file_trumb["src"] = $arResult["DETAIL_PICTURE"]["SRC"]; } 
    $arResult["DETAIL_PICTURE"]["N"] = $file_trumb;
    //trumb @2x
    $file_trumb2x = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"]["ID"], array('width'=>2880, 'height'=>4000), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
    if(!isset($file_trumb2x['src'])){ $file_trumb2x["src"] = $arResult["DETAIL_PICTURE"]["SRC"]; } 
    $arResult["DETAIL_PICTURE"]["2x"] = $file_trumb2x;
}
//images photos
if(count($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"]) > 1){
    foreach($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"] as $key => $idPic){ 
        //trumb normal
        $file_trumb = CFile::ResizeImageGet($idPic, array('width'=>480, 'height'=>360), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb['src'])){ $file_trumb["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS"][$key]["N"] = $file_trumb;
        //trumb @2x
        $file_trumb2x = CFile::ResizeImageGet($idPic, array('width'=>960, 'height'=>540), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb2x['src'])){ $file_trumb2x["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS"][$key]["2x"] = $file_trumb2x;
        //full
        $file_full = CFile::ResizeImageGet($idPic, array('width'=>1280, 'height'=>960), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
        if(!isset($file_full['src'])){ $file_full["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS"][$key]["FULL"] = $file_full;
    }
}

// next && prev
$arSort = array(
      $arParams["SORT_BY1"]=>$arParams["SORT_ORDER1"],
      $arParams["SORT_BY2"]=>$arParams["SORT_ORDER2"],
   );
$arSelect = array(
      "ID",
      "NAME",
      "DETAIL_PAGE_URL"
   );
$arFilter = array (
      "IBLOCK_ID" => $arResult["IBLOCK_ID"],
      //"SECTION_CODE" => $arParams["SECTION_CODE"],
      "ACTIVE" => "Y",
      "CHECK_PERMISSIONS" => "Y",
   );
$arNavParams = array(
      "nPageSize" => 1,
      "nElementID" => $arResult["ID"],
   );
$arItems = Array();
$rsElement = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, $arSelect);
$rsElement->SetUrlTemplates($arParams["DETAIL_URL"]);
while($obElement = $rsElement->GetNextElement())
      $arItems[] = $obElement->GetFields();
if(count($arItems)==3):
   $arResult["TORIGHT"] = Array("NAME"=>$arItems[0]["NAME"], "URL"=>$arItems[0]["DETAIL_PAGE_URL"]);
   $arResult["TOLEFT"] = Array("NAME"=>$arItems[2]["NAME"], "URL"=>$arItems[2]["DETAIL_PAGE_URL"]);
elseif(count($arItems)==2):
   if($arItems[0]["ID"]!=$arResult["ID"])
      $arResult["TORIGHT"] = Array("NAME"=>$arItems[0]["NAME"], "URL"=>$arItems[0]["DETAIL_PAGE_URL"]);
   else
      $arResult["TOLEFT"] = Array("NAME"=>$arItems[1]["NAME"], "URL"=>$arItems[1]["DETAIL_PAGE_URL"]);
endif;
