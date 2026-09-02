<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>  
                        </div>
                    </div>
                </div>
            </main>
            <?$APPLICATION->ShowViewContent('map_contacts_page');?>
        </div>
            <footer class="footer">
                <div class="footer__background"></div>
                <div class="container-fluid footer_container">
                    <div class="row">
                        <div class="col-main">
                            <div class="row">
                                <div class="col-12 col-md-6 col-xll-4 col-offset-2">
                                    <div class="d-flex align-items-center">
                                        <p>
                                            <b><?=Loc::getMessage("FOOTER_TITLE_COMPANY");?></b> 
                                        </p>
                                        <img class="footer__old-logo d-print-none" src="<?=SITE_TEMPLATE_PATH?>/images/logo.png"  srcset="<?=SITE_TEMPLATE_PATH?>/images/logo.png 1x, <?=SITE_TEMPLATE_PATH?>/images/logo@2x.png 2x" alt="">
                                    </div>
                                    <br>
                                    <?
                                    $APPLICATION->IncludeFile(SITE_DIR."includes/footer_contacts_company.php", Array(), Array(
                                        "MODE"      => "php"
                                        ));
                                    ?>
                                </div>
                                <div class="col-12 col-md-6 col-xll-4">
                                    <p>
                                    <?
                                    $APPLICATION->IncludeFile(SITE_DIR."includes/footer_contacts_sale.php", Array(), Array(
                                        "MODE"      => "php"
                                        ));
                                    ?>
                                    </p>
                                    <span class="d-print-none"><?=Loc::getMessage("FOOTER_SOC_LINK_DESC");?></span>
                                    <div class="footer_nav-soc d-print-none">
                                        <?$APPLICATION->IncludeComponent("bitrix:menu", "soc", Array(
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
                                                "ROOT_MENU_TYPE" => "soc",	// Тип меню для первого уровня
                                                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                                            ),
                                            false
                                        );?>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-xll-4 d-print-none">
                                    <div class="row">
                                        <div class="d-none d-md-flex col-12 col-md-6 col-xll-12">
                                            <div class="footer_nav-bottom">
                                                <?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", Array(
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
                                                        "ROOT_MENU_TYPE" => "bottom",	// Тип меню для первого уровня
                                                        "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                                                    ),
                                                    false
                                                );?>
                                            </div>
                                        </div>
										
                                        <div class="col-12 col-md-6 col-xll-12">
											<noindex>
												<?
												$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/includes/build_company.php", Array(), Array(
													"MODE"      => "text",
													"SHOW_BORDER" => false 
													));
												?>
											 </noindex>
                                        </div>
										<div class="col-12 col-md-6 col-xll-12">

											<a href="https://prime-ltd.su/?from=stelinvest.ru" target="_blank" rel="nofollow">
											<img src="https://prime-ltd.su/logo/black.svg" 
											title="Продвижение сайтов" 
											alt="Продвижение сайтов"
											style="display: inline-block; vertical-align: top; max-width: 175px; height: auto;">
											</a>

											<br/>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>


<!-- === DISCLAIMER (hardcoded) === -->
<div class="col-12 col-md-6 offset-md-3 mx-auto">
    <br>
    <p>Наш сайт использует <a href="/legal/cookie.pdf" target="_blank">cookies</a> для обеспечения работоспособности и сбора статистики.</p> 
    <p>С их помощью мы анализируем пользовательскую активность, улучшаем работу сайта и делаем рекламу более релевантной. Оставаясь на сайте, вы даете <a href="/legal/consent.pdf" target="_blank">согласие</a> на обработку ваших персональных данных. Вы можете отключить сохранение cookies в настройках браузера в любой момент. На сайте также применяются <a href="/legal/recommendation.pdf" target="_blank">рекомендательные технологии.</a></p>
    <p>Подробнее об обработке персональных данных — в соответствующей <a href="/legal/personal-data.pdf" target="_blank">Политике.</a></p>
</div>
<!-- Мобильная распорка под виджеты -->
<div class="d-block d-md-none" style=";"></div>
<!-- === /DISCLAIMER === -->


                    </div>
                </div>
            </footer>
            <div class="callback d-none overflow-fix-p d-print-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3 col-lg-2 offset-sm-9 offset-lg-10">
                            <div class="callback__wrap">
                                <div class="callback__text">
                                    <button class="callback__btn">
                                        <svg class="callback__icon shakeCall animated infinite">
                                            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/svg/icons.svg#call"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include", 
            ".default", 
            array(
                "AREA_FILE_SHOW" => "sect",
                "AREA_FILE_SUFFIX" => "forms",
                "EDIT_TEMPLATE" => "",
                "COMPONENT_TEMPLATE" => ".default",
                "PATH" => "",
                "AREA_FILE_RECURSIVE" => "Y"
            ),
            false
        );?>
<link rel="stylesheet" href="https://cdn.envybox.io/widget/cbk.css">
<script type="text/javascript" src="https://cdn.envybox.io/widget/cbk.js?wcb_code=8d5accc10c5f9f3620aea800c64d2de3" charset="UTF-8" async></script>


<!-- Roistat коллтрекинг от Prime -->
<script>
(function(w, d, s, h, id) {
    w.roistatProjectId = id; w.roistatHost = h;
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
    var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', '5782398eca09a805f10616122917ec6d');
</script>


<!-- calltouch -->
<script>
(function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)},m=typeof Array.prototype.find === 'function',n=m?"init-min.js":"init.js";s.async=true;s.src="https://mod.calltouch.ru/"+n+"?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})(window,document,"ct","9raxvc4u");
</script>
<!-- calltouch -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(23072971, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<!-- /Yandex.Metrika counter -->

<div class="mcrm-inline-form" data-type="catalog" data-views="floor,bigGrid,smallGrid,plans" data-autoinit="false" data-autoshow="false"></div>

<script type="text/javascript">(function (d, w) {var n = d.getElementsByTagName("script")[0], s = d.createElement("script"); s.type = "text/javascript"; s.async = true; s.src = "https://api.macro.sbercrm.com/estate/embedjs/?domain="+window.location.host; n.parentNode.insertBefore(s, n)})(document, window)</script>

    </body>
</html>