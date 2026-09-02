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
$this->setFrameMode(true);?>
<div class="new-builds-detail">      
    <?if($arResult["PROPERTIES"]["SHOW_CONTACT_PHONE"]["VALUE"] !== "Y"):?>
    <?if($arResult["DISPLAY_PROPERTIES"]["CONTACT_PHONE"]["VALUE"]):?>
    <div class="info mb-20">
        <div class="info__wrap-icon d-print-none">
            <span class="info__icon">!</span>
        </div>
        <div class="info__text">
            <?=getMessage("MESSAGE_CALLBACK_DESC");?> <?=$arResult["DISPLAY_PROPERTIES"]["CONTACT_PHONE"]["DISPLAY_VALUE"]?>
        </div>
    </div>
    <?endif;?>
    <?endif;?>
    <?if($arResult["PROPERTIES"]["SHOW_NOTE_AREA_BALCON"]["VALUE"] !== "Y"):?>
    <div class="info mb-40">
        <div class="info__wrap-icon d-print-none">
            <span class="info__icon">!</span>
        </div>
        <div class="info__text">
            <?=getMessage("T_NOTE_AREA_BALCON");?>
        </div>
    </div>
    <?endif;?>
    <?if(!empty($arResult["PHOTOS"])):?>
    <div class="slider-with-thumbs d-print-none mb-50">   
        <div class="full-slider">
            <?foreach ($arResult["PHOTOS"] as $key => $arPhoto):?>
                <div class="full-slider__item">
                    <div class="full-slider__wrap-img" data-responsive-background-image>
                        <img class="full-slider__img d-none" sizes="100vw" 
                            src="<?=$arPhoto["sm"]["src"]?>" 
                            srcset="<?=$arPhoto["sm"]["src"]?> 640w, <?=$arPhoto["md"]["src"]?> 1280w, <?=$arPhoto["xl"]["src"]?> 1281w"
                            alt="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["DESCRIPTION"][$key]?>"
                        >
                    </div>
                </div>
            <?endforeach;?>
        </div>
        <div class="thumbs-carusel">
            <?foreach ($arResult["PHOTOS_THUMBS"] as $key => $arPhoto):?>
            <div class="thumbs-carusel__item">
                <div class="thumbs-carusel__wrap-img">
                    <img class="thumbs-carusel__img" src="<?=$arPhoto["sm"]["src"]?>" srcset="<?=$arPhoto["md"]["src"]?> 2x" alt="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["DESCRIPTION"][$key]?>">
                </div>
             </div>
            <?endforeach;?>
        </div>
    </div>
    <?endif;?>
    <?if($arResult["ICONS_ADVANTAGES_HL_ID"] > 0):?>
        <?$GLOBALS["arFilterIcons"] = ['=UF_XML_ID' => $arResult["DISPLAY_PROPERTIES"]["ICONS_ADVANTAGES"]["VALUE"]];?>
        <?$APPLICATION->IncludeComponent("twim:highloadblock.list", "listIcons", Array(
            "BLOCK_ID" => $arResult["ICONS_ADVANTAGES_HL_ID"],	// ID инфоблока
                "CHECK_PERMISSIONS" => "N",	// Проверять права доступа
                "DETAIL_URL" => "",	// Путь к странице просмотра записи
                "FILTER_NAME" => "arFilterIcons",	// Идентификатор фильтра
                "PAGEN_ID" => "",	// Идентификатор страницы
                "ROWS_PER_PAGE" => "",	// Разбить по страницам количеством
                "SORT_FIELD" => "SORT",	// Поле сортировки
                "SORT_ORDER" => "DESC",	// Направление сортировки
            ),
            $component
        );?>
    <?endif;?>
    <div class="new-builds-detail__full-text mb-45">
        <div class="h2"><?=getMessage("T_PROPS_OBJECT_TITLE")?></div>
        <div class="mb-10">
            <?if($arResult["NAV_RESULT"]):?>
            <?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
            <?echo $arResult["NAV_TEXT"];?>
            <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
            <?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
            <?echo $arResult["DETAIL_TEXT"];?>
            <?else:?>
            <?echo $arResult["PREVIEW_TEXT"];?>
            <?endif?>
        </div>  
        <?if($arResult["DISPLAY_PROPERTIES"]["ADDRESS"]["VALUE"]):?>
        <p><b><?=$arResult["DISPLAY_PROPERTIES"]["ADDRESS"]["NAME"]?>:</b> <?=$arResult["DISPLAY_PROPERTIES"]["ADDRESS"]["DISPLAY_VALUE"]?></p>
        <?endif;?>
    </div>
    <div class="row mb-35">
        <div class="col-12 col-md-6 d-print-none">
            <?if(!empty($arResult["PHOTOS_STAGE_BUILDINGS"])):?>
                <div class="list-slider list-slider_m-right">
                    <?foreach ($arResult["PHOTOS_STAGE_BUILDINGS"] as $key => $arPhoto):?>
                    <div class="list-slider__item">
                        <a data-fancybox="list-built" href="<?=$arPhoto["FULL"]["src"]?>">
                            <div class="ready-builds-detail__wrap-img-4by3" data-responsive-background-image>
                                <img src="<?=$arPhoto["N"]["src"]?>" srcset="<?=$arPhoto["N"]["src"]?> 1x, <?=$arPhoto["2x"]["src"]?> 2x" alt="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS_STAGE_BUILDINGS"]["DESCRIPTION"][$key]?>" class="d-none">
                            </div>
                        </a>
                    </div>
                    <?endforeach;?>
                </div>
            <?endif;?>
        </div>
        <div class="col-12 col-md-6">
            <?if($arResult["DISPLAY_PROPERTIES"]["ENUM_PROPS_OBJECT"]["VALUE"]):?>
                <div class="list-builds-main__props">
                    <div class="row">
                        <?foreach ($arResult["DISPLAY_PROPERTIES"]["ENUM_PROPS_OBJECT"]["VALUE"] as $id => $value):?>
                        <div class="col-12 col-md-6">
                            <div class="list-builds-main__props-item">
                                <span class="list-builds-main__props-val">
                                    <?=$arResult["DISPLAY_PROPERTIES"]["ENUM_PROPS_OBJECT"]["DISPLAY_VALUE"][$id]?>
                                </span>
                                <br>
                                <span class="list-builds-main__props-label">
                                    <?=$arResult["DISPLAY_PROPERTIES"]["ENUM_PROPS_OBJECT"]["DESCRIPTION"][$id]?>
                                </span>
                            </div>
                        </div>
                        <?endforeach;?>         
                    </div>
                </div>
            <?endif;?>
            <?if($arResult["DISPLAY_PROPERTIES"]["LINK_STAGE_BUILDINGS"]["VALUE"]):?>
            <?
            $arLink = current($arResult["DISPLAY_PROPERTIES"]["LINK_STAGE_BUILDINGS"]["LINK_SECTION_VALUE"]);
            ?>
            <a href="<?=$arLink["SECTION_PAGE_URL"]?>" class="btn btn-outline-primary"><?=getMessage("LINK_STAGE_BUILDINGS_DESC")?></a>
            <?endif;?>
        </div>
    </div>
    <?if($arResult["DISPLAY_PROPERTIES"]["ACTIVE_RECORD_EXCURSION"]["VALUE"] == "Y"):?>
    <div class="new-builds-detail__feedback mb-35 d-print-none">
        <div class="h2 text-center">
           <?=getMessage("ORDER_EXCUR_DESC")?>:
        </div>
        <div class="text-center">
            <button data-toggle="modal" data-target="#modal-callback" data-object="<?=$arResult["NAME"]?>" class="btn btn-outline-white"><?=getMessage("CALL_BTN_DESC")?></button>
            <button data-toggle="modal" data-target="#modal-order" data-object="<?=$arResult["NAME"]?>" class="btn btn-outline-white"><?=getMessage("FEEDBACK_BTN_DESC")?></button>
        </div>
    </div>
    <?endif;?>
    <div class="new-builds-detail__info-tab mb-20">
        <ul class="nav nav-tabs" id="info-tab" role="tablist">
        <?if($arResult["DISPLAY_PROPERTIES"]["MAP_POSITION"]):?>
            <li class="nav-item">
                <a class="nav-link" id="info-place-tab" data-toggle="tab" href="#info-place" role="tab" aria-controls="info-place" aria-selected="false"><?=getMessage("LOCATION_MAP")?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="info-location-map-tab" data-toggle="tab" href="#info-location-map" role="tab" aria-controls="info-location-map"
                    aria-selected="true"><?=getMessage("MAP_POSITION")?></a>
            </li>
        <?endif;?>
        <?if($arResult["DISPLAY_PROPERTIES"]["DOCS"]):?>
            <li class="nav-item">
                <a class="nav-link" id="info-doc-tab" data-toggle="tab" href="#info-doc" role="tab" aria-controls="info-doc" aria-selected="false"><?=getMessage("DOCS_DESC")?></a>
            </li>
        <?endif;?>
        <?if($arResult["DISPLAY_PROPERTIES"]["LOCATION_IMG"]["VALUE"]):?>
            <li class="nav-item">
                <a class="nav-link" id="info-loc-img-tab" data-toggle="tab" href="#info-loc-img" role="tab" aria-controls="info-loc-img" aria-selected="false"><?=$arResult["DISPLAY_PROPERTIES"]["LOCATION_IMG"]["NAME"]?></a>
            </li>
        <?endif;?>
        <?if($arResult["DISPLAY_PROPERTIES"]["TABS_DESCRIPION"]):?>
        <?foreach ($arResult["DISPLAY_PROPERTIES"]["TABS_DESCRIPION"]["DESCRIPTION"] as $key => $desc):?>
            <li class="nav-item">
                <a class="nav-link" id="info-tab-description_<?=$key?>" data-toggle="tab" href="#info-description_<?=$key?>" role="tab" aria-controls="info-description_<?=$key?>" aria-selected="false"><?=$desc?></a>
            </li>
        <?endforeach;?>
        <?endif;?>
        </ul>
        <div class="tab-content mt-20" id="info-tab-content">
            <?if($arResult["DISPLAY_PROPERTIES"]["MAP_POSITION"]):?>
            <div class="tab-pane fade" id="info-place" role="tabpanel" aria-labelledby="info-place-tab">
                <div id="ya-map-route" class="ya-map-route"></div>
            </div>
            <div class="tab-pane fade show active" id="info-location-map" role="tabpanel" aria-labelledby="info-location-map-tab">
                <div class="row print-row-block">
                    <div class="col-12 col-md-6 print-map">
                        <div id="ya-map-build" class="new-builds-detail__ya-map-build"></div>
                    </div>
                    <div class="col-12 col-md-6 print-text">
                        <?if($arResult["DISPLAY_PROPERTIES"]["TEXT_POSITION"]):?>
                            <?=$arResult["DISPLAY_PROPERTIES"]["TEXT_POSITION"]["DISPLAY_VALUE"];?>
                        <br>
                        <?endif;?>
                    </div>
                </div>
            </div>
            <?endif;?>
            <?if($arResult["DISPLAY_PROPERTIES"]["DOCS"]):?>
            <div class="tab-pane fade" id="info-doc" role="tabpanel" aria-labelledby="info-doc-tab">
                <div class="list-docs">
                <?foreach ($arResult["DOCS"] as $link):?>
                    <div class="list-docs__item">
                        <a class="list-docs__link" href="<?=$link["SRC"]?>" target="_blank">
                            <div class="list-docs__wrap">
                                <div class="list-docs__wrap-icon">
                                    <?=$link["ICON"]?>
                                </div>
                                <div class="list-docs__text">
                                    <?=(empty($link["DESCRIPTION"])) ?  $link["NAME"] : $link["DESCRIPTION"];?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?endforeach;?>
                </div>
            </div>
            <?endif;?>
            <?if($arResult["DISPLAY_PROPERTIES"]["LOCATION_IMG"]["VALUE"]):?>
            <div class="tab-pane fade" id="info-loc-img" role="tabpanel" aria-labelledby="info-loc-img-tab">
                <p>
                    <img alt="<?=$arResult["DISPLAY_PROPERTIES"]["LOCATION_IMG"]["NAME"]?>" src="<?=$arResult["DISPLAY_PROPERTIES"]["LOCATION_IMG"]["FILE_VALUE"]["SRC"]?>" class="img-fluid">
                </p>
                <div class="wrap-print-page d-print-none">
                    <a class="btn-print"  target="_blank" href="<?=$arResult["DETAIL_PAGE_URL"]?>?print-plan=Y"><?echo getMessage("PRINT_DRIVING_DIRECTIONS");?><i class="fas fa-print btn-print__icon"></i></a>
                </div>
            </div>
            <?endif;?>
            <?if($arResult["DISPLAY_PROPERTIES"]["TABS_DESCRIPION"]):?>
                <?if(is_array($arResult["DISPLAY_PROPERTIES"]["TABS_DESCRIPION"]["DISPLAY_VALUE"])):?>
                    <?foreach ($arResult["DISPLAY_PROPERTIES"]["TABS_DESCRIPION"]["DISPLAY_VALUE"] as $key => $desc):?>
                    <div class="tab-pane fade" id="info-description_<?=$key?>" role="tabpanel" aria-labelledby="info-tab-description_<?=$key?>">
                        <?=$desc;?>
                    </div>
                   <?endforeach;?>
                <?else:?>
                    <div class="tab-pane fade" id="info-description_<?=$key?>" role="tabpanel" aria-labelledby="info-tab-description_0">
                         <?=$arResult["DISPLAY_PROPERTIES"]["TABS_DESCRIPION"]["DISPLAY_VALUE"];?>
                    </div>
                <?endif;?>   
            <?endif;?>
        </div>
    </div>
    <?if(!empty($arResult["FINAL_FINISHING_PHOTOS"])):?>
    <div class="mb-35">
        <div class="st-collapse">
            <a href="#photos-ready" class="st-collapse__btn" data-toggle="collapse" data-target="#photos-ready" aria-expanded="false" aria-controls="photos-ready">
                <div>
                    <b><?=getMessage("T_SHOW_SEMPLE")?><span class="d-none d-sm-inline"> <?=getMessage("T_FINAL_FINISHING")?></span></b>
                </div>
                <svg class="st-collapse__btn-arrow">
                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/svg/icons.svg#arrow-bottom"></use>
                </svg>
            </a>
            <div class="collapse" id="photos-ready">
                <div class="card card-body st-collapse__card-body">
                    <div class="ready-builds-detail__photos" data-fancy>
                        <?foreach ($arResult["FINAL_FINISHING_PHOTOS"] as $key => $arPhoto):?>
                        <div class="ready-builds-detail__photos-item">
                            <a href="<?=$arPhoto["FULL"]["src"]?>" data-fancybox="list-final-feneshing">
                                <div class="ready-builds-detail__wrap-img-4by3" data-responsive-background-image>
                                    <img src="<?=$arPhoto["N"]["src"]?>" srcset="<?=$arPhoto["2x"]["src"]?> 2x" alt="<?=$arResult["DISPLAY_PROPERTIES"]["FINAL_FINISHING_PHOTOS"]["DESCRIPTION"][$key]?>" class="d-none">
                                </div>
                            </a>
                        </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?endif;?> 
    <div class="new-builds-detail__ipoteka mb-20 d-print-none">
        <ul class="nav nav-tabs" id="mortgage-tab" role="tablist">
        <?if($arResult["DISPLAY_PROPERTIES"]["MORTGAGE"]["VALUE"]):?>
            <li class="nav-item">
                <a class="nav-link active" id="ipoteka-tab" data-toggle="tab" href="#ipoteka" role="tab" aria-controls="ipoteka" aria-selected="true"><?=$arResult["DISPLAY_PROPERTIES"]["MORTGAGE"]["NAME"]?></a>
            </li>
        <?endif;?>
        <?if($arResult["DISPLAY_PROPERTIES"]["MILITORY_MORTGAGE"]["VALUE"]):?>
            <li class="nav-item">
                <a class="nav-link" id="m-ipoteka-tab" data-toggle="tab" href="#m-ipoteka" role="tab" aria-controls="m-ipoteka" aria-selected="false"><?=$arResult["DISPLAY_PROPERTIES"]["MILITORY_MORTGAGE"]["NAME"]?></a>
            </li>
        <?endif;?>
        <?if($arResult["DISPLAY_PROPERTIES"]["MATERNITY_CAPITAL"]["VALUE"]):?>
            <li class="nav-item">
                <a class="nav-link" id="m-kapital-tab" data-toggle="tab" href="#m-kapital" role="tab" aria-controls="m-kapital" aria-selected="false"><?=$arResult["DISPLAY_PROPERTIES"]["MATERNITY_CAPITAL"]["NAME"]?></a>
            </li>
        <?endif;?>
        </ul>
        <div class="tab-content" id="mortgage-tab-content">
            <?if($arResult["DISPLAY_PROPERTIES"]["MORTGAGE"]["VALUE"]):?>
            <div class="tab-pane fade show active" id="ipoteka" role="tabpanel" aria-labelledby="ipoteka-tab">
                <div><?=$arResult["DISPLAY_PROPERTIES"]["MORTGAGE_DESC"]["DISPLAY_VALUE"];?></div>
                <?$GLOBALS["arFilterMortgage"] = ['=UF_XML_ID' => $arResult["DISPLAY_PROPERTIES"]["MORTGAGE"]["VALUE"]];?>
                <?$APPLICATION->IncludeComponent("twim:highloadblock.list", "listBanks", Array(
                    "BLOCK_ID" => $arResult["ICONS_MORTGAGE_HL_ID"],	// ID инфоблока
                        "CHECK_PERMISSIONS" => "N",	// Проверять права доступа
                        "DETAIL_URL" => "",	// Путь к странице просмотра записи
                        "FILTER_NAME" => "arFilterMortgage",	// Идентификатор фильтра
                        "PAGEN_ID" => "",	// Идентификатор страницы
                        "ROWS_PER_PAGE" => "",	// Разбить по страницам количеством
                        "SORT_FIELD" => "SORT",	// Поле сортировки
                        "SORT_ORDER" => "DESC",	// Направление сортировки
                    ),
                    $component
                );?>
            </div>
            <?endif;?>
            <?if($arResult["DISPLAY_PROPERTIES"]["MILITORY_MORTGAGE"]["VALUE"]):?>
            <div class="tab-pane fade" id="m-ipoteka" role="tabpanel" aria-labelledby="m-ipoteka-tab">
                <div><?=$arResult["DISPLAY_PROPERTIES"]["MILITORY_MORTGAGE_DESC"]["DISPLAY_VALUE"];?></div>
                <?$GLOBALS["arFilterMilitoryMortgage"] = ['=UF_XML_ID' => $arResult["DISPLAY_PROPERTIES"]["MILITORY_MORTGAGE"]["VALUE"]];?>
                <?$APPLICATION->IncludeComponent("twim:highloadblock.list", "listBanks", Array(
                    "BLOCK_ID" => $arResult["ICONS_MORTGAGE_HL_ID"],	// ID инфоблока
                        "CHECK_PERMISSIONS" => "N",	// Проверять права доступа
                        "DETAIL_URL" => "",	// Путь к странице просмотра записи
                        "FILTER_NAME" => "arFilterMilitoryMortgage",	// Идентификатор фильтра
                        "PAGEN_ID" => "",	// Идентификатор страницы
                        "ROWS_PER_PAGE" => "",	// Разбить по страницам количеством
                        "SORT_FIELD" => "SORT",	// Поле сортировки
                        "SORT_ORDER" => "DESC",	// Направление сортировки
                    ),
                    $component
                );?>
            </div>
            <?endif;?>
            <?if($arResult["DISPLAY_PROPERTIES"]["MATERNITY_CAPITAL"]["VALUE"]):?>
            <div class="tab-pane fade" id="m-kapital" role="tabpanel" aria-labelledby="m-kapital-tab">
                <div><?=$arResult["DISPLAY_PROPERTIES"]["MATERNITY_CAPITAL_DESC"]["DISPLAY_VALUE"];?></div>
                <?$GLOBALS["arFilterMaterialCapital"] = ['=UF_XML_ID' => $arResult["DISPLAY_PROPERTIES"]["MATERNITY_CAPITAL"]["VALUE"]];?>
                <?$APPLICATION->IncludeComponent("twim:highloadblock.list", "listBanks", Array(
                    "BLOCK_ID" => $arResult["ICONS_MORTGAGE_HL_ID"],	// ID инфоблока
                        "CHECK_PERMISSIONS" => "N",	// Проверять права доступа
                        "DETAIL_URL" => "",	// Путь к странице просмотра записи
                        "FILTER_NAME" => "arFilterMaterialCapital",	// Идентификатор фильтра
                        "PAGEN_ID" => "",	// Идентификатор страницы
                        "ROWS_PER_PAGE" => "",	// Разбить по страницам количеством
                        "SORT_FIELD" => "SORT",	// Поле сортировки
                        "SORT_ORDER" => "DESC",	// Направление сортировки
                    ),
                    $component
                );?>
            </div>
            <?endif;?>
        </div>
    </div>
</div>
<script>
    var arJsonBuildParams = {
        "coord": <?=json_encode(explode(",", $arResult["DISPLAY_PROPERTIES"]["MAP_POSITION"]["VALUE"]))?>,
        "type": "<?=$arResult["CLASS_TYPE"]?>",
        "queues": false
    };
    App.initDetailNewBuild(arJsonBuildParams);
</script>