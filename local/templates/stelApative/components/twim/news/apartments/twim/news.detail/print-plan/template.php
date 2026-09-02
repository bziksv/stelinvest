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
<div class="new-builds-detail">
    <?if($arResult["IMG_PLAN"]):?>
    <div class="b-photo__img print-page">
       <img  class="b-photo__img d-block img-fluid mx-auto" src="<?=$arResult["IMG_PLAN"]["n"]["src"]?>"  alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["DESCRIPTION"]?>">
    </div>
    <?endif;?>
    <?if($arResult["IMG_PLAN_TOP"]):?>
    <div class="b-photo__img print-page">
        <img class="b-photo__img d-block img-fluid mx-auto" src="<?=$arResult["IMG_PLAN_TOP"]["n"]["src"]?>"  alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["DESCRIPTION"]?>">
    </div>
    <?endif;?>
    <?if($arResult["IMG_3D_PLAN"]):?>
    <div class="b-photo__img">
        <img class="b-photo__img d-block img-fluid mx-auto" src="<?=$arResult["IMG_3D_PLAN"]["n"]["src"]?>"  alt="<?=$arResult["DISPLAY_PROPERTIES"]["IMG_PLAN_TOP"]["DESCRIPTION"]?>">
    </div>
    <?endif;?> 
</div>
<style>
    .print-page{
        page-break-after: always;
    }
</style>
<script>
    window.print();
</script>