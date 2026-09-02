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
<?if($arResult["TYPE_PAGE"] == "queue"): //очередь?>
    <?if(!empty($arResult["QUEUES"])):?>
        <ul class="list-queue mb-25">
            <?foreach ($arResult["QUEUES"] as $queue):?>
                <li class="list-queue__item"><a class="list-queue__link<?if($arResult["SECTION"]["ID"] == $queue["ID"]):?> is-active<?endif;?>" data-switch-object="queue" href="<?=$queue["SECTION_PAGE_URL"]?>"><span class="list-queue__text"><?=$queue["NAME"]?></span></a></li>         
            <?endforeach;?>
        </ul>
    <?endif;?>
    <?if(is_array($arResult["SECTION"]["PICTURE"])):?>
    <div class="highlighter text-center">
        <div class="highlighter__wrapper">
            <img id="img-build-select" class="highlighter__img" src="<?=$arResult["SECTION"]["PICTURE"]["SRC"]?>" alt="<?=$arResult["SECTION"]["PICTURE"]["DESCRIPTION"]?>">
            <div id="svg-build-select" class="highlighter__svg-container"></div>
        </div>
    </div>
    <?endif;?>
    <div class="choice-section-building mb-50">
        <div class="choice-section-building__text"><?=getMessage("SELECT_POSITION_DESC")?>:</div>
        <?foreach ($arResult["ENTRANCES"] as $entrance):?>
            <a href="<?=$entrance["SECTION_PAGE_URL"]?>" data-switch-object="entrance" class="choice-section-building__entrances-link"><span><?=$entrance["NAME"]?></span></a>
            <?if($entrance["FLOORS"]):?>
            <div class="choice-section-building__floors"><?=getMessage("FLOOR")?>:
               <?foreach ($entrance["FLOORS"] as $floor):?>
               <a href="<?=$floor["SECTION_PAGE_URL"]?>" data-switch-object="floor" data-position-floor="<?=$floor["ID"]?>" class="choice-section-building__floor-link" title="<?=$floor["NAME"]?>"><?=$floor["UF_NUMBER_FLOOR"]?></a>
               <?endforeach;?>
            </div>
            <?endif;?>
        <?endforeach;?>          
    </div>
    <script>
        var arJsonFloorsParams = {
            "floors": <?=json_encode($arResult["arJsonFloors"])?>
        };
        App.initDetailQueue(arJsonFloorsParams);
    </script>
    
<?elseif($arResult["TYPE_PAGE"] == "floor"): // этаж?>
    
<div class="choice-section-building choice-section-building_left mb-30">
    <div class="choice-section-building__entrances">
        <ul class="nav nav-tabs" id="tab-entrance-select" role="tablist">
            <?foreach ($arResult["ENTRANCES"] as $entrance):?>
            <li class="nav-item">
                <a href="#tab-entrance-content_<?=$entrance["ID"]?>" 
                   id="tab-entrance_<?=$entrance["ID"]?>" 
                   data-toggle="tab" 
                   role="tab" 
                   aria-controls="tab-entrance-content_<?=$entrance["ID"]?>" 
                   aria-selected="<?if($arResult["SELECTED_ENTRANCES"]["ID"] == $entrance["ID"]):?>true<?else:?>false<?endif;?>"
                   class="choice-section-building__entrances-link nav-link<?if($arResult["SELECTED_ENTRANCES"]["ID"] == $entrance["ID"]):?> active<?endif;?>">
                    <span><?=$entrance["NAME"]?></span>
                </a>
            </li>
            <?endforeach;?>
        </ul>
    </div>
    <div class="tab-content">
        <?foreach ($arResult["ENTRANCES"] as $entrance):?>
        <?if($entrance["FLOORS"]):?>
        <div class="tab-pane<?if($arResult["SELECTED_ENTRANCES"]["ID"] == $entrance["ID"]):?> active<?endif;?>"
             id="tab-entrance-content_<?=$entrance["ID"]?>" 
             role="tabpanel" 
             aria-labelledby="tab-entrance_<?=$entrance["ID"]?>">
            <div class="choice-section-building__wrap-floors" >
                <div class="choice-section-building__text"><?=getMessage("FLOOR")?>:</div>
                <div class="choice-section-building__floors">
                <?foreach ($entrance["FLOORS"] as $floor):?>
                    <a href="<?=$floor["SECTION_PAGE_URL"]?>" 
                       data-position-floor="<?=$floor["ID"]?>" 
                       data-switch-object="floor"
                       class="choice-section-building__floor-link<?if($arResult["SELECTED_FLOOR"]["ID"] == $floor["ID"]):?> is-active<?endif;?>" 
                       title="<?=$floor["NAME"]?>">
                       <?=$floor["UF_NUMBER_FLOOR"]?>
                    </a>
                <?endforeach;?>
                </div>
            </div>
        </div>
        <?endif;?>
        <?endforeach;?>    
    </div>        
</div>
<div class="row mb-30">
    <div class="col-12 mb-45">
        <?if(is_array($arResult["SECTION"]["PICTURE"])):?>
            <div class="highlighter text-center mt-60">
                <div class="highlighter__wrapper">
                    <?if($arResult["FLOOR_COMPAS_DIRECTION"]):?>
                    <div class="highlighter__wrap-compas">
                        <div class="highlighter__compas <?=$arResult["FLOOR_COMPAS_DIRECTION"];?>"></div>
                    </div>
                    <?endif;?>
                    <img id="img-build-select" class="highlighter__img" src="<?=$arResult["SECTION"]["PICTURE"]["SRC"]?>" alt="<?=$arResult["SECTION"]["PICTURE"]["DESCRIPTION"]?>">
                    <div id="svg-build-select" class="highlighter__svg-container"></div>
                    <div id="svg-build-sold" class="highlighter__svg-sold-container"></div>
                </div>
            </div>
        <?endif;?>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12 col-md-6">
                <?if($arResult["APARTAMETS"]):?>
                <div class="h2"><?=getMessage("LIST_APARTAMENTS_DESC")?>:</div>
                <div class="mb-30">
                    <div class="row">
                        <?$halfAr = round((count($arResult["APARTAMETS"]) / 2));
                        $arResult["APARTAMETS_COLUMN"] = array_chunk($arResult["APARTAMETS"], $halfAr, true);
                        foreach ($arResult["APARTAMETS_COLUMN"] as  $column):?>
                        <div class="col-6">
                            <ul class="list-position-room">
                                <?foreach ($column as $id => $arApartament):?>
                                <li class="list-position-room__item">
                                <?if($arApartament["PROPERTY_HIDE_LINK_VALUE"] == "Y"):?>
                                    <span class="list-position-room__link" data-position-apartament="<?=$arApartament['ID']?>"><?=$arApartament['NAME']?></span>
                                <?else:?>
                                    <a class="list-position-room__link" data-switch-object="apartament"  data-position-apartament="<?=$arApartament['ID']?>" href="<?=$arApartament['DETAIL_PAGE_URL']?>"><?=$arApartament['NAME']?></a>
                                <?endif;?>
                                </li>
                                <?endforeach;?>
                            </ul>
                        </div>
                        <?endforeach;?>
                    </div>
                </div>
                <?endif;?>
            </div>
            <div class="col-12 col-md-6">
                <div class="h2 mb-30 d-print-none"><?=getMessage("MESSAGE_GET_PRICE")?>:</div>
                <div class="mb-30">
                    <button data-toggle="modal" data-target="#modal-order" class="btn btn-outline-primary"><?=getMessage("BTN_FEEDBACK_DESC")?></button>
                </div>
                <div>
                    <?if($arResult["QUEUE"]):?>
                    <a href="<?=$arResult["QUEUE"]["SECTION_PAGE_URL"]?>" data-switch-object="back" class="back-link"><i class="fas fa-long-arrow-alt-left mr-5"></i><?=getMessage("BACK_LINK_QUEUE")?></a>
                    <?endif;?>
                </div> 
            </div>
        </div>
    </div>
</div>
    <script>
        var arJsonApartamentsParams = {
            "apartaments": <?=json_encode($arResult["arJsonApartaments"])?>
        };
        App.initDetailFloor(arJsonApartamentsParams);
    </script>
<?elseif($arResult["TYPE_PAGE"] == "apartament"): // Квартира?>
    
<div class="choice-section-building choice-section-building_left mb-30">
    <div class="choice-section-building__entrances">
        <ul class="nav nav-tabs" id="tab-entrance-select" role="tablist">
            <?foreach ($arResult["ENTRANCES"] as $entrance):?>
            <li class="nav-item">
                <a href="#tab-entrance-content_<?=$entrance["ID"]?>" 
                   id="tab-entrance_<?=$entrance["ID"]?>" 
                   data-toggle="tab" 
                   role="tab" 
                   aria-controls="tab-entrance-content_<?=$entrance["ID"]?>" 
                   aria-selected="<?if($arResult["SELECTED_ENTRANCES"]["ID"] == $entrance["ID"]):?>true<?else:?>false<?endif;?>"
                   class="choice-section-building__entrances-link nav-link<?if($arResult["SELECTED_ENTRANCES"]["ID"] == $entrance["ID"]):?> active<?endif;?>">
                    <span><?=$entrance["NAME"]?></span>
                </a>
            </li>
            <?endforeach;?>
        </ul>
    </div>
    <div class="tab-content">
        <?foreach ($arResult["ENTRANCES"] as $entrance):?>
        <?if($entrance["FLOORS"]):?>
        <div class="tab-pane<?if($arResult["SELECTED_ENTRANCES"]["ID"] == $entrance["ID"]):?> active<?endif;?>"
             id="tab-entrance-content_<?=$entrance["ID"]?>" 
             role="tabpanel" 
             aria-labelledby="tab-entrance_<?=$entrance["ID"]?>">
            <div class="choice-section-building__wrap-floors" >
                <div class="choice-section-building__text"><?=getMessage("FLOOR")?>:</div>
                <div class="choice-section-building__floors">
                <?foreach ($entrance["FLOORS"] as $floor):?>
                    <a href="<?=$floor["SECTION_PAGE_URL"]?>" 
                       data-position-floor="<?=$floor["ID"]?>" 
                       data-switch-object="floor"
                       class="choice-section-building__floor-link<?if($arResult["SELECTED_FLOOR"]["ID"] == $floor["ID"]):?> is-active<?endif;?>" 
                       title="<?=$floor["NAME"]?>">
                       <?=$floor["UF_NUMBER_FLOOR"]?>
                    </a>
                <?endforeach;?>
                </div>
            </div>
        </div>
        <?endif;?>
        <?endforeach;?>    
    </div>        
</div>
<?endif;?>
<?
//left title page
$this->SetViewTarget('left_vertical_title');?>
<?if($arResult["TYPE_PAGE"] == "queue"): //очередь?>
<?=getMessage("TITLE_SELECT_FLOOR");?>
<?elseif($arResult["TYPE_PAGE"] == "floor"): // этаж?>
<?=getMessage("TITLE_SELECT_APARTAMENT");?>
<?elseif($arResult["TYPE_PAGE"] == "apartament"): // Квартира?>
<?=getMessage("TITLE_APARTAMENT");?>
<?endif;?>
<?$this->EndViewTarget();?> 