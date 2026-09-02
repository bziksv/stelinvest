<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("body_class", "page_contacts");
$APPLICATION->SetTitle("Контакты");
?>

<div class="row">
	<div class="col-main">
		<div class="b-contacts" itemscope="" itemtype="http://schema.org/Organization">
			<div class="row">
				<div class="col-12 col-sm-6 col-lg-12">
 <span itemprop="name"><b>ООО Специализированный застройщик "Стэл-инвест"</b></span> <br>
					<div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
 <span itemprop="postalCode">394077</span> г. <span itemprop="addressLocality">Воронеж</span>, <br>
 <span itemprop="streetAddress">Московский проспект, 109а офис 1</span><br>
					</div>
					<p>
						 График работы с <span itemprop="openingHours">8:00 до 17:00<br>
						 перерыв с 12:00 до 13:00</span>
					</p>
					<p>
					<b>Реализация недвижимости:</b><br>
					<a href="tel:<?= $phoneSale1Call;?>" itemprop="telephone" class="roistat-phone-phoneSale1"><?= tplvar('phonesale1');?></a><br>
					
					</p>
				</div>
				<div class="col-12 col-sm-6 col-lg-12">
					<p>
					<b>Приемная:</b><br>
					<a href="tel:<?= $phoneCompanyCall;?>" itemprop="telephone" class="roistat-phone-phoneCompany"><?= tplvar('phonecompany');?></a>
					</p>
					<p>
					<b>Отдел снабжения:</b><br>
					<a href="tel:<?= $phoneSupplyCall;?>" itemprop="telephone" class="roistat-phone-phoneSupply"><?= tplvar('phonesupply');?></a>
					</p>
					<p>
					<b>Производственно-технический отдел:</b><br>
					<a href="tel:<?= $phoneProduceCall;?>" itemprop="telephone" class="roistat-phone-phoneProduce"><?= tplvar('phoneproduce');?></a>
					</p>
					<p>
					<b>E-mail:</b><br>
					<a href="mailto:<?=tplvar('emailcompany')?>" itemprop="email"><?=tplvar('emailcompany')?></a>
					</p>

				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-2 d-none d-xl-flex">
		<div class="title-main-slide">
			<div class="title-main-slide__text">
				 КОНТАКТНАЯ ИНФОРМАЦИЯ
			</div>
		</div>
	</div>
</div>
 <script>
    App.yaMapContacts();
</script> 

<?ob_start();?>
<div class="b-contacts-map">
	<div class="b-contacts-map__wrap-map">
		<div id="map-ya-contacts" class="b-contacts-map__map" data-coord="[51.712068, 39.178992]">
		</div>
	</div>
	<div class="b-contacts-map__backing">
	</div>
</div>
<?
$map_contacts_page = ob_get_contents();
ob_end_clean();
$APPLICATION->AddViewContent('map_contacts_page',$map_contacts_page); 
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>