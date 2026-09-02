<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$sizeImage = [
    "n" => [
        "width" => 900,
        "height" => 900,
    ],
];
// photos
if($arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["VALUE"]){
    $idPic = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["VALUE"];
    $file_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["n"]["width"], 'height'=>$sizeImage["n"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs['src'])){ $file_thumbs["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_PLAN_TOP"]["n"] = $file_thumbs;
}

if($arResult["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["VALUE"]){
    $idPic = $arResult["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["VALUE"];
    $file_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["n"]["width"], 'height'=>$sizeImage["n"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs['src'])){ $file_thumbs["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_3D_PLAN"]["n"] = $file_thumbs;
}

if($arResult["DISPLAY_PROPERTIES"]["IMG_PLAN"]["VALUE"]){
    $idPic = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN"]["VALUE"];
    $file_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["n"]["width"], 'height'=>$sizeImage["n"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs['src'])){ $file_thumbs["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_PLAN"]["n"] = $file_thumbs;
}