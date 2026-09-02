<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("xml");
$APPLICATION->SetPageProperty("save_kernel", "Y");
?><?$APPLICATION->IncludeComponent(
	"twim:xml.out",
	"",
	Array(
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"FILTER_NAME" => "",
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "catalog",
		"NUM_NEWS" => 1500,
		"SECTION_CODE" => "",
		"SECTION_ID" => "",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>