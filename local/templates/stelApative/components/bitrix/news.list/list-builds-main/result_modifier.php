<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//images photos
foreach($arResult["ITEMS"] as $key => $arItem){     
    if(count($arItem["DISPLAY_PROPERTIES"]["PHOTOS_IN_MAIN"]["VALUE"]) > 0){
        if(count($arItem["DISPLAY_PROPERTIES"]["PHOTOS_IN_MAIN"]["VALUE"]) == 1){
            $arItem["DISPLAY_PROPERTIES"]["PHOTOS_IN_MAIN"]["FILE_VALUE"] = [$arItem["DISPLAY_PROPERTIES"]["PHOTOS_IN_MAIN"]["FILE_VALUE"]];
        }
        $countSlider = ($arItem["DISPLAY_PROPERTIES"]["YT_VIDEO_LINK"]["VALUE"]) ? 3 : 4;
        $arPhotosNew = array_slice($arItem["DISPLAY_PROPERTIES"]["PHOTOS_IN_MAIN"]["FILE_VALUE"], 0, $countSlider);
        $arResult["ITEMS"][$key]["PHOTOS_IN_MAIN"] = [];
        foreach($arPhotosNew as $keyPic => $idPic){ 
            //trumb small
            $file_trumb = CFile::ResizeImageGet($idPic, array('width'=>640, 'height'=>640), BX_RESIZE_IMAGE_EXACT, true); 
            if(!isset($file_trumb['src'])){ $file_trumb["src"] = $arItem["DISPLAY_PROPERTIES"]["PHOTOS_IN_MAIN"]["FILE_VALUE"][$keyPic]["SRC"];} 
            $arResult["ITEMS"][$key]["PHOTOS_IN_MAIN"][$keyPic]["N"] = $file_trumb;
            //trumb medium
            $file_md = CFile::ResizeImageGet($idPic, array('width'=>1280, 'height'=>1280), BX_RESIZE_IMAGE_EXACT, true); 
            if(!isset($file_md['src'])){ $file_md["src"] = $arItem["DISPLAY_PROPERTIES"]["PHOTOS_IN_MAIN"]["FILE_VALUE"][$keyPic]["SRC"];}
            $arResult["ITEMS"][$key]["PHOTOS_IN_MAIN"][$keyPic]["2x"] = $file_md;
        } 
    }
    if($arItem["DISPLAY_PROPERTIES"]["YT_VIDEO_LINK"]["VALUE"]){
        $url_video = $arItem["DISPLAY_PROPERTIES"]["YT_VIDEO_LINK"]["VALUE"];
        $url_param = parse_url($url_video);
        parse_str($url_param["query"]);
        $v = trim($v);
        $arResult["ITEMS"][$key]["YT_VIDEO_PIC"]["src"]  = 'http://img.youtube.com/vi/'.$v.'/maxresdefault.jpg';
    }    
}