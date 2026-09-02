<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Основные преимущества компании «Стэл-инвест» – возведение жилой и коммерческой недвижимости из экологически чистых строй материалов. Ответственный подход от начала строительства и до сдачи квартир в эксплантацию.");
$APPLICATION->SetPageProperty("title", "Наши преимущества");
$APPLICATION->SetPageProperty("body_class", "page_advantages");
$APPLICATION->SetTitle("Наши преимущества");
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
		<div class="about-advantages">
			<div class="box">
				<div class="row">
					<div class="col-12 col-sm-6">
						 <?$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"slider-4by3",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_CLASS" => "list-slider_m-right",
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
		"ELEMENT_ID" => "29",
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
					<div class="col-12 col-sm-6">
						<div class="title-icon">
							<div class="title-icon__wrap-icon">
 <img alt="wall icon" src="/local/templates/stelApative/svg/wall.svg" class="title-icon__img">
							</div>
							<div class="h2 title-icon__title">
								 Кирпичное домостроение
							</div>
						</div>
						<div class="box__text">
							<p>
								 Силикатный кирпич - экологически чистый строительный материал. Его составляющие компоненты - известь и песок. Он широко используется в развитых странах из-за своих характеристик: прочность, точность по геометрическим размерам, эстетический внешний вид, звукоизоляция. Кирпич считается «дышащим» материалом, что позволяет обеспечивать в квартире оптимальный микроклимат в любое время года.
							</p>
							<p>
								 Стены в домах «Стэл-инвеста» возводятся по технологии трехслойной кирпичной кладки с применением утеплителя. Толщина внешней стены «Стэловского» дома - 77 см.
							</p>
 <a href="/about/brick-construction/" class="btn btn-outline-primary">Подробнее</a>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="row">
					<div class="col-12 col-sm-6">
						<div class="title-icon">
							<div class="title-icon__wrap-icon">
 <img alt="key icon" src="/local/templates/stelApative/svg/key.svg" class="title-icon__img">
							</div>
							<div class="h2 title-icon__title">
								 Отделка квартир под ключ
							</div>
						</div>
						<div class="box__text">
							<p>
								 Наши квартиры традиционно сдаются с полной чистовой отделкой. Базовый вариант включает в себя обои, линолеум, натяжные потолки, пластиковые окна и металлические двери. Однако технологии отделки и инженерные системы постоянно совершенствуются, и от объекта к объекту вводятся новшества — например, керамогранит на полу в прихожей, фильтры грубой очистки или места установки кондиционеров.
							</p>
 <a href="/about/our-advantages/furnish-of-apartments-turnkey" class="btn btn-outline-primary">Подробнее</a>
						</div>
					</div>
					<div class="col-12 col-sm-6">
						 <?$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"slider-4by3",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_CLASS" => "list-slider_m-left",
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
		"ELEMENT_ID" => "30",
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
			<div class="box">
				<div class="row">
					<div class="col-12 col-sm-6">
						<div class="title-icon">
							<div class="title-icon__wrap-icon">
 <img alt="wallet icon" src="/local/templates/stelApative/svg/wallet.svg" class="title-icon__img">
							</div>
							<div class="h2 title-icon__title">
								 Финансовая стабильность
							</div>
						</div>
						<div class="box__text">
							<p>
								 Даже в кризисный период наши дольщики могут быть уверены в надежности своих вложений.&nbsp;&nbsp;Реализация квартир начинается не ранее чем на стадии строительства 3 этажа. Такой подход не позволяет строить жилье огромными объемами и вкладывать в сверхамбициозные проекты, однако говорит о стабильности и финансовой устойчивости компании.&nbsp;
							</p>
						</div>
					</div>
					<div class="col-12 col-sm-6">
						<div class="title-icon">
							<div class="title-icon__wrap-icon">
 <img alt="star icon" src="/local/templates/stelApative/svg/star.svg" class="title-icon__img">
							</div>
							<div class="h2 title-icon__title">
								 Безупречная репутация
							</div>
						</div>
						<div class="box__text">
							<p>
								 За все время работы застройщик ООО Специализированный застройщик «Стэл-инвест» ни разу не переносил сроков сдачи объектов ни на один день. Имя компании не связано со скандалами или громкими судебными процессами. Мы стремимся всегда выполнять свои обязательства и разрешать спорные вопросы путем разумного компромисса.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="title-icon">
					<div class="title-icon__wrap-icon">
 <img alt="build wall icon" src="/local/templates/stelApative/svg/build-wall.svg" class="title-icon__img">
					</div>
					<div class="h2 title-icon__title">
						 Порядок на стройке
					</div>
				</div>
				<div class="box__text">
					<p>
						 Перед началом работы на каждой стройплощадке проводится тщательная проработка всех технических условий, разрабатывается проект организации строительства и выполняются требования служб города. В ходе работ проводится комплексное благоустройство части жилмассива, выполняется гидропромывка канализационной магистрали, если таковая требуется, увеличивается количество высоковольтных кабелей для более стабильного электроснабжения, производится реконструкция котельных. Благодаря этому, впоследствии удается избежать срыва ввода в эксплуатацию жилья. В ходе строительства на площадке всегда царит рабочая атмосфера: комиссия качества, технический надзор и инженер по охране труда контролируют выполнение всех норм, каждый работник знает, что от него требуется, соблюдает дисциплину труда, правила безопасности и поддерживает чистоту рабочего места. Все рабочие обеспечены необходимым комплектом спецодежды для зимнего и летнего времени года, средствами индивидуальной защиты, позволяющими вести работы как на первых этажах, так и на высоте. Организован и быт персонала на стройках — на каждом объекте есть оборудованные всем необходимым мобильные бытовые помещения, а также хозяйственные и санитарные помещения.
					</p>
				</div>
			</div>
			<div class="box">
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
		"ELEMENT_ID" => "31",
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
			<div class="box">
				<div class="title-icon">
					<div class="title-icon__wrap-icon">
 <img alt="like icon" src="/local/templates/stelApative/svg/like.svg" class="title-icon__img">
					</div>
					<div class="h2 title-icon__title">
						 Контролируем качество на всех этапах
					</div>
				</div>
				<div class="box__text">
					<p>
						 ООО Специализированный застройщик «Стэл-инвест» имеет комиссию качества и технический надзор. Эти службы контролируют и принимают качество выполненных работ в соответствии с проектной документацией и строительными нормами. Кроме того, мы работаем только с серьезными проверенными поставщиками и подрядчиками.
					</p>
					<p>
						 Мы считаем, что лучше заплатить за товар или услугу реальную цену, чем получить дешевый продукт сомнительного качества. Мы не экономим на качестве строительных материалов, не сокращаем сроки строительства так, чтобы это вело к нарушению технологий многих процессов.
					</p>
				</div>
			</div>
			<div class="box">
				<div class="row">
					<div class="col-12 col-sm-6">
						 <?$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"slider-4by3",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_CLASS" => "list-slider_m-right",
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
		"ELEMENT_ID" => "32",
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
					<div class="col-12 col-sm-6">
						<div class="title-icon">
							<div class="h2 title-icon__title">
								 Корпоративные конкурсы профмастерства
							</div>
						</div>
						<div class="box__text">
							<p>
								 В компании собственные соревнования каменщиков, сварщиков и плотников. Каменщики «Стэла» регулярно участвуют и занимают призовые места на отраслевых конкурсах профессионального мастерства.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="row">
					<div class="col-12 col-sm-6">
						<div class="title-icon">
							<div class="title-icon__wrap-icon">
 <img alt="man icon" src="/local/templates/stelApative/svg/man.svg" class="title-icon__img">
							</div>
							<div class="h2 title-icon__title">
								 Команда профессионалов
							</div>
						</div>
						<div class="box__text">
							<p>
								 Рост и развитие любого предприятия был бы невозможен без сильной команды. Наши сотрудники — высококлассные специалисты с профильным образованием, но прежде всего мы – единомышленники, которых объединяют общие ценности и идеи.
							</p>
							<p>
								 Основной кадровый принцип ООО Специализированный застройщик «Стэл-инвест» - сочетать мудрость профессионального опыта с инициативностью пытливого молодого специалиста. Мы даем возможность молодым реализовывать свой потенциал и расти по карьерной лестнице. Компания финансирует сотрудникам посещение обучающих семинаров и тренингов, отраслевых выставок и других мероприятий. Пожалуй, неудивительно, что в ООО Специализированный застройщик «Стэл-инвест» низкая текучесть персонала.
							</p>
							<p>
								 В «Стэле» существуют и многочисленные традиции, которые помогают формировать в коллективе теплую дружескую атмосферу. У нас принято вместе отмечать радостные моменты, заниматься спортом, радовать детей и помогать пожилым. Каждый год в компании проводятся корпоративные праздники, детские утренники, акции помощи ветеранам ВОВ, лыжня и конкурсы профессионального мастерства.
							</p>
						</div>
					</div>
					<div class="col-12 col-sm-6">
						 <?$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"slider-4by3",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_CLASS" => "list-slider_m-left",
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
		"ELEMENT_ID" => "33",
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
			<div class="box">
				<div class="company__quote-bottom">
					<blockquote class="quote quote_photo">
						<div class="quote__photo">
							<div class="quote__wrap-img" data-responsive-background-image="">
 <img src="/images/about/sboev.jpg" srcset="/images/about/sboev.jpg 1x, /images/about/sboev@2x.jpg 2x" alt="Сбоев" class="quote__img d-none">
							</div>
						</div>
						<div class="quote__text">
							<p class="quote__author">
								 Константин Сбоев, каменщик, работает с момента основания компании:
							</p>
							 «В молодости я не предполагал, что буду работать на стройке. Но сейчас, оглядываясь на свою судьбу, я понимаю: если бы мне дали шанс прожить вторую жизнь, ничего бы не стал менять».
						</div>
					</blockquote>
				</div>
			</div>
			<div class="box">
				<div class="title-icon">
					<div class="h2 title-icon__title">
						 Наши партнеры и подрядчики
					</div>
				</div>
				<div class="box__text">
					<p>
						 О надежности компании свидетельствует и выбор постоянных партнеров и подрядчиков. Проектирование объектов выполняют ведущие институты - ОАО «Воронежпроект», ЗАО «Гипрокоммундортранс». Основными поставщиками строительных материалов являются крупнейшие в регионе заводы: ЗАО «ВКСМ», ЖБК,&nbsp; ЖБИ 2 и др.
					</p>
				</div>
				<div>
 <br>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-2 d-none d-xl-flex">
		<div class="title-main-slide">
			<div class="title-main-slide__text">
				 Наши преимущества
			</div>
		</div>
	</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>