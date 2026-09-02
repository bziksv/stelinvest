<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
} else {
    //trumb normal
    $file_trumb = CFile::ResizeImageGet($idPic, array('width'=>480, 'height'=>360), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_trumb['src'])){ $file_trumb["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"]["SRC"]; } 
    $arResult["PHOTOS"][0]["N"] = $file_trumb;
    //trumb @2x
    $file_trumb2x = CFile::ResizeImageGet($idPic, array('width'=>960, 'height'=>540), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_trumb2x['src'])){ $file_trumb2x["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"]["SRC"]; } 
    $arResult["PHOTOS"][0]["2x"] = $file_trumb2x;
    //full
    $file_full = CFile::ResizeImageGet($idPic, array('width'=>1280, 'height'=>960), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
    if(!isset($file_full['src'])){ $file_full["src"] = $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"]["SRC"]; } 
    $arResult["PHOTOS"][0]["FULL"] = $file_full;
}
