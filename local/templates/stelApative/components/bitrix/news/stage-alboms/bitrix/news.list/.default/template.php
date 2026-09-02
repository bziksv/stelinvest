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
        <?if($arResult["BACK_OBJECT_LINK"]):?>
        <a href="<?=$arResult["BACK_OBJECT_LINK"]?>" class="back-link"><i class="fas fa-long-arrow-alt-left mr-5"></i><?=getMessage("BACK_LINK");?></a>
        <?endif;?>
    </div>
</div>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<div class="alboms-list row">
    <?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="col-12 col-sm-6 col-lg-4 col-xll-3">
        <div class="alboms-list__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="alboms-list__wrap">
                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="alboms-list__link">
                <?endif;?>
                    <div class="alboms-list__wrap-img" data-responsive-background-image>
                        <img class="alboms-list__img d-none"
                            srcset="<?=$arItem["PICTURE"]["SM"]["src"]?> 1x, <?=$arItem["PICTURE"]["SM"]["src"]?> 2x"
                            src="<?=$arItem["PICTURE"]["SM"]["src"]?>" 
                            alt="<?=$arItem["NAME"]?>"
                            title="<?=$arItem["NAME"]?>"
                            />
                    </div>
                    <i class="fas fa-search-plus alboms-list__icon-zoom"></i>
                    <div class="alboms-list__wrap-text">
                        <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                        <p class="alboms-list__title"><?=$arItem["NAME"]?></p>     
                        <?endif;?>
                    </div>
                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                </a>
                <?endif;?>
            </div>
        </div>
    </div>
    <?endforeach;?>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<div class="mb-40">
    <?if($arResult["BACK_OBJECT_LINK"]):?>
    <a href="<?=$arResult["BACK_OBJECT_LINK"]?>" class="back-link"><i class="fas fa-long-arrow-alt-left mr-5"></i><?=getMessage("BACK_LINK");?></a>
    <?endif;?>
</div>
    