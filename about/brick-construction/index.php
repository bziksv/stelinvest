<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Компания «Стэл-инвест» гарантирует надежность и долговечность своих кирпичных домов. Данные типы сооружений выгодно выделяется на фоне панельных и монолитных домов.");
$APPLICATION->SetTitle("Кирпичное домостроение");
$APPLICATION->SetPageProperty("body_class", "page_brick-house-building");
$APPLICATION->SetPageProperty("title", "Кирпичное домостроение");
?>
<div class="row">
    <div class="col-main">
        <?$APPLICATION->IncludeComponent("bitrix:menu", "section", Array(
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
                "ROOT_MENU_TYPE" => "section",	// Тип меню для первого уровня
                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
            ),
            false
        );?>
        <div class="about-brick-house-building">
           <div class="box about-brick-house-building_box">
                <blockquote class="quote quote_no-bg">
                    <div class="quote__text">
                        Покупка жилья — выбор, совершаемый не на год, а на десятилетия. Конечно, прежде всего, будущих владельцев жилья интересует его стоимость, площадь и расположение. Но от того, какие материалы используются при строительстве, зависит уровень комфорта, микроклимат, звукоизоляция и особенности будущего ремонта. 
                    </div> 
                </blockquote>
                <div class="box__text">
                    <p>
                        В нашем городе можно выделить несколько основных технологий домостроения — кирпичное, панельное и монолитное. Кирпичная технология традиционно считается наиболее надежной и экологичной. Силикатный кирпич изготавливают из смеси извести и песка. Натуральный состав говорит об экологичности этого материала — в нем нет примесей, которые со временем будут выделяться в окружающую среду. 
                    </p>
                </div>
           </div>
           <div class="box">
                <div class="h1">
                    Преимущества кирпичного дома: 
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="box__text">
                            <div class="title-icon">
                                <div class="title-icon__wrap-icon">
                                    <img class="title-icon__img" src="<?=SITE_TEMPLATE_PATH?>/svg/calendar.svg" alt="calendar icon">
                                </div>
                                <div class="h2 title-icon__title">
                                    Надежность и долговечность
                                </div>
                            </div>
                            <p>
                                Кирпич — один из самых древних строительных материалов.  <br>
                                В отличие от природного камня кирпичу легче придать желаемую форму. Не удивительно, что именно из кирпича и подобных ему материалов строились самые известные в мире здания и объекты архитектурного наследия -  Кремль, Великая Китайская стена, Висячие сады Семирамиды. История наглядно показывает, что прочность данного материала позволяет зданиям стоять веками, сохраняя изначальный внешний вид. В Воронеже из кирпича построены звонница Акатова (Алексеевского) монастыря (1674 г.), здание ВГУ на проспекте революции (1882 г.), дом купца Халтурина на ул. Пятницкой, 42 (1890 г.) и многие другие признанные и непризнанные памятники архитектуры.
                            </p>
                        </div>
                        <br>
                        <img class="img-fluid mb-40" src="/images/about/brick-house-building3.jpg" srcset="/images/about/brick-house-building3.jpg 1x, /images/about/brick-house-building3@2x.jpg 2x"
                            alt="Надежность и долговечность">
                        <div class="box__text">
                            <div class="title-icon">
                                <div class="title-icon__wrap-icon">
                                    <img class="title-icon__img" src="<?=SITE_TEMPLATE_PATH?>/svg/fire.svg" alt="fire icon">
                                </div>
                                <div class="h2 title-icon__title">
                                    Огнестойкость
                                </div>
                            </div>
                            <p>Кирпич является негорючим материалом, что значительно снижает риск воспламенения и возникновения пожара. В случае возникновения пожара, этот материал не выделяет токсичных газов, а сами кирпичные стены сохраняют свою целостность и подлежат восстановлению.</p>
                        </div>   
                    </div>
                    <div class="col-12 col-sm-6">
                        <img class="img-fluid mb-40" src="/images/about/brick-house-building2.jpg" srcset="/images/about/brick-house-building2.jpg 1x, /images/about/brick-house-building2@2x.jpg 2x"
                            alt="Эстетичность даже спустя десятилетия">
                        <div class="box__text">
                            <div class="title-icon">
                                <div class="title-icon__wrap-icon">
                                    <img class="title-icon__img" src="<?=SITE_TEMPLATE_PATH?>/svg/twobuildings.svg" alt="twobuildings icon">
                                </div>
                                <div class="h2 title-icon__title">
                                    Эстетичность даже спустя десятилетия
                                </div>
                            </div>
                            <p>Каждый кирпичный дом может считаться образцом элегантности и надежности. Он всегда смотрится цельно, солидно, монументально. Кроме того, разнообразная цветовая палитра кирпича позволяет играть с цветами в фасадах домов, делая новостройки ярче и оригинальнее.</p>
                        </div>   
                        <br>
                        <div class="box__text">
                            <div class="title-icon">
                                <div class="title-icon__wrap-icon">
                                    <img class="title-icon__img" src="<?=SITE_TEMPLATE_PATH?>/svg/thermometer.svg" alt="thermometer icon">
                                </div>
                                <div class="h2 title-icon__title">
                                   Оптимальный микроклимат в квартире
                                </div>
                            </div>
                            <p>Кирпич имеет пористую структуру, а это значит, что он может хранить тепло. В холодные дни он сохраняет тепло от солнечных лучей, а в жаркую погоду — предотвращает перегрев здания, сдерживая теплый воздух. Кроме того, в отличие от бетона, кирпич пропускает мельчайшие частицы воздуха, позволяя дому “дышать”. Именно поэтому в кирпичных домах не жарко летом и не душно зимой. Конечно, эти свойства не заменят вентиляцию и проветривание, однако сгладит перепады влажности. Кроме того, известь, входящая в состав кирпича, препятствует появлению микроорганизмов, которые могут нанести вред здоровью.</p>
                        </div>   
                    </div>   
                </div>
            </div>
            <div class="box mb-30">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="box__text">
                            <div class="title-icon">
                                <div class="title-icon__wrap-icon">
                                    <img class="title-icon__img" src="<?=SITE_TEMPLATE_PATH?>/svg/plan.svg" alt="plan icon">
                                </div>
                                <div class="h2 title-icon__title">
                                    Перепланировка
                                </div>
                            </div>
                            <p>
                                Кирпичные здания, в отличие от панельных, устроены так, что, при соответствующих проектных доработках, внутренние перегородки, не являющиеся несущими элементами здания, можно перенести; дверные проемы можно расширить или сузить и таким образом изменить конфигурацию помещения. Все это дает возможность в будущем организовывать внутреннее пространство Вашей квартиры в соответствие с новыми тенденциями дизайна и отделки, да и просто в соответствии с Вашими желаниями. Ведь, как уже сказано выше, Вы покупаете жилье не на пару лет, не так ли?
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <img class="img-fluid" src="/images/about/brick-house-building.jpg" srcset="/images/about/brick-house-building.jpg 1x, /images/about/brick-house-building@2x.jpg 2x"
                            alt="Перепланировка">
                    </div>
                </div>
            </div>
            <div class="box">
                <p class="company__footnote">
                    <small>[1] По материалам исследователя по истории развития кирпичного дела в Воронеже, профессора В.И.Щербакова</small>
                </p>
            </div>
            <div class="box">
            <?$APPLICATION->IncludeComponent(
                 "bitrix:news.detail", 
                 "carusel-4by3", 
                 array(
                     "ACTIVE_DATE_FORMAT" => "d.m.Y",
                     "ADD_ELEMENT_CHAIN" => "N",
                     "ADD_SECTIONS_CHAIN" => "N",
                     "AJAX_MODE" => "N",
                     "AJAX_OPTION_ADDITIONAL" => "",
                     "AJAX_OPTION_HISTORY" => "N",
                     "AJAX_OPTION_JUMP" => "N",
                     "AJAX_OPTION_STYLE" => "N",
                     "BROWSER_TITLE" => "-",
                     "CACHE_GROUPS" => "N",
                     "CACHE_TIME" => "36000000",
                     "CACHE_TYPE" => "A",
                     "CHECK_DATES" => "N",
                     "DETAIL_URL" => "",
                     "DISPLAY_BOTTOM_PAGER" => "N",
                     "DISPLAY_DATE" => "N",
                     "DISPLAY_NAME" => "N",
                     "DISPLAY_PICTURE" => "N",
                     "DISPLAY_PREVIEW_TEXT" => "Y",
                     "DISPLAY_TOP_PAGER" => "N",
                     "ELEMENT_CODE" => "",
                     "ELEMENT_ID" => "36",
                     "FIELD_CODE" => array(
                         0 => "",
                         1 => "",
                     ),
                     "IBLOCK_ID" => "4",
                     "IBLOCK_TYPE" => "media",
                     "IBLOCK_URL" => "",
                     "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                     "MESSAGE_404" => "",
                     "META_DESCRIPTION" => "-",
                     "META_KEYWORDS" => "-",
                     "PAGER_BASE_LINK_ENABLE" => "N",
                     "PAGER_SHOW_ALL" => "N",
                     "PAGER_TEMPLATE" => ".default",
                     "PAGER_TITLE" => "Страница",
                     "PROPERTY_CODE" => array(
                         0 => "",
                         1 => "PHOTOS",
                         2 => "",
                     ),
                     "SET_BROWSER_TITLE" => "N",
                     "SET_CANONICAL_URL" => "N",
                     "SET_LAST_MODIFIED" => "N",
                     "SET_META_DESCRIPTION" => "N",
                     "SET_META_KEYWORDS" => "N",
                     "SET_STATUS_404" => "N",
                     "SET_TITLE" => "N",
                     "SHOW_404" => "N",
                     "STRICT_SECTION_CHECK" => "N",
                     "USE_PERMISSIONS" => "N",
                     "USE_SHARE" => "N",
                     "COMPONENT_TEMPLATE" => "slider-4by3",
                     "ADD_CLASS" => ""
                 ),
                 false
             );?>
            </div>
        </div>
    </div>
    <div class="col-xl-2 d-none d-xl-flex">
        <div class="title-main-slide">
            <div class="title-main-slide__text">Кирпичное домостроение</div>
        </div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>