<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?> 
<?$APPLICATION->IncludeComponent(
	"twim:catalog.smart.filter", 
	"main_filter", 
	array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600000",
		"DISPLAY_ELEMENT_COUNT" => "N",
		"FILTER_NAME" => "arFilterApartaments",
		"FILTER_VIEW_MODE" => "",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "catalog",
		"PAGER_PARAMS_NAME" => "arrPager",
		"POPUP_POSITION" => "left",
		"SAVE_IN_SESSION" => "N",
		"SECTION_CODE" => "",
		"SECTION_DESCRIPTION" => "-",
		"SECTION_ID" => "",
		"SECTION_TITLE" => "-",
		"SEF_MODE" => "Y",
		"TEMPLATE_THEME" => "",
		"XML_EXPORT" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"COMPONENT_TEMPLATE" => "main_filter",
		"SEF_RULE" => "/stroyawiesya_doma/filter/#SMART_FILTER_PATH#/apply/",
		"SECTION_CODE_PATH" => "#SECTION_CODE_PATH#/",
		"SMART_FILTER_PATH" => ""
	),
	false
);?>