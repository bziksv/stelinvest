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
<div class="article">
    <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
    <div class="article__wrap-date">
        <span class="article__date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
    </div>
    <?endif;?>
    <?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;?>
    <div class="article__preview-text">
        <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
            <div><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></div>
        <?endif;?>
    </div>
    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
        <div class="article__wrap_img">
            <img class="article__img img-fluid"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
            src="<?=$arResult["DETAIL_PICTURE"]["N"]["src"]?>"
            srcset="<?=$arResult["DETAIL_PICTURE"]["2x"]["src"]?> 2x" 
            alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"       
            />
        </div>
	<?endif?>
    <div class="article__text">
        <?if($arResult["NAV_RESULT"]):?>
            <?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
            <?echo $arResult["NAV_TEXT"];?>
            <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
        <?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
            <?echo $arResult["DETAIL_TEXT"];?>
        <?else:?>
            <?echo $arResult["PREVIEW_TEXT"];?>
        <?endif?>
    </div>
    <?if(!empty($arResult["PHOTOS"])):?>
        <div class="article__photos">
            <div class="photo-carusel">
            <?foreach ($arResult["PHOTOS"] as $key => $arPhoto):?>
            <div>
                <a class="photo-carusel__link" data-fancybox="photos-news" href="<?=$arPhoto["FULL"]["src"]?>">
                    <img class="photo-carusel__img" src="<?=$arPhoto["N"]["src"]?>" srcset="<?=$arPhoto["2x"]["src"]?> 2x" alt="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"][$key]["DESCRIPTION"]?>">
                </a>
            </div>
            <?endforeach;?>
            </div>
        </div>
    <?endif;?>
</div>
<!--.article-->
<div class="article-control">
<?if($arParams["USE_SHARE"] == "Y")
{?>
<div class="share article-control_share">
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

