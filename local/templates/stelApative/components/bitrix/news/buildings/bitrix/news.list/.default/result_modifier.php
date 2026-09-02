<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
// secrion name
$arSectionID = [];
$arResult["SECTIONS"] = [];
foreach ($arResult["ITEMS"] as $key => $arItem) {
    if(in_array($arItem["IBLOCK_SECTION_ID"], $arSectionID)){
        $arSectionID[] = $arItem["IBLOCK_SECTION_ID"];
    } 
}
$rsSect = CIBlockSection::GetList(array('id' => 'asc'), array('IBLOCK_ID' => $arResult['IBLOCK_ID'], "ID" => $arSectionID), false, array("ID", "NAME", "CODE"), false);
while ($arSect = $rsSect->GetNext()){
    switch ($arSect["CODE"]) {
        case "under-construction":
            $arSect["CLASS_TYPE"] = "is-new";
            break;
        case "planned":
            $arSect["CLASS_TYPE"] = "is-planned";
            break;
        case "built":
        default:
            $arSect["CLASS_TYPE"] = "is-ready";
            break;
    }
    $arResult["SECTIONS"][$arSect["ID"]] = $arSect;
}

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

// in map
$arResult["arJsonBuilds"] = [];
foreach($arResult["ITEMS"] as $key => $arItem){ 
    
    $ballunContent = '<div class="balloon-text">';
    if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])){
        $ballunContent .= '<picture>
         <source media="(max-width: 991px)" sizes="100vw"
         srcset="'.$arItem["PICTURE"]["SM"]["src"].' 320w, '.$arItem["PICTURE"]["MD"]["src"].' 640w, '.$arItem["PICTURE"]["LG"]["src"].' 1280w">
         <source media="(min-width: 992px)" sizes="100vw"
         ssrcset="'.$arItem["PICTURE"]["SM"]["src"].' 320w, '.$arItem["PICTURE"]["MD"]["src"].' 640w">
         <img class="balloon-text__img"
             src="'.$arItem["PICTURE"]["SM"]["src"].'" 
             alt="'.$arItem["PREVIEW_PICTURE"]["ALT"].'"
             title="'.$arItem["PREVIEW_PICTURE"]["TITLE"].'"
         />
         </picture>';
    }
    $ballunContent .= '<p class="balloon-text__title">'.$arItem["NAME"].'</p>';
    if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])){
        $ballunContent .= '<a href='.$arItem["DETAIL_PAGE_URL"].' class="more-link balloon-text_more-link">'
            . '<span class="more-link__text">'.getMessage("MORE_LINK_DESC").'</span></a>';
    }
    $ballunContent .= '</div>';
    
    $arResult["arJsonBuilds"][] = [
        "name" => $arItem["NAME"],
        "coord" => explode(",", $arItem["DISPLAY_PROPERTIES"]["MAP_POSITION"]["VALUE"]),
        "status" => $arResult["SECTIONS"][$arItem["IBLOCK_SECTION_ID"]]["CODE"],
        "text" => $ballunContent
    ];
}