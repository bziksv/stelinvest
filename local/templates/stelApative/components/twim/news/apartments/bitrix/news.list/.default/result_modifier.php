<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//use Bitrix\Main\Diag\Debug;
$sizeImage = [
    "n" => [
        "width" => 545,
        "height" => 410,
    ]
];
//images photos
foreach($arResult["ITEMS"] as $key => $arItem){ 
    $arResult["ITEMS"][$key]["PHOTOS"] = [];
  //  Debug::startTimeLabel("ResizeImageGet");
    if($arItem["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["VALUE"]){
        $idPic = $arItem["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["VALUE"];
        $file_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["n"]["width"], 'height'=>$sizeImage["n"]["height"]), BX_RESIZE_IMAGE_EXACT, false, false, false, 70); 
        if(!isset($file_thumbs['src'])){ $file_thumbs["src"] = $arItem["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["FILE_VALUE"]["SRC"]; } 
        $arResult["ITEMS"][$key]["PHOTOS"][$idPic]["n"] = $file_thumbs;
     //   Debug::dump(array_pop(explode(".", $arItem["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["FILE_VALUE"]["SRC"]))); 
    }
    if($arItem["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["VALUE"]){
        $idPic = $arItem["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["VALUE"];
        $file_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["n"]["width"], 'height'=>$sizeImage["n"]["height"]), BX_RESIZE_IMAGE_EXACT, false, false, false, 70); 
        if(!isset($file_thumbs['src'])){ $file_thumbs["src"] = $arItem["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["FILE_VALUE"]["SRC"]; } 
        $arResult["ITEMS"][$key]["PHOTOS"][$idPic]["n"] = $file_thumbs;
     //   Debug::dump(array_pop(explode(".", $arItem["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["FILE_VALUE"]["SRC"]))); 
    }
    if($arItem["DISPLAY_PROPERTIES"]["IMG_PLAN"]["VALUE"]){
        $idPic = $arItem["DISPLAY_PROPERTIES"]["IMG_PLAN"]["VALUE"];
        $file_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["n"]["width"], 'height'=>$sizeImage["n"]["height"]), BX_RESIZE_IMAGE_EXACT, false, false, false, 70); 
        if(!isset($file_thumbs['src'])){ $file_thumbs["src"] = $arItem["DISPLAY_PROPERTIES"]["IMG_PLAN"]["FILE_VALUE"]["SRC"]; } 
        $arResult["ITEMS"][$key]["PHOTOS"][$idPic]["n"] = $file_thumbs;
      //  Debug::dump(array_pop(explode(".", $arItem["DISPLAY_PROPERTIES"]["IMG_PLAN"]["FILE_VALUE"]["SRC"]))); 
    }
    if($arItem["DISPLAY_PROPERTIES"]["IMG_BUILD"]["VALUE"]){
        $idPic = $arItem["DISPLAY_PROPERTIES"]["IMG_BUILD"]["VALUE"];
        $file_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["n"]["width"], 'height'=>$sizeImage["n"]["height"]), BX_RESIZE_IMAGE_EXACT, false, false, false, 70); 
        if(!isset($file_thumbs['src'])){ $file_thumbs["src"] = $arItem["DISPLAY_PROPERTIES"]["IMG_BUILD"]["FILE_VALUE"]["SRC"]; } 
        $arResult["ITEMS"][$key]["PHOTOS"][$idPic]["n"] = $file_thumbs;
      //  Debug::dump(array_pop(explode(".", $arItem["DISPLAY_PROPERTIES"]["IMG_BUILD"]["FILE_VALUE"]["SRC"]))); 
    }
//    Debug::endTimeLabel("ResizeImageGet");
//    Debug::dump(Debug::getTimeLabels()); 
}