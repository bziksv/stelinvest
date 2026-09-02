<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

// save id build
if($arResult["BUILD_ID"] > 0){
    Twim\Helper\GarbageStorage::set("BUILD_ID", $arResult["BUILD_ID"]);
}

$APPLICATION->SetTitle($arResult["SECTION"]["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]);
$APPLICATION->SetPageProperty("title", $arResult["SECTION"]["IPROPERTY_VALUES"]["SECTION_META_TITLE"]);
$APPLICATION->SetPageProperty("description", $arResult["SECTION"]["IPROPERTY_VALUES"]["SECTION_META_DESCRIPTION"]);

