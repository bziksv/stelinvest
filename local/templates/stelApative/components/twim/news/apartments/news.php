<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
use \Bitrix\Main\Context;
?>

<?if($arParams["USE_FILTER"]=="Y"):?>
<div class="row mt-30">
    <div class="col-main">
    <?
	$APPLICATION->IncludeComponent("twim:catalog.smart.filter", "main_filter", Array(
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "DISPLAY_ELEMENT_COUNT" => "N",	// Показывать количество
            "FILTER_NAME" => $arParams["FILTER_NAME"],
            "FILTER_VIEW_MODE" => "horizontal",	// Вид отображения
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "PAGER_PARAMS_NAME" => "arrPager",	// Имя массива с переменными для построения ссылок в постраничной навигации
            "POPUP_POSITION" => "left",
            "SAVE_IN_SESSION" => "N",	// Сохранять установки фильтра в сессии пользователя
            "SECTION_CODE" => "",	// Код раздела
            "SECTION_DESCRIPTION" => "-",	// Описание
            "SECTION_ID" => "",	// ID раздела инфоблока
            "SECTION_TITLE" => "-",	// Заголовок
            "SEF_MODE" => $arParams["SEF_MODE"],
            "TEMPLATE_THEME" => "",	// Цветовая тема
            "XML_EXPORT" => "N",	// Включить поддержку Яндекс Островов
            "SHOW_ALL_WO_SECTION" => "Y",
            "COMPONENT_TEMPLATE" => "bootstrap_v4",
            "SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
            "SECTION_CODE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],	// Путь из символьных кодов раздела
            "SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],	// Блок ЧПУ умного фильтра
        ),
        $component
    );?>
   </div>
</div>
<?
// убрать квартиры, на которые запрет детального просмотра и проданы
$GLOBALS[$arParams["FILTER_NAME"]] = array_merge($GLOBALS[$arParams["FILTER_NAME"]], ["PROPERTY_HIDE_LINK" => "N", "SOLD" => "Y"])?>
<?endif?>

<div class="row">
    <div class="col-main">
        <?
        $request = Context::getCurrent()->getRequest();
        $arSort = ["square" => "property_SQUARE", "price" => "property_PRICE"]; // типы сортировки
        $arSortOrder = ["asc", "desc"]; //направление
        $sort = $request->get("sort");  
        $order = $request->get("order");  
        
        if($sort && array_key_exists($sort, $arSort)){
            $_SESSION["TYPE_SORT"] = $sort;
        } elseif(isset($_SESSION["TYPE_SORT"])){
            $sort = $_SESSION["TYPE_SORT"];
        } else {
            $keys = array_keys($arSort);
            $sort = $keys[0];
        }
        
        if($order && in_array($order, $arSortOrder)){
            $_SESSION["TYPE_SORT_ORDER"] = $order;
        } elseif(isset($_SESSION["TYPE_SORT_ORDER"])){
            $order = $_SESSION["TYPE_SORT_ORDER"];
        } else {
            $order = $arSortOrder[0];
        }

        $arParamsLinkSorter = []; // параметры ссылок
        foreach ($arSort as $type => $by) {
            $arSortParams = [];
            $arSortParams["TYPE"] = $type; //тип
            $arSortParams["ORDER"] = $order; //направление
            $arSortParams["NEW_ORDER"] = $order; // новое направление
            if($sort == $type){ // если активная
                $arSortParams["SELECTED"] = "Y";
                if($order == $arSortOrder[0]){ // меняем направлени в ссылке
                    $arSortParams["NEW_ORDER"] = $arSortOrder[1];
                } else {
                    $arSortParams["NEW_ORDER"] = $arSortOrder[0];
                }
                $arParams["SORT_BY1"] = $by;
                $arParams["SORT_ORDER1"] = $order;
            }
            $arSortParams["LINK"] = $APPLICATION->GetCurPageParam("sort=" . $type . "&order=" . $arSortParams["NEW_ORDER"], array("sort", "order")); //формируем ссылки
            $arParamsLinkSorter[] = $arSortParams;
        }
        ?>
        <div class="sorter mb-15 mt-30">
            <div class="sorter__wrap">
                <div class="sorter__title"><?=getMessage("SORT_TITLE")?>:</div>
                <?foreach ($arParamsLinkSorter as $arItem):?>
                <div class="sorter__item">
                    <a href="<?=$arItem["LINK"]?>" class="sorter__link is-<?=$arItem["ORDER"];?><?if($arItem["SELECTED"] == "Y"):?> is-active<?endif;?>">
                        <span class="sorter__link-text"><?=getMessage("SORT_" . strtoupper($arItem["TYPE"]))?></span>
                        <svg class="sorter__icon-asc">
                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/svg/icons.svg#arrow-bottom"></use>
                        </svg>
                        <svg class="sorter__icon-desc">
                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/svg/icons.svg#arrow-bottom"></use>
                        </svg>
                    </a>
                </div>
                <?endforeach;?>
            </div>
        </div>         
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" =>  $arParams["NEWS_COUNT"],
		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
	),
	$component,
    array("HIDE_ICONS" => "Y")
);
?>

<?$APPLICATION->SetTitle("Выбор квартиры");?>

<?

$APPLICATION->IncludeComponent(
      "sotbit:seo.meta",
      ".default",
       Array(
            "FILTER_NAME" => $arParams["FILTER_NAME"],
            "SECTION_ID" => "0",
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
     )
 );

?>
    </div>
    <div class="col-xl-2 d-none d-xl-flex">
        <div class="title-main-slide">
            <div class="title-main-slide__text">ВЫБОР КВАРТИРЫ</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-main">
        <div class="seo-text mb-60 mt-30">
            <?
            global $sotbitSeoMetaBottomDesc;
			
            if ($sotbitSeoMetaBottomDesc) {
                echo $sotbitSeoMetaBottomDesc;
            } else {
                $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "page",
                        "AREA_FILE_SUFFIX" => "seotext",
                        "EDIT_TEMPLATE" => ""
                    )
                );
            }
            ?>
        </div>
    </div>
</div>
