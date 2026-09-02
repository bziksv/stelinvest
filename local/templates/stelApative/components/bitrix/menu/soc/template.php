<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
<nav class="nav nav-soc">
<?foreach($arResult as $arItem):?>
	<a class="nav-link nav-soc_nav-link" href="<?=$arItem["LINK"]?>" target="_blank" title="<?=$arItem["TEXT"]?>">
        <svg class="nav-soc__icon">
            <use xlink:href="<?=SITE_TEMPLATE_PATH?>/svg/icons.svg#<?=$arItem["PARAMS"]["ICON"]?>"></use>
        </svg>
        <span class="sr-only"><?=$arItem["TEXT"]?></span>
    </a>
<?endforeach?>
</nav>
<?endif?>


                                            
                                       