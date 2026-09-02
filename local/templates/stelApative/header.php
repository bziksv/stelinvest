<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
use Bitrix\Main\Page\Asset, 
    Bitrix\Main\Context, 
    Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

CJSCore::Init(array('ajax'));

// add js, css, string in head
$Asset = Asset::getInstance();
$Asset->addJs(SITE_TEMPLATE_PATH . "/build/script.min.js");
$Asset->addJs(SITE_TEMPLATE_PATH . "/js/lang/".LANGUAGE_ID.".js");
$Asset->addJs(SITE_TEMPLATE_PATH . "/js/init.js?v=2");
//$Asset->addJs(SITE_TEMPLATE_PATH . "/build/init.min.js");
$Asset->addCss(SITE_TEMPLATE_PATH . "/build/style.min.css");


$request = Context::getCurrent()->getRequest(); 
$requestPage = $request->getRequestedPage();  // current page    
$isAjax = $request->isAjaxRequest(); // is ajax

// is main page
$IS_MAIN = 'N';
if ($requestPage  === SITE_DIR.'index.php') {$IS_MAIN = 'Y';}
// name site
global $arSiteStel;
$arSiteStel = Bitrix\Main\SiteTable::GetByID(SITE_ID)->Fetch();
$arRoles = $APPLICATION->GetUserRoles("main");
if ($arRoles != array("D")){
    define("IS_ADMIN", "Y");
}

$phoneSale1Call = \Twim\Helper\StelApp::clearPhone(tplvar('phonesale1'));
$phoneSale2Call = \Twim\Helper\StelApp::clearPhone(tplvar('phonesale2'));
$phoneCompanyCall = \Twim\Helper\StelApp::clearPhone(tplvar('phonecompany'));
$phoneSupplyCall = \Twim\Helper\StelApp::clearPhone(tplvar('phonesupply'));
$phoneProduceCall = \Twim\Helper\StelApp::clearPhone(tplvar('phoneproduce'));
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>" class="no-js">
<head>
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET;?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?     
    $APPLICATION->ShowMeta("keywords");
    $APPLICATION->ShowMeta("description");
    ?>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel='shortcut icon' type='image/ico' href='<?=SITE_TEMPLATE_PATH?>/favicon/favicon.ico' />



    <script>
        document.documentElement.className = document.documentElement.className.replace("no-js", "js");
        window.onload = function () {
            var preloader = document.querySelector(".preloader");
            setTimeout(function () {
                preloader.className = preloader.className + " preloader_fade";
            }, 300);
        };
    </script>
    <script>
        var SITEPARAMS = {};
        SITEPARAMS.templatePath = "<?=SITE_TEMPLATE_PATH?>";
        SITEPARAMS.siteLang = "<?=LANGUAGE_ID?>";
    </script>
    <?
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();
    $APPLICATION->ShowCSS();
    ?>
    <title><?$APPLICATION->ShowTitle();?><?if($IS_MAIN != "Y"):?> - <?=$arSiteStel["SITE_NAME"]?><?endif;?></title>






</head>
<body class="page <?=$APPLICATION->AddBufferContent('getPageClass')?> overflow-fix-m">


<div id="panel" class="d-print-none">
    <?$APPLICATION->ShowPanel();?>
</div>

<div class="preloader"></div>
 <div class="wrapper">
    <div class="grid-lines overflow-fix-m">
        <div class="container-fluid">
            <div class="row grid-lines_row">
                <div class="grid-lines__line grid-lines__line_center"></div>
                <div class="col grid-lines_col">
                    <div class="grid-lines__line grid-lines__line_right"></div>
                </div>
                <div class="col grid-lines_col">
                    <div class="grid-lines__line grid-lines__line_left"></div>
                    <div class="grid-lines__line grid-lines__line_right"></div>
                </div>
                <div class="col-5 col-xl-4 grid-lines_col"></div>
                <div class="col-5 col-xl-4 grid-lines_col">
                    <div class="grid-lines__line grid-lines__line_right d-xl-none"></div>
                </div>
                <div class="col col-xl-1 grid-lines_col d-none d-xl-flex">
                    <div class="grid-lines__line grid-lines__line_left"></div>
                </div>
                <div class="col col-xl-1 grid-lines_col d-none d-xl-flex">
                    <div class="grid-lines__line grid-lines__line_left-left"></div>
                    <div class="grid-lines__line grid-lines__line_left"></div>
                </div>
            </div>
        </div>
    </div>
    <?if($IS_MAIN == "Y"):?>
        <div class="main-bg">
            <img class="main-bg__img overflow-fix-p" src="<?=SITE_TEMPLATE_PATH?>/images/bg-main-desktop-dark.jpg" alt="">
            <img class="main-bg__mask" src="<?=SITE_TEMPLATE_PATH?>/svg/mask-main.svg" alt="">
            <div class="main-bg__img-bg"></div>
        </div>
        <div class="page-bg"><div class="page-bg__crane"></div></div>
    <?endif;?>   
    <div class="main-menu d-lg-none" data-mobile-menu>
        <div class="main-menu__scroll-container">
            <div class="main-menu__wrap">
                <div class="main-menu__vcenter">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "mobile", Array(
                        "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                            "DELAY" => "N",	// Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "1",	// Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                0 => "",
                            ),
                            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                            "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        ),
                        false
                    );?>
                    <div class="call-contacts main-menu_call-contacts">
                        <p class="call-contacts__phone">
                            <a href="tel:<?=$phoneSale1Call;?>" class="roistat-phone-phoneSale1-href"><b><?= tplvar('phonesale1');?></b></a>
                        </p>
                        <span class="call-contacts__text"><?=Loc::getMessage("HEADER_SALES_DEPARTMENT");?></span>
                    </div>
                    <div class="call-contacts main-menu_call-contacts">
                        <p class="call-contacts__phone">
                             <a href="tel:<?=$phoneCompanyCall;?>" class="roistat-phone-phoneCompany-href"><b><?= tplvar('phonecompany');?></b></a>
                        </p>
                        <span class="call-contacts__text"><?=Loc::getMessage("HEADER_RECEPTION");?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu__line"></div>
        <div class="main-menu__line"></div>
    </div>
    <div class="content">
        <header class="header fixed-top">
            <button class="hamburger hamburger--boring header_hamburger" type="button" data-toggle-mobile-menu>
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
            <p class="header__phone">
                <a href="tel:<?=$phoneSale1Call;?>" class="header__phone-link"><b><?= tplvar('phonesale1');?></b></a>
            </p>
            <a href="<?=SITE_DIR?>"><img class="header__logo" src="<?=SITE_TEMPLATE_PATH?>/svg/logo-m.svg" alt="<?=Loc::getMessage("HEADER_TITLE_COMPANY");?>"></a>
        </header>
        <div class="container d-none d-print-block print-header">
            <a href="<?=SITE_DIR?>">
                <img class="print-header__logo" src="<?=SITE_TEMPLATE_PATH?>/svg/logo.svg" alt="<?=Loc::getMessage("HEADER_TITLE_COMPANY");?>">
            </a>
        </div>
        <div class="container-fluid">
            <div class="row d-print-none">
                <div class="leftbar d-none d-lg-block overflow-fix-m">
                    <div class="col-lg-2 col-xl-2 leftbar__wrap">
                        <a href="<?=SITE_DIR?>">
                            <img class="logo leftbar_logo" src="<?=SITE_TEMPLATE_PATH?>/svg/logo.svg" alt="<?=Loc::getMessage("HEADER_TITLE_COMPANY");?>">
                        </a>
                        <?$APPLICATION->IncludeComponent("bitrix:menu", "left", Array(
                            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                "MAX_LEVEL" => "1",	// Уровень вложенности меню
                                "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                    0 => "",
                                ),
                                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                                "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                                "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                            ),
                            false
                        );?>
                        <div class="call-contacts leftbar_call-contacts">
                            <p class="call-contacts__phone">
                                <a href="tel:<?=$phoneSale1Call;?>" class="roistat-phone-phoneSale1-href"><b class="roistat-phone-phoneSale1"><?= tplvar('phonesale1');?></b></a>
                            </p>
                            <span class="call-contacts__text"><?=Loc::getMessage("HEADER_SALES_DEPARTMENT");?></span>
                        </div>
                        <div class="call-contacts leftbar_call-contacts">
                            <p class="call-contacts__phone">
                                <a href="tel:<?=$phoneCompanyCall;?>" class="roistat-phone-phoneCompany-href"><b class="roistat-phone-phoneCompany"><?= tplvar('phonecompany');?></b></a>
                            </p>
                            <span class="call-contacts__text"><?=Loc::getMessage("HEADER_RECEPTION");?></span>
                        </div>
                    </div>
                </div>
                <div class="title-menu overflow-fix-p">
                    <div class="row">
                        <div class="col-lg-2 col-xl-2">
                            <div class="title-menu__text text-uppercase">
                                <!--noindex--><?=Loc::getMessage("HEADER_MENU");?><!--/noindex-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main class="container-fluid">
            <div class="workarea">
                <?if($IS_MAIN != "Y"):?>
                <div class="row">
                    <div class="col-main">
                        <h1 class="title-page mt-10"><?$APPLICATION->ShowTitle(false)?></h1>
                        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array(
                                "PATH" => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                                "SITE_ID" => SITE_ID,    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                                "START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
                            ),
                            false
                        );?>
                    </div>
                </div>
                <?endif;?>
                <?=$APPLICATION->AddBufferContent('getPageFix')?>