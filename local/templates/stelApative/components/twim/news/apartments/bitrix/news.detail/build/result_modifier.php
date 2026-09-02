<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
use Bitrix\Highloadblock as HL;
Loader::includeModule("iblock");
Loader::includeModule('dev2fun.opengraph');
Loader::includeModule('highloadblock'); 

\Dev2fun\Module\OpenGraph::Show($arResult['ID'],'element'); 

// get id HL ICONS_ADVANTAGES && MORTGAGE
$arResult["ICONS_ADVANTAGES_HL_ID"] = "";
$arResult["ICONS_MORTGAGE_HL_ID"] = "";
$arHLId = [];
if($arResult["DISPLAY_PROPERTIES"]["ICONS_ADVANTAGES"]){
    $arHLId[] = $arResult["DISPLAY_PROPERTIES"]["ICONS_ADVANTAGES"]["USER_TYPE_SETTINGS"]["TABLE_NAME"];
}
if($arResult["DISPLAY_PROPERTIES"]["MORTGAGE"]){
    $arHLId[] = $arResult["DISPLAY_PROPERTIES"]["MORTGAGE"]["USER_TYPE_SETTINGS"]["TABLE_NAME"];
}
if(!empty($arHLId)){
    $rsData = HL\HighloadBlockTable::getList(array('filter'=>array('=TABLE_NAME'=>$arHLId)));
    while ($hldata = $rsData->fetch()){
        if($hldata["NAME"] == "Banki"){
            $arResult["ICONS_MORTGAGE_HL_ID"] = $hldata["ID"];
        } elseif($hldata["NAME"] == "Icons"){
            $arResult["ICONS_ADVANTAGES_HL_ID"]= $hldata["ID"];
        }
    }  
}

//docs
if(!function_exists("getHtmlIconFileExt")){
    function getIconFileExt($path){
        $info = (new SplFileInfo($path))->getExtension();
        switch ($info) {
            case 'doc':
            case 'docx':
            case 'odt':
                $htmlIcon = '<i class="far fa-file-word list-docs__icon"></i>';
                break;
            case 'pdf':
                $htmlIcon = '<i class="far fa-file-pdf list-docs__icon"></i>';
                break;
            case 'gz':
            case 'gzip':
            case 'tar':
            case 'tar-gz':
            case 'zip':
            case '7z':
            case 'rar':
                $htmlIcon = '<i class="far fa-file-archive list-docs__icon"></i>';
                break;
            case 'tiff':
            case 'png':
            case 'jpg':
            case 'jpeg':
            case 'bmp':
                $htmlIcon = '<i class="far fa-file-image list-docs__icon"></i>';
                break;
            default:
                $htmlIcon = '<i class="far fa-file list-docs__icon"></i>';
                break;
        }
        return $htmlIcon;
    }
}
$arResult["DOCS"] = [];
if(count($arResult["DISPLAY_PROPERTIES"]["DOCS"]["VALUE"]) > 0){
    if(count($arResult["DISPLAY_PROPERTIES"]["DOCS"]["VALUE"]) == 1){
        $arResult["DISPLAY_PROPERTIES"]["DOCS"]["FILE_VALUE"] = [$arResult["DISPLAY_PROPERTIES"]["DOCS"]["FILE_VALUE"]];
    }
    foreach($arResult["DISPLAY_PROPERTIES"]["DOCS"]["FILE_VALUE"] as $key => $arFile){ 
        $arResult["DOCS"][$key] = ["SRC" => $arFile["SRC"], "ICON" => getIconFileExt($arFile["SRC"]),  "NAME" =>  $arFile["ORIGINAL_NAME"],  "DESCRIPTION" => $arResult["DISPLAY_PROPERTIES"]["DOCS"]["DESCRIPTION"][$key]];
    } 
}

// type builds
$arResult["CLASS_TYPE"] = "under-construction";
if(isset($arResult["SECTION"]["PATH"][0]["CODE"])){
    $arResult["CLASS_TYPE"] = $arResult["SECTION"]["PATH"][0]["CODE"];
}

if(count($arResult["DISPLAY_PROPERTIES"]["ENUM_PROPS_OBJECT"]["VALUE"]) == 1){
    $arResult["DISPLAY_PROPERTIES"]["ENUM_PROPS_OBJECT"]["DISPLAY_VALUE"] = [$arResult["DISPLAY_PROPERTIES"]["ENUM_PROPS_OBJECT"]["DISPLAY_VALUE"]];
}
// photos final finishing
$arResult["FINAL_FINISHING_PHOTOS"] = [];
if (!$arResult["DISPLAY_PROPERTIES"]["PHOTOS_FINAL_FINISHING"]["VALUE"]) {
	$arResult["DISPLAY_PROPERTIES"]["PHOTOS_FINAL_FINISHING"]["VALUE"] = [];
}
if(count($arResult["DISPLAY_PROPERTIES"]["PHOTOS_FINAL_FINISHING"]["VALUE"]) > 0){
    if(count($arResult["DISPLAY_PROPERTIES"]["PHOTOS_FINAL_FINISHING"]["VALUE"]) == 1){
        $arResult["DISPLAY_PROPERTIES"]["PHOTOS_FINAL_FINISHING"]["FILE_VALUE"] = [$arResult["DISPLAY_PROPERTIES"]["PHOTOS_FINAL_FINISHING"]["FILE_VALUE"]];
    }
    foreach($arResult["DISPLAY_PROPERTIES"]["PHOTOS_FINAL_FINISHING"]["FILE_VALUE"] as $key => $idPic){ 
        //trumb normal
        $file_trumb = CFile::ResizeImageGet($idPic, array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb['src'])){ $file_trumb["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS_FINAL_FINISHING"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["FINAL_FINISHING_PHOTOS"][$key]["N"] = $file_trumb;
        //trumb @2x
        $file_trumb2x = CFile::ResizeImageGet($idPic, array('width'=>1280, 'height'=>960), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb2x['src'])){ $file_trumb2x["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS_FINAL_FINISHING"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["FINAL_FINISHING_PHOTOS"][$key]["2x"] = $file_trumb2x;
        //full
        $arResult["FINAL_FINISHING_PHOTOS"][$key]["FULL"] = $file_trumb2x;
    } 
}
// photos
$arResult["PHOTOS"] = [];
$arResult["PHOTOS_THUMBS"] = [];
if(count($arResult["DISPLAY_PROPERTIES"]["PHOTOS_WIDE_SLIDER"]["VALUE"]) > 0){
    if(count($arResult["DISPLAY_PROPERTIES"]["PHOTOS_WIDE_SLIDER"]["VALUE"]) == 1){
        $arResult["DISPLAY_PROPERTIES"]["PHOTOS_WIDE_SLIDER"]["FILE_VALUE"] = [$arResult["DISPLAY_PROPERTIES"]["PHOTOS_WIDE_SLIDER"]["FILE_VALUE"]];
    }
    $arPhotosNew = $arResult["DISPLAY_PROPERTIES"]["PHOTOS_WIDE_SLIDER"]["FILE_VALUE"];
    foreach($arPhotosNew as $key => $idPic){ 
        //trumb normal
        $file_trumb = CFile::ResizeImageGet($idPic, array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb['src'])){ $file_trumb["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS_WIDE_SLIDER"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS"][$key]["sm"] = $file_trumb;
        //trumb @2x
        $file_trumb2x = CFile::ResizeImageGet($idPic, array('width'=>1226, 'height'=>690), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb2x['src'])){ $file_trumb2x["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS_WIDE_SLIDER"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS"][$key]["md"] = $file_trumb2x;
        //full
        $file_trumb_xl = CFile::ResizeImageGet($idPic, array('width'=>2452, 'height'=>1097), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb_xl['src'])){ $file_trumb_xl["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS_WIDE_SLIDER"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS"][$key]["xl"] = $file_trumb_xl;

        $file_trumb_carusel = CFile::ResizeImageGet($idPic, array('width'=>168, 'height'=>95), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb_carusel['src'])){ $file_trumb_carusel["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS_WIDE_SLIDER"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS_THUMBS"][$key]["sm"] = $file_trumb_carusel;
        //trumb @2x
        $file_trumb_carusel2x = CFile::ResizeImageGet($idPic, array('width'=>336, 'height'=>189), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb_carusel2x['src'])){ $file_trumb_carusel2x["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS_WIDE_SLIDER"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS_THUMBS"][$key]["md"] = $file_trumb_carusel2x;       
    } 
} 
// photos stage buildings
$arResult["PHOTOS_STAGE_BUILDINGS"] = [];
if(count($arResult["DISPLAY_PROPERTIES"]["PHOTOS_STAGE_BUILDINGS"]["VALUE"]) > 0){
    if(count($arResult["DISPLAY_PROPERTIES"]["PHOTOS_STAGE_BUILDINGS"]["VALUE"]) == 1){
        $arResult["DISPLAY_PROPERTIES"]["PHOTOS_STAGE_BUILDINGS"]["FILE_VALUE"] = [$arResult["DISPLAY_PROPERTIES"]["PHOTOS_STAGE_BUILDINGS"]["FILE_VALUE"]];
    }
    $arPhotosStage = array_slice($arResult["DISPLAY_PROPERTIES"]["PHOTOS_STAGE_BUILDINGS"]["FILE_VALUE"], 0, 4);
    foreach($arPhotosStage as $key => $idPic){ 
        //trumb normal
        $file_trumb = CFile::ResizeImageGet($idPic, array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb['src'])){ $file_trumb["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS_STAGE_BUILDINGS"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS_STAGE_BUILDINGS"][$key]["N"] = $file_trumb;
        //trumb @2x
        $file_trumb2x = CFile::ResizeImageGet($idPic, array('width'=>1280, 'height'=>960), BX_RESIZE_IMAGE_EXACT, true); 
        if(!isset($file_trumb2x['src'])){ $file_trumb2x["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS_STAGE_BUILDINGS"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS_STAGE_BUILDINGS"][$key]["2x"] = $file_trumb2x;
        //full
         $file_full = CFile::ResizeImageGet($idPic, array('width'=>1280, 'height'=>1280), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
        if(!isset($file_full['src'])){ $file_full["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS_STAGE_BUILDINGS"]["FILE_VALUE"][$key]["SRC"]; } 
        $arResult["PHOTOS_STAGE_BUILDINGS"][$key]["FULL"] = $file_full;
    } 
}