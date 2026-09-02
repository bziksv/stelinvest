<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */
$this->setFrameMode(false);

if(!CModule::IncludeModule("iblock"))
{
	return;
}

/*************************************************************************
	Processing of received parameters
*************************************************************************/
if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 3600;

unset($arParams["IBLOCK_TYPE"]); //was used only for IBLOCK_ID setup with Editor
$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);
$arParams["SECTION_ID"] = intval($arParams["SECTION_ID"]);
$arParams["SECTION_CODE"] = trim($arParams["SECTION_CODE"]);
$arParams["NUM_NEWS"] = intval($arParams["NUM_NEWS"]);

$arParams["CHECK_DATES"] = $arParams["CHECK_DATES"]!="N";

$arParams["SORT_BY1"] = trim($arParams["SORT_BY1"]);
if(strlen($arParams["SORT_BY1"])<=0)
	$arParams["SORT_BY1"] = "ACTIVE_FROM";
if(!preg_match('/^(asc|desc|nulls)(,asc|,desc|,nulls){0,1}$/i', $arParams["SORT_ORDER1"]))
	$arParams["SORT_ORDER1"]="DESC";

if(strlen($arParams["SORT_BY2"])<=0)
	$arParams["SORT_BY2"] = "SORT";
if(!preg_match('/^(asc|desc|nulls)(,asc|,desc|,nulls){0,1}$/i', $arParams["SORT_ORDER2"]))
	$arParams["SORT_ORDER2"]="ASC";

if(strlen($arParams["FILTER_NAME"])<=0 || !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["FILTER_NAME"]))
{
	$arrFilter = array();
}
else
{
	$arrFilter = $GLOBALS[$arParams["FILTER_NAME"]];
	if(!is_array($arrFilter))
		$arrFilter = array();
}

$arParams["CACHE_FILTER"] = $arParams["CACHE_FILTER"]=="Y";
if(!$arParams["CACHE_FILTER"] && count($arrFilter)>0)
	$arParams["CACHE_TIME"] = 0;

$bDesignMode = $APPLICATION->GetShowIncludeAreas() && is_object($USER) && $USER->IsAdmin();

if(!$bDesignMode)
{
	$APPLICATION->RestartBuffer();
	header("Content-Type: text/xml; charset=".LANG_CHARSET);
	header("Pragma: no-cache");   
}
else
{
	ob_start();
}
/*************************************************************************
	Start caching
*************************************************************************/

if($this->StartResultCache(false, array($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups(), $arrFilter)))
{
    
	$rsResult = CIBlock::GetList(array(), array(
		"ACTIVE" => "Y",
		"SITE_ID" => SITE_ID,
		"ID" => $arParams["IBLOCK_ID"],
	));
	$arIblock = $rsResult->Fetch();
	if(!$arIblock)
	{
		$this->AbortResultCache();
		if($bDesignMode)
		{
			ob_end_flush();
			ShowError(GetMessage("CT_RO_IBLOCK_NOT_FOUND"));
			return;
		}
		else
			die();
	}
	else
	{
		$arResult["IBLOCK_ID"] = $arIblock["ID"];
	}


	if($arParams["SECTION_ID"] > 0 || strlen($arParams["SECTION_CODE"]) > 0)
	{
		$arFilter = array(
			"ACTIVE" => "Y",
			"GLOBAL_ACTIVE" => "Y",
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"IBLOCK_ACTIVE" => "Y",
		);
		if($arParams["SECTION_ID"] > 0)
			$arFilter["ID"] = $arParams["SECTION_ID"];
		elseif(strlen($arParams["SECTION_CODE"]) > 0)
			$arFilter["=CODE"] = $arParams["SECTION_CODE"];

		$rsResult = CIBlockSection::GetList(array(), $arFilter, false, array("ID", "CODE", "IBLOCK_ID"));
		$arResult["SECTION"] = $rsResult->Fetch();
		if(!$arResult["SECTION"])
		{
			$this->AbortResultCache();
			if($bDesignMode)
			{
				ob_end_flush();
				ShowError(GetMessage("CT_RO_SECTION_NOT_FOUND"));
				return;
			}
			else
				die();
		}
		else
		{
			foreach($arResult["SECTION"] as $k => $v)
			{
				if(substr($k, 0, 1)!=="~")
				{
					$arResult["SECTION"]["~".$k] = $v;
					$arResult["SECTION"][$k] = htmlspecialcharsbx($v);
				}
			}
		}
	}

	if(strlen($arResult["SERVER_NAME"])<=0 && defined("SITE_SERVER_NAME"))
	{
		$arResult["SERVER_NAME"] = SITE_SERVER_NAME;
	}
	if(strlen($arResult["SERVER_NAME"])<=0 && defined("SITE_SERVER_NAME"))
	{
		$b = "sort";
		$o = "asc";
		$rsSite = CSite::GetList($b, $o, array("LID" => $arResult["LID"]));
		if($arSite = $rsSite->Fetch())
			$arResult["SERVER_NAME"] = $arSite["SERVER_NAME"];
	}
	if(strlen($arResult["SERVER_NAME"])<=0)
	{
		$arResult["SERVER_NAME"] = COption::GetOptionString("main", "server_name", "www.bitrixsoft.com");
	}

//	$arResult["PICTURE"] = CFile::GetFileArray($arResult["PICTURE"]);


	$arSelect = array(
		"ID",
		"CODE",
		"XML_ID",
		"IBLOCK_ID",
		"NAME",
		"IBLOCK_SECTION_ID",
		"DATE_ACTIVE_FROM",
		"ACTIVE_FROM",
		"DATE_ACTIVE_TO",
		"ACTIVE_TO",
		"DATE_CREATE",
		"TIMESTAMP_X",
		"MODIFIED_BY",
		"PROPERTY_*",
	);
	$arFilter = array (
		"ACTIVE" => "Y",
		"CHECK_PERMISSIONS" => "Y",
	);

	if($arParams["CHECK_DATES"])
		$arFilter["ACTIVE_DATE"] = "Y";

	if(array_key_exists("SECTION", $arResult))
	{
		$arFilter["SECTION_ID"] = $arResult["SECTION"]["ID"];
		if($arParams["INCLUDE_SUBSECTIONS"])
			$arFilter["INCLUDE_SUBSECTIONS"] = "Y";
	}
	else
	{
		$arFilter["IBLOCK_ID"] = $arResult["IBLOCK_ID"];
	}

	$arSort = array(
		$arParams["SORT_BY1"] => $arParams["SORT_ORDER1"],
		$arParams["SORT_BY2"] => $arParams["SORT_ORDER2"],
	);
	if(!array_key_exists("ID", $arSort))
		$arSort["ID"] = "DESC";

	if($arParams["NUM_NEWS"]>0)
		$limit = array("nTopCount"=>$arParams["NUM_NEWS"]);
	else
		$limit = false;

	$arResult["ITEMS"]=array();

	CTimeZone::Disable();
	$rsElements = CIBlockElement::GetList($arSort, array_merge($arFilter, $arrFilter), false, $limit, $arSelect);
	CTimeZone::Enable();

	//$rsElements->SetUrlTemplates($arParams["DETAIL_URL"]);
	while($obElement = $rsElements->GetNextElement())
	{
		$arElement = $obElement->GetFields();
		$arProperties = $obElement->GetProperties();

		if(strlen($arElement["TIMESTAMP_X"])>0)
		{
			$arItem["timestampDate"] = date("c", MkDateTime($DB->FormatDate($arElement["TIMESTAMP_X"], Clang::GetDateFormat("FULL"), "DD.MM.YYYY H:I:S"), "d.m.Y H:i:s"));
		} else {
             $arItem["timestampDate"] = date("c");
        }
        
		if(strlen($arElement["DATE_CREATE"])>0)
		{
			$arItem["createDate"] = date("c", MkDateTime($DB->FormatDate($arElement["DATE_CREATE"], Clang::GetDateFormat("FULL"), "DD.MM.YYYY H:I:S"), "d.m.Y H:i:s"));
		} else {
            $arItem["createDate"] = date("c");
        }
        
        if(strlen($arElement["ACTIVE_TO"])>0)
		{
			$arItem["expireDate"] = date("c", MkDateTime($DB->FormatDate($arElement["ACTIVE_TO"], Clang::GetDateFormat("FULL"), "DD.MM.YYYY H:I:S"), "d.m.Y H:i:s"));
		} 
        //clear duoble element ~
       
        foreach ($arElement as $code => $value) {
            if(is_string($code) && $code[0] === "~"){
                unset($arElement[$code]);
                continue;
            }
         
            if(is_string($code) && strpos($code, "PROPERTY_") === 0){
                unset($arElement[$code]);
                continue;
            }
        }
        $arPropertiesCl = [];
        foreach ($arProperties as $code => $value) {
            if(isset($value["VALUE"])){
                 $arPropertiesCl[$code] = ["VALUE" => $value["VALUE"]];
                if(isset($value["VALUE_XML_ID"])){
                    $arPropertiesCl[$code]["VALUE_XML_ID"] = $value["VALUE_XML_ID"];
                }
                if(isset($value["USER_TYPE_SETTINGS"])){
                    $arPropertiesCl[$code]["USER_TYPE_SETTINGS"] = $value["USER_TYPE_SETTINGS"];
                }
            }
        }
        
		$arItem["ELEMENT"] = ["ID" => $arElement["ID"], "NAME" => $arElement["NAME"]];
		$arItem["PROPERTIES"] = $arPropertiesCl;
		$arResult["ITEMS"][]=$arItem;
	}
    
    $datetime = new DateTime("now");
    $arResult["DATE_GENERATE"] = $datetime->format(DateTime::ATOM);

	$this->IncludeComponentTemplate();
}

if(!$bDesignMode)
{
	$r = $APPLICATION->EndBufferContentMan();
	echo $r;
	die();
}
else
{    
	$contents = ob_get_contents();
	ob_end_clean();
	echo "<pre>",htmlspecialcharsbx($contents),"</pre>";
}
?>
