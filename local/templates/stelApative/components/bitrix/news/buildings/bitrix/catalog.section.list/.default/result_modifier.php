<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
//set selected section
$arResult['SECTION_ACTIVE_NAME'] = getMessage("ALL_OBJECTS_DESC");
$selected = false;
foreach ($arResult['SECTIONS'] as $key => $arSection){
    if(!empty($arParams["SECTION_ACTIVE_CODE"]) && $arSection["CODE"] == $arParams["SECTION_ACTIVE_CODE"] ){
        $arResult['SECTIONS'][$key]["SELECTED"] = "Y";
        $arResult['SECTION_ACTIVE_NAME'] = $arSection["NAME"];
        $selected = true;
    }
    if(!empty($arParams["SECTION_ACTIVE_ID"]) && $arSection["ID"] == $arParams["SECTION_ACTIVE_ID"] ){
        $arResult['SECTIONS'][$key]["SELECTED"] = "Y";
        $arResult['SECTION_ACTIVE_NAME'] = $arSection["NAME"];
        $selected = true;
    }
}
if(!$selected){
    $arResult['SECTION_ALL_SELECTED'] = "Y";
}
?>