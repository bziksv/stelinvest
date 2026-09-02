<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
Loader::includeModule('dev2fun.opengraph');

\Dev2fun\Module\OpenGraph::Show($arResult['ID'],'element'); 

// photos
$arResult["PHOTOS"] = [];
$arResult["PHOTOS_THUMBS"] = [];
if(count($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"]) > 0){
    if(count($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["VALUE"]) == 1){
        $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"] = [$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"]];
    }
    foreach($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"] as $key => $idPic){ 
        //trumb normal
        $file_trumb = CFile::ResizeImageGet($idPic, array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb['src'])){ $file_trumb["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS"][$key]["n"] = $file_trumb;
        //trumb @2x
        $file_trumb2x = CFile::ResizeImageGet($idPic, array('width'=>1226, 'height'=>690), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb2x['src'])){ $file_trumb2x["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS"][$key]["2x"] = $file_trumb2x;
        //full
        $file_trumb_xl = CFile::ResizeImageGet($idPic, array('width'=>1200, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL , true); 
        if(!isset($file_trumb_xl['src'])){ $file_trumb_xl["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS"][$key]["full"] = $file_trumb_xl;
        //desciption
        if(empty($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["DESCRIPTION"][$key])){
            $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["DESCRIPTION"][$key] = $arResult["NAME"];
        }
    } 
}