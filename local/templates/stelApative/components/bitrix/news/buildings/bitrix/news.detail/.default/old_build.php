<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="ready-builds-detail">
    <div class="ready-builds-detail__wrap-status mb-25">
        <div class="ready-builds-detail__status is-<?=$arResult["CLASS_TYPE"]?>"><?=getMessage("T_STATUS_" . strtoupper($arResult["CLASS_TYPE"]));?></div>
    </div>
    <div class="ready-builds-detail__full-text mb-15">
        <?if($arResult["NAV_RESULT"]):?>
            <?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
            <?echo $arResult["NAV_TEXT"];?>
            <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
        <?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
            <?echo $arResult["DETAIL_TEXT"];?>
        <?endif?>
    </div>
    <div class="h2"><?=getMessage("T_PROPS_OBJECT_TITLE")?></div>
    <div class="row mb-35">
        <div class="col-12 col-md-6">
            <?if($arResult["DISPLAY_PROPERTIES"]["ADDRESS"]["VALUE"]):?>
            <p><b><?=$arResult["DISPLAY_PROPERTIES"]["ADDRESS"]["NAME"]?>:</b> <?=$arResult["DISPLAY_PROPERTIES"]["ADDRESS"]["DISPLAY_VALUE"]?></p>
            <?endif;?>
        </div>
        <div class="col-12 col-md-6">
            <?if($arResult["DISPLAY_PROPERTIES"]["DATE_FINISH"]["VALUE"]):?>
            <p><?=$arResult["DISPLAY_PROPERTIES"]["DATE_FINISH"]["NAME"]?>: <?=$arResult["DISPLAY_PROPERTIES"]["DATE_FINISH"]["DISPLAY_VALUE"]?></p>
            <?endif;?>
        </div>
    </div>
    <div class="row mb-35">
            <div class="col-12 col-md-6">
                <?if(!empty($arResult["PHOTOS_STAGE_BUILDINGS"])):?>
                    <div class="list-slider list-slider_m-right">
                        <?foreach ($arResult["PHOTOS_STAGE_BUILDINGS"] as $key => $arPhoto):?>
                        <div class="list-slider__item">
                            <a data-fancybox="list-built" href="<?=$arPhoto["FULL"]["src"]?>">
                                <div class="ready-builds-detail__wrap-img-4by3" data-responsive-background-image>
                                    <img src="<?=$arPhoto["N"]["src"]?>" srcset="<?=$arPhoto["2x"]["src"]?> 2x" alt="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS_STAGE_BUILDINGS"]["DESCRIPTION"][$key]?>" class="d-none">
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
                <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
                    <div class="ready-builds-detail__preview-text">
                        <?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?>
                    </div>
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
    <?if(!empty($arResult["PHOTOS_PLAN"])):?>
    <div class="h2"><?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS_PLAN"]["NAME"]?></div>
    <div class="ready-builds-detail__plan mb-5" data-fancy>
        <?foreach ($arResult["PHOTOS_PLAN"] as $key => $arPhoto):?>
        <div class="mb-15">
            <a href="<?=$arPhoto["FULL"]["src"]?>"  data-fancybox="list-plan">
                <img class="img-fluid mb-15" src="<?=$arPhoto["N"]["src"]?>" srcset="<?=$arPhoto["2x"]["src"]?> 2x" alt="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS_PLAN"]["DESCRIPTION"][$key]?>">
            </a>
        </div>
        <?endforeach;?>
    </div>
    <?endif;?> 
    <?if($arParams["USE_SHARE"] == "Y"){?>
    <div class="share mb-35">
        <div class="share__container">
            <div class="share__wrapper">
                <div class="share__btn">
                    <span><?echo getMessage("SHARE");?></span>
                </div>
                <div class="share__wrap-soc">
                    <ul class="share-soc share_share-soc">
                        <li>
                            <button data-soc-share data-type="vk">
                                <svg class="share-soc__icon">
                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/svg/icons.svg#vk"></use>
                                </svg>
                                <span class="sr-only"><?echo getMessage("SHARE");?> ВКонтакте</span>
                            </button>
                        </li>
                        <li>
                            <button data-soc-share data-type="ok">
                                <svg class="share-soc__icon">
                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/svg/icons.svg#ok"></use>
                                </svg>
                                <span class="sr-only"><?echo getMessage("SHARE");?> Одноклассники</span>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="share__btn share__btn_icon">
                    <i class="fas fa-share-alt share__icon"></i>
                </div>
            </div>
        </div>
    </div>
    <?}?>
</div>