<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
// type builds
$arResult["CLASS_TYPE"] = "under-construction";
if(isset($arResult["SECTION"]["PATH"][0]["CODE"])){
    $arResult["CLASS_TYPE"] = $arResult["SECTION"]["PATH"][0]["CODE"];
}