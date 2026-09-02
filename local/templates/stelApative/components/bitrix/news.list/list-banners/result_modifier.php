<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//images photos
foreach($arResult["ITEMS"] as $key => $arItem){   
    //trumb mobile extra small
    $file_trumb_xs = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>576, 'height'=>576), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
    if(!isset($file_trumb_xs['src'])){ $file_trumb_xs["src"] = $arItem["PREVIEW_PICTURE"]["SRC"];} 
    $arResult["ITEMS"][$key]["PHOTOS"]["mob_n"] = $file_trumb_xs;
    //trumb mobile small
    $file_trumb = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>1152, 'height'=>1152), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
    if(!isset($file_trumb['src'])){ $file_trumb["src"] = $arItem["PREVIEW_PICTURE"]["SRC"];} 
    $arResult["ITEMS"][$key]["PHOTOS"]["mob_2x"] = $file_trumb;
    //trumb mobile retina
    $file_trumb_rt = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"]["ID"], array('width'=>1268, 'height'=>1268), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
    if(!isset($file_trumb_rt['src'])){ $file_trumb_rt["src"] = $arItem["DETAIL_PICTURE"]["SRC"];} 
    $arResult["ITEMS"][$key]["PHOTOS"]["desc_n"] = $file_trumb_rt;
    //trumb medium
    $file_d_2x = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"]["ID"], array('width'=>2536, 'height'=>2536), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
    if(!isset($file_d_2x['src'])){ $file_d_2x["src"] = $arItem["DETAIL_PICTURE"]["SRC"];}
    $arResult["ITEMS"][$key]["PHOTOS"]["desc_2x"] = $file_d_2x;
}
