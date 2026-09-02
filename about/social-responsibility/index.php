<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "«Стэл-инвест» принимает активное участие в развитии, сохранении духовного и культурного наследия родного города.");
$APPLICATION->SetTitle("Социальная ответственность");
$APPLICATION->SetPageProperty("body_class", "page_social");
$APPLICATION->SetPageProperty("title", "Социальная ответственность");
?><div class="row">
	<div class="col-main">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"section",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(0=>"",),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "section",
		"USE_EXT" => "N"
	)
);?>
		<div class="about-social">
			<div class="box about-social_box">
				<blockquote class="quote quote_no-bg">
					<div class="quote__text">
						 «Помощь - это миссия<br>
						 неравнодушных»
					</div>
				</blockquote>
				<div class="box__text">
					<p>
						 С самого начала работы «Стэл-инвест» активно участвует в развитии родного города, сохранении и приумножении его духовного и культурного наследия. С недавних пор такая позиция стала называться «социальной ответственностью бизнеса». Но так ли важно официальное название, когда есть четкая осознанность того, что помощь – это миссия людей неравнодушных.
					</p>
				</div>
			</div>
			<div class="box">
				<div class="well well_left-img">
					<div class="well__wrap-img" data-responsive-background-image="">
 <img width="260" src="/images/about/911.jpg" height="230" alt="Храм" class="well__img d-none"><br>
					</div>
					<div class="well__text">
						<div class="h2">
							 Поддерживая духовное наследие
						</div>
						<p>
							 Воронежского края, компания неоднократно оказывала помощь в строительстве и ремонте храмов, церквей, духовно-патриотических центров.
						</p>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="row">
					<div class="col-12 col-sm-7">
						<div class="box__text">
							<div class="h2">
								 Помощь детским и социальным учреждениям
							</div>
							<p>
								 еще одна традиция, которая воплощается в финансировании ремонтных работ в домах-интернатах, больницах, ежегодном выделении средств для покупки новогодних сладких подарков для детей, находящихся на лечении в ОДКБ № 2.
							</p>
						</div>
					</div>
					<div class="col-12 col-sm-5">
 <img alt="Помощь детским и социальным учреждениям" src="/images/about/help-children.jpg" class="img-fluid" srcset="/images/about/help-children.jpg 1x, /images/about/help-children@2x.jpg 2x">
					</div>
				</div>
			</div>
			<div class="box">
				<div class="h2">
					 Регулярное финансирование спортклубов
				</div>
				<div class="row">
					<div class="col-12 col-sm-5">
 <img alt="Регулярное финансирование спортклубов" src="/images/about/sport-club.jpg" class="img-fluid mb-20" srcset="/images/about/sport-club.jpg 1x, /images/about/sport-club@2x.jpg 2x">
					</div>
					<div class="col-12 col-sm-7">
						<div class="box__text">
							<p>
								 «Стэл-инвест» регулярно финансирует деятельность спортклубов и организовывает спортивные мероприятия. Уже традиционной стала «Стэловская Лыжня» - корпоративные соревнования в зимних видах спорта, с чаепитием и угощением. Но самой волнующей для всего коллектива Специализированный застройщик «Стэл-инвест» - титульного партнера Воронежской Федерации бокса - является поддержка звезды воронежского бокса Анастасии Артамоновой. В свои 18 лет Настя уже одержала ряд серьезных побед на всероссийских и международных турнирах. Сейчас мастер спорта России международного класса Анастасия Артамонова входит в состав молодежной сборной команды России по боксу и готовится к Олимпийским играм 2020 г. в Токио.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="h2">
					 Уважение к старшим
				</div>
				<div class="box__text">
					<p>
						 Каждый год, в преддверии Дня Победы мы отправляем «праздничные экипажи» представителей организации к ветеранам и участникам Великой Отечественной Войны. Воздать им дань уважения, одарить подарками, порадовать стихами или песнями, хоть ненадолго отогреть души наших стариков – поверьте, это дорогого стоит. В 2017 году организованы и съемки фильма о детях войны, родственниках сотрудников, в котором они делятся воспоминаниями и размышлениями об этом страшном времени.
					</p>
				</div>
                <div>
                     <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/vaR34YWxNDg" allowfullscreen></iframe>
                      </div>
                    <br>
                </div>
				 <?$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"carusel-4by3",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_CLASS" => "",
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
		"COMPONENT_TEMPLATE" => "slider-4by3",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => "35",
		"FIELD_CODE" => array(0=>"",1=>"",),
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
		"PROPERTY_CODE" => array(0=>"",1=>"PHOTOS",2=>"",),
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
		"USE_SHARE" => "N"
	)
);?>
			</div>
		</div>
	</div>
	<div class="col-xl-2 d-none d-xl-flex">
		<div class="title-main-slide">
			<div class="title-main-slide__text">
				 Социальная ответственность
			</div>
		</div>
	</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>