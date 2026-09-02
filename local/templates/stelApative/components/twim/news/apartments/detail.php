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
use Bitrix\Main\Context;
$request = Context::getCurrent()->getRequest();
$printPlan = $request->get("print-plan");
if($printPlan == "Y"):?>

<?$ElementID = $APPLICATION->IncludeComponent(
    "twim:news.detail",
    "print-plan",
    Array(
        "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
        "DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
        "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
        "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
        "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
        "META_KEYWORDS" => $arParams["META_KEYWORDS"],
        "META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
        "BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
        "SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
        "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "MESSAGE_404" => $arParams["MESSAGE_404"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "SHOW_404" => $arParams["SHOW_404"],
        "FILE_404" => $arParams["FILE_404"],
        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
        "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
        "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
        "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
        "DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
        "DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
        "PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
        "PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
        "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
        "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "SECTION_CODE_PATH" => $arResult["VARIABLES"]["SECTION_CODE_PATH"],
        "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
        "USE_SHARE" => $arParams["USE_SHARE"],
        "SHARE_HIDE" => $arParams["SHARE_HIDE"],
        "SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
        "SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
        "SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
        "SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
        "ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
        'STRICT_SECTION_CHECK' => "Y",
    ),
    $component,
    array("HIDE_ICONS" => "Y")
);
return;
endif;?>
<?
$ajax = $request->get("ajax-page");
$isAjax = $request->isAjaxRequest();
if($ajax == "Y" && $isAjax){
    $GLOBALS['APPLICATION']->RestartBuffer();
}
?>

<div id="js-object-detail" class="row">
    <div class="col-main">   
        <?$APPLICATION->IncludeComponent(
            "twim:catalog.section.list", 
            "section-apartments", 
            array(
                "COMPONENT_TEMPLATE" => ".default",
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "SECTION_ID" => "",
                "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
                "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
                "SECTION_CODE_PATH" => $arResult["VARIABLES"]["SECTION_CODE_PATH"],
                "COUNT_ELEMENTS" => "N",
                "TOP_DEPTH" => "5",
                "SECTION_FIELDS" => array(
                    1 => "LEFT_MARGIN",
                    2 => "RIGHT_MARGIN",
                ),
                "SECTION_USER_FIELDS" => array(
                    1 => "UF_BUILD",
                ),
                "SHOW_PARENT_NAME" => "Y",
                "SECTION_URL" => "",
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                "ADD_SECTIONS_CHAIN" => "N"
            ),
            $component
        );?>
        <?$ElementID = $APPLICATION->IncludeComponent(
            "twim:news.detail",
            "apartment",
            Array(
                "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                "DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
                "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
                "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
                "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
                "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                "META_KEYWORDS" => $arParams["META_KEYWORDS"],
                "META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
                "BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
                "SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
                "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
                "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                "SET_TITLE" => $arParams["SET_TITLE"],
                "MESSAGE_404" => $arParams["MESSAGE_404"],
                "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                "SHOW_404" => $arParams["SHOW_404"],
                "FILE_404" => $arParams["FILE_404"],
                "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
                "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                "DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
                "DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
                "PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
                "PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
                "CHECK_DATES" => $arParams["CHECK_DATES"],
                "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
                "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
                "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                "SECTION_CODE_PATH" => $arResult["VARIABLES"]["SECTION_CODE_PATH"],
                "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
                "USE_SHARE" => $arParams["USE_SHARE"],
                "SHARE_HIDE" => $arParams["SHARE_HIDE"],
                "SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
                "SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
                "SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
                "SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
                "ADD_ELEMENT_CHAIN" => "Y",//(isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
                'STRICT_SECTION_CHECK' => (isset($arParams['STRICT_SECTION_CHECK']) ? $arParams['STRICT_SECTION_CHECK'] : ''),
                
            ),
            $component
        );?>
    </div>
    <div class="col-xl-2 d-none d-xl-flex">
        <div class="title-main-slide">
            <div class="title-main-slide__text"><?$APPLICATION->ShowViewContent('left_vertical_title');?></div>
        </div>
    </div>
</div>
<?
if($ajax == "Y" && $isAjax){
    global $APPLICATION, $arSiteStel;
    $breadcrumb = $APPLICATION->GetNavChain();
    $title_browser = $APPLICATION->GetPageProperty("title") . " - " . $arSiteStel["SITE_NAME"];
    $title = $APPLICATION->GetTitle(false);
    ?>
    <div class="d-none" id="js-title-browser"><?=$title_browser?></div>
    <div class="d-none" id="js-title"><?=$title?></div>
    <div class="d-none" id="js-breadcrumb"><?=$breadcrumb?></div><?
    die();
}
?>
<?$idBuilds = Twim\Helper\GarbageStorage::get("BUILD_ID");
if(isset($idBuilds) && $idBuilds > 0){?>
  <div class="row">
    <div class="col-main">      
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.detail",
                "build",
                Array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "ADD_ELEMENT_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "BROWSER_TITLE" => "-",
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                    "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "N",
                    "DISPLAY_PICTURE" => "N",
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "ELEMENT_CODE" => "",
                    "ELEMENT_ID" => $idBuilds,
                    "FIELD_CODE" => array("",""),
                    "IBLOCK_ID" => IBLOCK_OBJECT_ID,
                    "IBLOCK_TYPE" => "catalog",
                    "IBLOCK_URL" => "",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "MESSAGE_404" => "",
                    "META_DESCRIPTION" => "-",
                    "META_KEYWORDS" => "-",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "",
                    "PROPERTY_CODE" =>  array(
                        0 => "ADDRESS",
                        1 => "DATE_FINISH",
                        2 => "ENUM_PROPS_OBJECT",
                        3 => "LINK_STAGE_BUILDINGS",
                        4 => "ICONS_ADVANTAGES",
                        5 => "MAP_POSITION",
                        6 => "TEXT_POSITION",
                        7 => "TABS_DESCRIPION",
                        8 => "CONTACT_PHONE",
                        9 => "MORTGAGE",
                        10 => "MILITORY_MORTGAGE",
                        11 => "MATERNITY_CAPITAL",
                        12 => "ICONS",
                        13 => "DESC_FINAL_FINISHING",
                        14 => "PHOTOS",
                        15 => "PHOTOS_FINAL_FINISHING",
                        16 => "PHOTOS_STAGE_BUILDINGS",
                        17 => "PHOTOS_PLAN",
                        18 => "DOCS",
                        19 => "IMAGE_QUEUE",
                        20 => "QUEUE",
                        21 => "ACTIVE_RECORD_EXCURSION",
                        22 => "PHOTOS_WIDE_SLIDER",
                        23 => "LOCATION_IMG",
                        24 => "MORTGAGE_DESC",
                        25 => "MILITORY_MORTGAGE_DESC",
                        26 => "MATERNITY_CAPITAL_DESC",
                    ),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_CANONICAL_URL" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "Y",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "STRICT_SECTION_CHECK" => "N",
                    "USE_PERMISSIONS" => "N",
                    "USE_SHARE" => "Y"
                ),
                $component,
                array("HIDE_ICONS" => "Y")
            );?>
    </div>
    <div class="col-xl-2 d-none d-xl-flex">
        <div class="title-main-slide">
            <div class="title-main-slide__text"><?=getMessage("OBJECT_TITLE")?></div>
        </div>
    </div>
</div>
<?$GLOBALS["arFilterOtherBuilds"] = ["!ID" => $idBuilds];?>
<div class="row d-print-none">
    <div class="col-main mb-30">
        <div class="d-flex justify-content-between align-items-center mb-35">
            <div class="h1 col-main_h1 mb-0 i_4"><?=getMessage("OTHER_OBJECT_TITLE")?></div>
        </div>
      <?

      $detail_url_folder=$arResult["FOLDER"];
//      if ($detail_url_folder=='/stroyawiesya_doma/')
//            $detail_url_folder='/buildings/under-construction/';

      $detail_url=$detail_url_folder.$arResult["URL_TEMPLATES"]["detail"];
//    if ($_REQUEST['dev'])
//    {
//        echo 'DETAIL_URL:'.$detail_url;
//        echo '$detail_url_folder:'.$detail_url_folder;
//    }
      ?>
        <?$APPLICATION->IncludeComponent("bitrix:news.list", "other-carusel", Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
            "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
            "AJAX_MODE" => "N",	// Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
            "CACHE_FILTER" => "Y",	// Кешировать при установленном фильтре
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
            "CHECK_DATES" => $arParams["CHECK_DATES"],
            "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
            "DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
            "DISPLAY_DATE" => "N",	// Выводить дату элемента
            "DISPLAY_NAME" => "Y",	// Выводить название элемента
            "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
            "DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
            "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
            "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
            "FILTER_NAME" => "arFilterOtherBuilds",	// Фильтр
            "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
            "IBLOCK_TYPE" => "catalog",
            "IBLOCK_ID" => IBLOCK_OBJECT_ID,
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
            "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
            "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
            "NEWS_COUNT" => "4",	// Количество новостей на странице
            "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
            "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
            "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
            "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
            "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
            "PAGER_TITLE" => "",	// Название категорий
            "PARENT_SECTION" => "",	// ID раздела
            "PARENT_SECTION_CODE" => "",	// Код раздела
            "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
            "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
            "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
            "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
            "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
            "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
            "SET_STATUS_404" => "N",	// Устанавливать статус 404
            "SET_TITLE" => "N",	// Устанавливать заголовок страницы
            "SHOW_404" => "N",	// Показ специальной страницы
            "SORT_BY1" => $arParams["SORT_BY1"],
            "SORT_ORDER1" => $arParams["SORT_ORDER1"],
            "SORT_BY2" => $arParams["SORT_BY2"],
            "SORT_ORDER2" => $arParams["SORT_ORDER2"],
            "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
            "DETAIL_URL" => $detail_url,
            "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
            "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
        ),
        $component,
        array("HIDE_ICONS" => "Y")
    );?>  
    </div>
</div>
<div class="row d-print-none">
    <div class="col-main mb-60">
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include", 
        ".default", 
        array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "banner",
            "EDIT_TEMPLATE" => "",
            "COMPONENT_TEMPLATE" => ".default",
            "PATH" => SITE_DIR ."includes/banner.php"
        ),
        $component,
        array("HIDE_ICONS" => "Y")                    
    );?>
    </div>
</div>
<div class="row d-print-none">
    <div class="col-main mb-60">
        <?
        $APPLICATION->IncludeFile(SITE_DIR."includes/filter.php", Array(), Array(
            "MODE"      => "php"
            ));
        ?>
    </div>
</div>
<div class="row d-print-none">
    <div class="col-main mb-30">
        <div class="builds-control">
            <div class="share builds-control_share">
                <div class="share__container">
                    <div class="share__wrapper">
                        <div class="share__btn pl-0">
                            <span><?echo getMessage("SHARE");?></span>
                        </div>
                        <div class="share__wrap-soc">
                            <ul class="share-soc share_share-soc">
                                <li>
                                    <button data-soc-share data-type="vk">
                                        <svg class="share-soc__icon">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/svg/icons.svg#vk"></use>
                                        </svg>
                                        <span class="sr-only"><?echo getMessage("SHARE");?> ВКонтакте</span>
                                    </button>
                                </li>
                                <li>
                                    <button data-soc-share data-type="ok">
                                        <svg class="share-soc__icon">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/svg/icons.svg#ok"></use>
                                        </svg>
                                        <span class="sr-only"><?echo getMessage("SHARE");?> Одноклассники</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="share__btn share__btn_icon">
                            <i class="fas fa-share-alt share__icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-print-page">
                <button class="btn-print" onclick="window.print();"><?echo getMessage("PRINT");?><i class="fas fa-print btn-print__icon"></i></button>
            </div>
        </div>
    </div>
</div> 
<?
}
?>