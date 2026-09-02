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
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="b-long" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <?if($arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]):?>
        <a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>" 
           <?if($arItem["DISPLAY_PROPERTIES"]["INDEX"]["VALUE"] !== "Y"):?>rel="nofollow"<?endif;?>
           <?if($arItem["DISPLAY_PROPERTIES"]["TARGET"]["VALUE"]):?>target="<?=$arItem["DISPLAY_PROPERTIES"]["TARGET"]["VALUE"]?>"<?endif;?>
           >
        <?endif;?>
            <picture>
                <source media="(max-width: 576px)" sizes="100vw"
                srcset="<?=$arItem["PHOTOS"]["mob_n"]["src"]?> 1x, <?=$arItem["PHOTOS"]["mob_2x"]["src"]?> 2x">
                <source media="(min-width: 577px)" sizes="100vw"
                ssrcset="<?=$arItem["PHOTOS"]["desc_n"]["src"]?> 1x, <?=$arItem["PHOTOS"]["desc_2x"]["src"]?> 2x">
                <img class="b-long__img img-fluid d-block mx-auto"
                    src="<?=$arItem["PHOTOS"]["desc_n"]["src"]?>" 
                    alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                    title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                />
            </picture>
        </a>
    </div>
<?endforeach;?>

