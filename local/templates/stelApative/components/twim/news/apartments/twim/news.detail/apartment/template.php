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
?><div class="new-builds-detail">
    <?if($arResult["IMG_PLAN"]):?>
    <div class="b-photo__img mx-auto d-none d-print-block">
        <img class="b-photo__img d-block img-fluid mx-auto"  src="<?=$arResult["IMG_PLAN"]["n"]["src"]?>" alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["DESCRIPTION"]?>">
    </div>
    <?endif;?>
   <div class="row mb-30">
       <div class="col-12 col-md-6 d-print-none">
            <div class="b-photo">
                <div class="b-photo__container">
                    <div class="b-photo__wrap">
                        <div class="b-photo__carusel ">
                            <?if($arResult["IMG_PLAN_TOP"]):?>
                            <div class="b-photo__img">
                                <a href="<?=$arResult["IMG_PLAN_TOP"]["full"]["src"]?>" data-fancybox="detail-apartament" data-caption="<?=getMessage("TEXT_VIEW_UP_DESC")?>">
                                    <img src="<?=$arResult["IMG_PLAN_TOP"]["n"]["src"]?>" srcset="<?=$arResult["IMG_PLAN_TOP"]["n"]["src"]?> 1x, <?=$arResult["IMG_PLAN_TOP"]["2x"]["src"]?> 2x" alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["DESCRIPTION"]?>">
                                </a>
                            </div>
                            <?endif;?>
                            <?if($arResult["IMG_3D_PLAN"]):?>
                            <div class="b-photo__img">
                                <a href="<?=$arResult["IMG_3D_PLAN"]["full"]["src"]?>" data-fancybox="detail-apartament" data-caption="<?=getMessage("TEXT_VIEW_3D_DESC")?>">
                                    <img src="<?=$arResult["IMG_3D_PLAN"]["n"]["src"]?>" srcset="<?=$arResult["IMG_3D_PLAN"]["n"]["src"]?> 1x, <?=$arResult["IMG_3D_PLAN"]["2x"]["src"]?> 2x" alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["DESCRIPTION"]?>">
                                </a>
                            </div>
                            <?endif;?>
                            <?if($arResult["IMG_PLAN"]):?>
                            <div class="b-photo__img">
                                <a href="<?=$arResult["IMG_PLAN"]["full"]["src"]?>" data-fancybox="detail-apartament" data-caption="<?=getMessage("TEXT_PLAN_DESC")?>">
                                    <img src="<?=$arResult["IMG_PLAN"]["n"]["src"]?>" srcset="<?=$arResult["IMG_PLAN"]["n"]["src"]?> 1x, <?=$arResult["IMG_PLAN"]["2x"]["src"]?> 2x" alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["DESCRIPTION"]?>">
                                </a>
                            </div>
                            <?endif;?>
                        </div>   
                    </div>
                </div>
                <div class="b-photo__thumds">
                    <div class="b-photo__thumds-carusel d-md-none">
                        <?if($arResult["IMG_PLAN_TOP"]):?>
                            <div class="b-photo__thumds-item">
                                <div class="b-photo__wrap-thumds-img">
                                     <img class="b-photo__thumds-img"  
                                        src="<?=$arResult["IMG_PLAN_TOP"]["thumbs_n"]["src"]?>" 
                                        srcset="<?=$arResult["IMG_PLAN_TOP"]["thumbs_n"]["src"]?> 1x, <?=$arResult["IMG_PLAN_TOP"]["thumbs_2x"]["src"]?> 2x" 
                                        alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["DESCRIPTION"]?>">
                                </div>
                                <p class="b-photo__thumds-text"><span><?=getMessage("TEXT_VIEW_UP_DESC")?></span></p>
                            </div>
                        <?endif;?>
                        <?if($arResult["IMG_3D_PLAN"]):?>
                            <div class="b-photo__thumds-item">
                                <div class="b-photo__wrap-thumds-img">
                                     <img class="b-photo__thumds-img"  
                                        src="<?=$arResult["IMG_3D_PLAN"]["thumbs_n"]["src"]?>" 
                                        srcset="<?=$arResult["IMG_3D_PLAN"]["thumbs_n"]["src"]?> 1x, <?=$arResult["IMG_3D_PLAN"]["thumbs_2x"]["src"]?> 2x" 
                                        alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["DESCRIPTION"]?>">
                                </div>
                                <p class="b-photo__thumds-text"><span><?=getMessage("TEXT_VIEW_3D_DESC")?></span></p>
                            </div>
                        <?endif;?>
                        <?if($arResult["IMG_PLAN"]):?>
                            <div class="b-photo__thumds-item">
                                <div class="b-photo__wrap-thumds-img">
                                     <img class="b-photo__thumds-img"  
                                        src="<?=$arResult["IMG_PLAN"]["thumbs_n"]["src"]?>" 
                                        srcset="<?=$arResult["IMG_PLAN"]["thumbs_n"]["src"]?> 1x, <?=$arResult["IMG_PLAN"]["thumbs_2x"]["src"]?> 2x" 
                                        alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_PLAN"]["DESCRIPTION"]?>">
                                </div>
                                <p class="b-photo__thumds-text"><span><?=getMessage("TEXT_PLAN_DESC")?></span></p>
                            </div>
                        <?endif;?>
                    </div>
                    <div class="b-photo__thumds-tiles d-none d-md-flex">
                        <?if($arResult["IMG_PLAN_TOP"]):?>
                            <div class="b-photo__thumds-item b-photo__thumds-item_flex">
                                <div class="b-photo__wrap-thumds-img">
                                     <img class="b-photo__thumds-img"  
                                        src="<?=$arResult["IMG_PLAN_TOP"]["thumbs_n"]["src"]?>" 
                                        srcset="<?=$arResult["IMG_PLAN_TOP"]["thumbs_n"]["src"]?> 1x, <?=$arResult["IMG_PLAN_TOP"]["thumbs_2x"]["src"]?> 2x" 
                                        alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["DESCRIPTION"]?>">
                                </div>
                                <p class="b-photo__thumds-text"><span><?=getMessage("TEXT_VIEW_UP_DESC")?></span></p>
                            </div>
                        <?endif;?>
                        <?if($arResult["IMG_3D_PLAN"]):?>
                            <div class="b-photo__thumds-item b-photo__thumds-item_flex">
                                <div class="b-photo__wrap-thumds-img">
                                     <img class="b-photo__thumds-img"  
                                        src="<?=$arResult["IMG_3D_PLAN"]["thumbs_n"]["src"]?>" 
                                        srcset="<?=$arResult["IMG_3D_PLAN"]["thumbs_n"]["src"]?> 1x, <?=$arResult["IMG_3D_PLAN"]["thumbs_2x"]["src"]?> 2x" 
                                        alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_3D_PLAN"]["DESCRIPTION"]?>">
                                </div>
                                <p class="b-photo__thumds-text"><span><?=getMessage("TEXT_VIEW_3D_DESC")?></span></p>
                            </div>
                        <?endif;?>
                        <?if($arResult["IMG_PLAN"]):?>
                            <div class="b-photo__thumds-item b-photo__thumds-item_flex">
                                <div class="b-photo__wrap-thumds-img">
                                     <img class="b-photo__thumds-img"  
                                        src="<?=$arResult["IMG_PLAN"]["thumbs_n"]["src"]?>" 
                                        srcset="<?=$arResult["IMG_PLAN"]["thumbs_n"]["src"]?> 1x, <?=$arResult["IMG_PLAN"]["thumbs_2x"]["src"]?> 2x" 
                                        alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_PLAN"]["DESCRIPTION"]?>">
                                </div>
                                <p class="b-photo__thumds-text"><span><?=getMessage("TEXT_PLAN_DESC")?></span></p>
                            </div>
                        <?endif;?>
                        <?if($arResult["DISPLAY_PROPERTIES"]["LINK_VIR_TOUR"]["VALUE"]):?>
                            <div class="b-photo__thumds-item">
                                <a class="b-photo__thumds-link" data-view360 data-src="#modal-view360" href="javascript:;">
                                    <div class="b-photo__wrap-thumds-img">
                                        <img class="b-photo__thumds-img b-photo__thumds-img_360" src="<?=SITE_TEMPLATE_PATH?>/svg/360.svg" alt="<?=getMessage("TEXT_VIEW_360")?>">
                                    </div>
                                    <p class="b-photo__thumds-text"><span><?=getMessage("TEXT_VIEW_360")?></span></p>
                                </a>
                            </div>
                            <div style="display: none;" id="modal-view360">
                                <script src="https://widget.planoplan.com/etc/multiwidget/release/static/js/main.js"></script>
<div id="pop-widget"></div>
<script>    
Planoplan.init({
  width: '620px',
  height: '620px', 
  primaryColor: '#81AEE3',
  secondaryColor: '#F4F7F7',
  textColor: '#4A4A4A',
  backgroundColor: '#FFFFFF',
  fontFamily: 'Open Sans, sans-serif',
  activeTab: 'top',
  activeFloor: '0',
  activeDesign: '873032',
  uid: '<?=$arResult["DISPLAY_PROPERTIES"]["LINK_VIR_TOUR"]["VALUE"]?>',
  el: 'pop-widget',
  lang: 'ru',
  initialCamera: [
    {
      design: 873032,
      floor: 1,
      camera: 6
    }]
 });
</script>
                            </div>
                        <?endif;?>
                    </div> 
                </div>
            </div>
        </div>   
        <div class="col-12 col-md-6">
            <?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
                <div class="h2"><?=$arResult["NAME"]?></div>
            <?endif;?>
            <div class="mb-30">
                 <?if($arResult["DISPLAY_PROPERTIES"]["PROPS_APARTAMENT"]["VALUE"]):?>
                    <div class="row">
                         <?$halfAr = round((count($arResult["DISPLAY_PROPERTIES"]["PROPS_APARTAMENT"]["VALUE"]) / 2));
                        $arResult["PROPS_APARTAMENT_COLUMN"] = array_chunk($arResult["DISPLAY_PROPERTIES"]["PROPS_APARTAMENT"]["VALUE"], $halfAr, true);
                        foreach ($arResult["PROPS_APARTAMENT_COLUMN"] as  $column):?>
                        <div class="col-6">
                            <ul class="list-position-room">
                            <?foreach ($column as $id => $value):?>
                                <li class="list-position-room__item"><span><?=$arResult["DISPLAY_PROPERTIES"]["PROPS_APARTAMENT"]["DISPLAY_VALUE"][$id]?></span></li>
                            <?endforeach;?>     
                            </ul>
                        </div>
                        <?endforeach;?>     
                    </div>
                <?endif;?>
            </div>
            <div class="mb-30">
                <div class="wrap-print-page">
                    <a class="btn-print" target="_blank" href="<?=$arResult["DETAIL_PAGE_URL"]?>?print-plan=Y"><?=getMessage("BTN_PRINT_PLAN_DESC")?><i class="fas fa-print btn-print__icon"></i></a>
                </div>
            </div>
            <?if(!empty($arResult["DISPLAY_PROPERTIES"]["PRICE"])):?>
            <div class="mb-30">
                <div class="h2 mb-5"><?=getMessage("PRICE_APARTAMENT_DESC")?>:</div>
                <div class="new-builds-detail__price">
                   <?=rtrim(rtrim(number_format($arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"], 2, ',', ' '), '0'), ',');?> <?=getMessage("CURRENCY_RUB")?>
                </div>
            </div>
            <?endif;?>
            <div class="mb-30">
                <button data-toggle="modal" data-target="#modal-order"  data-object="<?=$arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]?>" class="btn btn-outline-primary"><?=getMessage("BTN_FEEDBACK_DESC")?></button>
                <button data-toggle="modal" data-target="#modal-callback"  data-object="<?=$arResult["DISPLAY_PROPERTIES"]["QUEUE"]["DISPLAY_VALUE"]?> <?=$arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]?>" class="btn btn-outline-primary"><?=getMessage("BTN_FEEDBACK_PRICE")?></button>
            </div>
            <div>
                <?if(!empty($arResult["SECTION"]["PATH"])):
                    $floor = end($arResult["SECTION"]["PATH"]);
                ?>
                <a href="<?=$floor["SECTION_PAGE_URL"]?>" class="back-link" data-switch-object="back"><i class="fas fa-long-arrow-alt-left mr-5"></i><?=getMessage("LINK_FLOOR_BACK_DESC")?></a>
                <?endif;?>
            </div>
        </div>
    </div> 
</div>
<script>
    App.initDetailApartament();
</script>