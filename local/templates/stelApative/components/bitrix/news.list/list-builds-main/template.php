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
<div class="list-builds-main">
    <?foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    $reverse = ($key % 2 == 0) ? "N" : "Y";?>
    <div class="row">
        <div class="col-main">
            <div class="list-builds-main__item<?if($reverse == "Y"):?> list-builds-main__item_reverse<?endif;?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="row<?if($reverse == "Y"):?> list-builds-main__row_reverse<?endif;?>">
                    <div class="col-12 col-sm-6">
                        <?if(!empty($arItem["PHOTOS_IN_MAIN"])):?>
                            <div class="list-builds-main__slider list-slider">
                                <?foreach ($arItem["PHOTOS_IN_MAIN"] as $key => $arPhoto):?>
                                <div class="list-slider__item">
                                    <a data-fancybox="list-main-slider-<?=$arItem['ID']?>" href="<?=$arPhoto["2x"]["src"]?>">
                                        <div class="list-slider__wrap-img" data-responsive-background-image>
                                            <img src="<?=$arPhoto["N"]["src"]?>" srcset="<?=$arPhoto["N"]["src"]?> 1x, <?=$arPhoto["2x"]["src"]?> 2x" alt="<?=$arItem["DISPLAY_PROPERTIES"]["PHOTOS_IN_MAIN"]["DESCRIPTION"][$key]?>" class="d-none">
                                        </div>
                                    </a>
                                </div>
                                <?endforeach;?>
                                <?if($arItem["DISPLAY_PROPERTIES"]["YT_VIDEO_LINK"]["VALUE"]):?>
                                <div class="list-slider__item">
                                    <a data-fancybox="list-main-slider-<?=$arItem['ID']?>" href="<?=$arItem["DISPLAY_PROPERTIES"]["YT_VIDEO_LINK"]["VALUE"]?>">
                                        <div class="list-slider__wrap-img list-slider__wrap-img_video" data-responsive-background-image>
                                            <img src="<?=$arItem["YT_VIDEO_PIC"]["src"]?>"  alt="video" class="d-none">
                                        </div>
                                    </a>
                                </div>
                                <?endif;?>
                            </div>
                        <?endif;?>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="list-builds-main__wrap-content">
                            <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                                    <a class="list-builds-main__link" href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                                        <p class="list-builds-main__title"><?echo $arItem["NAME"]?></p><br>
                                    </a>
                                <?else:?>
                                    <p class="list-builds-main__title"><?echo $arItem["NAME"]?></p><br>
                                <?endif;?>
                            <?endif;?>
                            <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                                <div class="list-builds-main__preview-text">
                                    <?echo $arItem["PREVIEW_TEXT"];?>
                                </div>
                            <?endif;?>
                            <?if($arItem["DISPLAY_PROPERTIES"]["ENUM_PROPS_OBJECT"]["VALUE"]):?>
                                <div class="list-builds-main__props">
                                    <div class="row">
                                        <?foreach ($arItem["DISPLAY_PROPERTIES"]["ENUM_PROPS_OBJECT"]["VALUE"] as $id => $value):?>
                                        <div class="col-12 col-md-6">
                                            <div class="list-builds-main__props-item">
                                                <span class="list-builds-main__props-val">
                                                    <?=$arItem["DISPLAY_PROPERTIES"]["ENUM_PROPS_OBJECT"]["DISPLAY_VALUE"][$id]?>
                                                </span>
                                                <br>
                                                <span class="list-builds-main__props-label">
                                                    <?=$arItem["DISPLAY_PROPERTIES"]["ENUM_PROPS_OBJECT"]["DESCRIPTION"][$id]?>
                                                </span>
                                            </div>
                                        </div>
                                        <?endforeach;?>         
                                    </div>
                                </div>
                            <?endif;?>      
                            <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                                <a class="btn btn-outline-primary" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=getMessage("LINK_MORE_OBKECT_DESC")?></a>
                            <?endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 d-none d-xl-flex">
            <div class="title-main-slide">
                <div class="title-main-slide__text"><!--noindex--><?=getMessage("TEXT_BUILDINGS")?><!--/noindex--></div>
            </div>
        </div>
    </div>
    <?endforeach;?>
</div>