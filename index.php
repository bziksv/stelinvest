<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("body_class", "page_main");
$APPLICATION->SetPageProperty("title", "Продажа квартир от застройщика в Воронеже, купить новую квартиру в новостройке - Строительная компания СТЭЛ");
$APPLICATION->SetTitle("Главная");
?><div class="row main-slide mb-60">
	<div class="col-main">
		<div class="main-screen-wrap">
			<div class="main-screen">
                <img alt="СТЭЛ-Инвест" src="/local/templates/stelApative/svg/logo.svg" class="main-screen__logo d-print-block">
				<div class="main-screen__wrap-text">
					<div class="main-screen__wrap-year">
                        <img alt="40 лет" src="/local/templates/stelApative/images/40year.png" class="main-screen__year">
					</div>
					<div class="main-screen__container">
						<div class="main-screen__text">
                            <span class="d-inline d-md-none">40</span> ЛЕТ СОЗДАЕМ ПРОСТРАНСТВО ДЛЯ ЖИЗНИ
						</div>
						<div class="main-screen__motto">
							<br>
						</div>
						<div class="main-screen__about-link">
                            <a href="/about/" class="btn btn-outline-primary">О компании</a>
						</div>
					</div>
				</div>
				<div class="main-screen__go-catalog">
                    <a href="#main-new-builds" class="main-screen__link js-link-scroll">
					<div class="mouse main-screen__mouse">
					</div>
					<p>
						Выбрать квартиру от застройщика
					</p>
                     </a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-2 d-none d-xl-flex">
		<div class="title-main-slide">
			<div class="title-main-slide__text">
				СТЭЛ ИНВЕСТ
			</div>
		</div>
	</div>
</div>
<div class="content-page" id="main-new-builds" data-offset="40">
	 <?$GLOBALS["arFilterShowMainPage"] = ["PROPERTY_IN_MAIN" => "Y"]?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"list-builds-main",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "list-builds-main",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "arFilterShowMainPage",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "3",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "under-construction",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"ENUM_PROPS_OBJECT",1=>"PHOTOS_IN_MAIN",2=>"YT_VIDEO_LINK",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
	<div class="row">
		<div class="col-main mb-60">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "banner",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_DIR."includes/banner.php"
	)
);?>
		</div>
	</div>

	<div class="row d-print-none">
		<div class="col-main">
			<?
			$APPLICATION->IncludeFile(SITE_DIR."includes/filter.php", Array(), Array(
				"MODE"      => "php"
			));
			?>
			<div class="d-none d-sm-block mb-60">
			</div>
		</div>
	</div>

	<div class="row d-print-none">
		<div class="col-main mb-50">
			<div class="d-flex justify-content-between align-items-center mb-35">
				<div class="h1 col-main_h1 mb-0">
					НОВОСТИ
				</div>
				<div class="justify-self-end d-none d-sm-block">
 <a href="/news/" class="more-link more-link_long"> <span class="more-link__text">Все новости</span> </a>
				</div>
			</div>
			 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"news-carusel",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "articles",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "150",
		"PROPERTY_CODE" => array("",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
			<div class="d-sm-none">
 <a href="/news/" class="more-link more-link_long" rel="nofollow"> <span class="more-link__text">Все новости</span> </a>
			</div>
		</div>
		<div class="col-xl-2 d-none d-xl-flex">
			<div class="title-main-slide">
				<div class="title-main-slide__text">
					<!--noindex-->Новости компании<!--/noindex-->
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-main mb-30">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "advantagetext",
		"EDIT_TEMPLATE" => ""
	)
);?>
		</div>
		<div class="col-xl-2 d-none d-xl-flex">
			<div class="title-main-slide">
				<div class="title-main-slide__text">
					<!--noindex-->Наши особенности<!--/noindex-->
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-main">
			<div class="seo-text mb-60">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "seotext",
		"EDIT_TEMPLATE" => ""
	)
);?>
			</div>
		</div>
	</div>
</div><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>