<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
Loader::includeModule('dev2fun.opengraph');

\Dev2fun\Module\OpenGraph::Show($arResult['ID'],'element'); 

$sizeImage = [
    "n" => [
        "width" => 450,
        "height" => 450,
    ],
    "2x" => [
        "width" => 900,
        "height" => 900,
    ],
    "full" => [
        "width" => 1200,
        "height" => 1200,
    ],
    "thumbs_n" => [
        "width" => 120,
        "height" => 120,
    ],
    "thumbs_2x" => [
        "width" => 240,
        "height" => 240,
    ],
];

// photos

if($arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["VALUE"]){
    $idPic = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["VALUE"];
    $file_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["n"]["width"], 'height'=>$sizeImage["n"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs['src'])){ $file_thumbs["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_PLAN_TOP"]["n"] = $file_thumbs;
    //thumbs @2x
    $file_thumbs2x = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["2x"]["width"], 'height'=>$sizeImage["2x"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs2x['src'])){ $file_thumbs2x["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_PLAN_TOP"]["2x"] = $file_thumbs2x;
    //$file_full
    $file_full = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["full"]["width"], 'height'=>$sizeImage["full"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_full['src'])){ $file_full["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_PLAN_TOP"]["full"] = $file_full;
    //$thumbs_thumbs
    $file_thumbs_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["thumbs_n"]["width"], 'height'=>$sizeImage["thumbs_n"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs_thumbs['src'])){ $file_thumbs_thumbs["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_PLAN_TOP"]["thumbs_n"] = $file_thumbs_thumbs;
    //$thumbs_thumbs2x
    $file_thumbs_thumbs2x = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["thumbs_2x_n"]["width"], 'height'=>$sizeImage["thumbs_2x"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs_thumbs2x['src'])){ $file_thumbs_thumbs2x["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_PLAN_TOP"]["thumbs_2x"] = $file_thumbs_thumbs2x;
}

if($arResult["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["VALUE"]){
    $idPic = $arResult["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["VALUE"];
    $file_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["n"]["width"], 'height'=>$sizeImage["n"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs['src'])){ $file_thumbs["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_3D_PLAN"]["n"] = $file_thumbs;
    //thumbs @2x
    $file_thumbs2x = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["2x"]["width"], 'height'=>$sizeImage["2x"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs2x['src'])){ $file_thumbs2x["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_3D_PLAN"]["2x"] = $file_thumbs2x;
    //$file_full
    $file_full = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["full"]["width"], 'height'=>$sizeImage["full"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_full['src'])){ $file_full["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_3D_PLAN"]["full"] = $file_full;
    //$thumbs_thumbs
    $file_thumbs_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["thumbs_n"]["width"], 'height'=>$sizeImage["thumbs_n"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs_thumbs['src'])){ $file_thumbs_thumbs["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_3D_PLAN"]["thumbs_n"] = $file_thumbs_thumbs;
    //$thumbs_thumbs2x
    $file_thumbs_thumbs2x = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["thumbs_2x_n"]["width"], 'height'=>$sizeImage["thumbs_2x"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs_thumbs2x['src'])){ $file_thumbs_thumbs2x["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_3D_PLAN"]["thumbs_2x"] = $file_thumbs_thumbs2x;
}

if($arResult["DISPLAY_PROPERTIES"]["IMG_PLAN"]["VALUE"]){
    $idPic = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN"]["VALUE"];
    $file_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["n"]["width"], 'height'=>$sizeImage["n"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs['src'])){ $file_thumbs["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_PLAN"]["n"] = $file_thumbs;
    //thumbs @2x
    $file_thumbs2x = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["2x"]["width"], 'height'=>$sizeImage["2x"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs2x['src'])){ $file_thumbs2x["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_PLAN"]["2x"] = $file_thumbs2x;
    //$file_full
    $file_full = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["full"]["width"], 'height'=>$sizeImage["full"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_full['src'])){ $file_full["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_PLAN"]["full"] = $file_full;
    //$thumbs_thumbs
    $file_thumbs_thumbs = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["thumbs_n"]["width"], 'height'=>$sizeImage["thumbs_n"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs_thumbs['src'])){ $file_thumbs_thumbs["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_PLAN"]["thumbs_n"] = $file_thumbs_thumbs;
    //$thumbs_thumbs2x
    $file_thumbs_thumbs2x = CFile::ResizeImageGet($idPic, array('width'=>$sizeImage["thumbs_2x_n"]["width"], 'height'=>$sizeImage["thumbs_2x"]["height"]), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_thumbs_thumbs2x['src'])){ $file_thumbs_thumbs2x["src"] = $arResult["DISPLAY_PROPERTIES"]["IMG_PLAN"]["FILE_VALUE"]["SRC"]; } 
    $arResult["IMG_PLAN"]["thumbs_2x"] = $file_thumbs_thumbs2x;
}