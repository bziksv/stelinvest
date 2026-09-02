<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вакансии");
?><div class="row">
	<div class="col-main">
		<div class="jobs-text mb-45 clearfix">
 <img src="/images/jobs/jobs.jpg" alt="" class="img-fluid jobs-text__img">
			Работа в ООО Специализированный застройщик "Стэл-инвест" - это возможность профессионального и карьерного роста в серьезной компании с огромным опытом и перспективами. Мы можем с гордостью сказать, что строим город и его будущее, и каждый новый сотрудник может почувствовать свою сопричастность этому большому делу. В компании ценят и уважают опытных профессионалов и молодых коллег, выстраивая рабочие отношения на принципах взаимоуважения и взаимопомощи. <br>
 <br>
			 Наши сотрудники имеют возможности повышать свою квалификацию, участвовать в конкурсах профессионального мастерства, а заслуги наших коллег ежегодно отмечаются грамотами и благодарственными письмами городской и областной администраций, министерства регионального развития. Впрочем, мы умеем не только работать, но и отдыхать - в компании развиты традиции ежегодных спортивных праздников, мероприятий для детей сотрудников. <br>
 <br>
 <a href="/about/" class="btn btn-outline-primary">Узнать больше <span class="d-none d-sm-inline">о жизни коллектива</span> </a>
		</div>
		 <?$APPLICATION->IncludeComponent(
	"twim:vacancies",
	"jobs",
	Array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "jobs"
	)
);?>
	</div>
	<div class="col-xl-2 d-none d-xl-flex">
		<div class="title-main-slide">
			<div class="title-main-slide__text">
				Вакансии
			</div>
		</div>
	</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>