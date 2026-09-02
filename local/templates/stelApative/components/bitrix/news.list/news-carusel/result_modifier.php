<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//images photos
foreach($arResult["ITEMS"] as $key => $arItem){ 
    //trumb small
    $file_trumb = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>320, 'height'=>240), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_trumb['src'])){ $file_trumb["src"] = $arItem["PREVIEW_PICTURE"]["SRC"]; } 
    $arResult["ITEMS"][$key]["PICTURE"]["SM"] = $file_trumb;
    //trumb medium
    $file_md = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>640, 'height'=>480), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_md['src'])){ $file_md["src"] = $arItem["PREVIEW_PICTURE"]["SRC"]; } 
    $arResult["ITEMS"][$key]["PICTURE"]["MD"] = $file_md;
    //trumb large
    $file_lg = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>1280, 'height'=>960), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_lg['src'])){ $file_lg["src"] = $arItem["PREVIEW_PICTURE"]["SRC"]; } 
    $arResult["ITEMS"][$key]["PICTURE"]["LG"] = $file_lg;
}