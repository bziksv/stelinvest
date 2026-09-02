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
<div class="news-list news-list__carusel row slick-loading" data-container-height>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="news-list__item"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="news-list__wrap" data-height-content>
            <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                    <a class="news-list__link" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                        <div class="news-list__wrap-img" data-responsive-background-image>
                            <picture>
                                <source media="(max-width: 991px)" sizes="100vw"
                                srcset="<?=$arItem["PICTURE"]["SM"]["src"]?> 320w, <?=$arItem["PICTURE"]["MD"]["src"]?> 640w, <?=$arItem["PICTURE"]["LG"]["src"]?> 1280w">
                                <source media="(min-width: 992px)" sizes="100vw"
                                srcset="<?=$arItem["PICTURE"]["SM"]["src"]?> 320w, <?=$arItem["PICTURE"]["MD"]["src"]?> 640w">
                                <img class="news-list__img d-none"
                                    src="<?=$arItem["PICTURE"]["SM"]["src"]?>" 
                                    alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                    title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                                />
                            </picture>
                        </div>
                    </a>
                <?else:?>
                    <div class="news-list__wrap-img" data-responsive-background-image>
                        <picture>
                            <source media="(max-width: 991px)" sizes="100vw"
                            srcset="<?=$arItem["PICTURE"]["SM"]["src"]?> 320w, <?=$arItem["PICTURE"]["MD"]["src"]?> 640w, <?=$arItem["PICTURE"]["LG"]["src"]?> 1280w">
                            <source media="(min-width: 992px)" sizes="100vw"
                            ssrcset="<?=$arItem["PICTURE"]["SM"]["src"]?> 320w, <?=$arItem["PICTURE"]["MD"]["src"]?> 640w">
                            <img class="news-list__img d-none"
                                src="<?=$arItem["PICTURE"]["SM"]["src"]?>" 
                                alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                            />
                        </picture>
                    </div>
                <?endif;?>
            <?endif?>
            <div class="news-list__wrap-text">
                <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                    <p class="news-list__title"><?echo $arItem["NAME"]?></p>
                <?endif;?>
                <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                    <div class="news-list__preview-text">
                        <?echo $arItem["PREVIEW_TEXT"];?>
                    </div>
                <?endif;?>
                <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                    <a class="more-link news-list_more-link" href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                        <span class="more-link__text"><?echo getMessage("MORE_LINK")?></span>
                    </a>
                <?endif;?>
            </div>
        </div>
    </div>
<?endforeach;?>
</div>


            
           
           
            
