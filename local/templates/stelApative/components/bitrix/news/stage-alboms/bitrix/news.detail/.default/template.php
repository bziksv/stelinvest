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
?>
<div class="d-flex justify-content-between">
    <div class="h2"><?=getMessage("STAGE_TITLE");?></div>
    <div>
        <?if($arResult["SECTION_URL"]):?>
        <a href="<?=$arResult["SECTION_URL"]?>" class="back-link"><i class="fas fa-long-arrow-alt-left mr-5"></i><?=getMessage("BACK_LINK");?></a>
        <?endif;?>
    </div>
</div>
<div class="albom-detail row" data-fancy="albom-stage">
    <?foreach ($arResult["PHOTOS"] as $key => $arPhoto):?>
    <div class="col-12 col-sm-6 col-lg-4 col-xll-3">
        <div class="albom-detail__item">
            <div class="albom-detail__wrap">
                <a href="<?=$arPhoto["full"]["src"]?>" class="albom-detail__link" data-fancybox="stage" data-caption="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["DESCRIPTION"][$key]?>">
                    <div class="albom-detail__wrap-img" data-responsive-background-image>
                        <img src="<?=$arPhoto["n"]["src"]?>" srcset="<?=$arPhoto["n"]["src"]?> 1x, <?=$arPhoto["2x"]["src"]?> 2x" alt="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["DESCRIPTION"][$key]?>" sizes="100vw" class="albom-detail__img d-none">
                        <img class="full-slider__img d-none" alt="">
                    </div>
                    <i class="fas fa-search-plus albom-detail__icon-zoom fadeInUp"></i>
                </a>
            </div>
        </div>
    </div>
    <?endforeach;?>
</div>
<div class="mb-40">
    <?if($arResult["SECTION_URL"]):?>
    <a href="<?=$arResult["SECTION_URL"]?>" class="back-link"><i class="fas fa-long-arrow-alt-left mr-5"></i><?=getMessage("BACK_LINK");?></a>
    <?endif;?>
</div>