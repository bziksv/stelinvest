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
if(!empty($arResult["PHOTOS"])):?>
<div class="photo-carusel<?if(!empty($arParams["ADD_CLASS"])):?> <?=$arParams["ADD_CLASS"]?><?endif;?>">
     <?foreach ($arResult["PHOTOS"] as $key => $arPhoto):?>
         <div>
             <a href="<?=$arPhoto["FULL"]["src"]?>" class="photo-carusel__link" data-fancybox="photos-carusel-<?=$arResult["ID"]?>">
                 <img class="photo-carusel__img" src="<?=$arPhoto["N"]["src"]?>" srcset="<?=$arPhoto["N"]["src"]?> 1x, <?=$arPhoto["2x"]["src"]?> 2x" alt="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"][$key]["DESCRIPTION"]?>">
             </a>
         </div>
     <?endforeach;?>
 </div>
<?endif;?>