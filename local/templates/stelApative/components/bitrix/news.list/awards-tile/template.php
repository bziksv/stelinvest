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
<div class="rewards-list row mb-40">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="rewards-list__item"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="rewards-list__wrap">
            <a class="rewards-list__link" href="<?=$arItem["PICTURE"]["LG"]["src"]?>" data-fancybox="rewards">
                <div class="rewards-list__wrap-img" data-responsive-background-image>
                    <img src="<?=$arItem["PICTURE"]["SM"]["src"]?>" 
                        srcset="<?=$arItem["PICTURE"]["SM"]["src"]?> 1x, <?=$arItem["PICTURE"]["MD"]["src"]?> 2x" 
                        alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                        title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" 
                        class="rewards-list__img d-none">
                </div>
            </a>
        </div>
    </div>
<?endforeach;?>
</div>