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
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
<div class="wrap-news-pagination">
<?=$arResult["NAV_STRING"]?>
</div>
<?endif;?>
<div class="builds-list row" data-container-height>
    <?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="col-12 col-sm-6 col-lg-4 col-xll-3">
        <div class="builds-list__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="builds-list__wrap" data-height-content>
                <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                    <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="builds-list__link">
                        <div class="builds-list__wrap-img" data-responsive-background-image>
                            <picture>
                                <source media="(max-width: 991px)" sizes="100vw"
                                srcset="<?=$arItem["PICTURE"]["SM"]["src"]?> 320w, <?=$arItem["PICTURE"]["MD"]["src"]?> 640w, <?=$arItem["PICTURE"]["LG"]["src"]?> 1280w">
                                <source media="(min-width: 992px)" sizes="100vw"
                                ssrcset="<?=$arItem["PICTURE"]["SM"]["src"]?> 320w, <?=$arItem["PICTURE"]["MD"]["src"]?> 640w">
                                <img class="builds-list__img d-none"
                                    src="<?=$arItem["PICTURE"]["SM"]["src"]?>" 
                                    alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                    title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                                />
                            </picture>
                        </div>
                    </a>
                    <?else:?>
                    <div class="builds-list__wrap-img" data-responsive-background-image>
                        <picture>
                            <source media="(max-width: 991px)" sizes="100vw"
                            srcset="<?=$arItem["PICTURE"]["SM"]["src"]?> 320w, <?=$arItem["PICTURE"]["MD"]["src"]?> 640w, <?=$arItem["PICTURE"]["LG"]["src"]?> 1280w">
                            <source media="(min-width: 992px)" sizes="100vw"
                            ssrcset="<?=$arItem["PICTURE"]["SM"]["src"]?> 320w, <?=$arItem["PICTURE"]["MD"]["src"]?> 640w">
                            <img class="builds-list__img d-none"
                                src="<?=$arItem["PICTURE"]["SM"]["src"]?>" 
                                alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                            />
                        </picture>
                    </div>
                    <?endif;?>
                <?endif?>
                <div class="builds-list__wrap-text">
                    <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                        <p class="builds-list__title"><?echo $arItem["NAME"]?></p>
                    <?endif;?>
                    <?if(isset($arResult["SECTIONS"][$arItem["IBLOCK_SECTION_ID"]])):?>
                        <div class="builds-list__wrap-status">
                            <span class="builds-list__status <?=$arResult["SECTIONS"][$arItem["IBLOCK_SECTION_ID"]]["CLASS_TYPE"]?>"><?=$arResult["SECTIONS"][$arItem["IBLOCK_SECTION_ID"]]["NAME"]?></span>
                        </div>
                    <?endif;?>
                    <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                        <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="more-link builds-list_more-link">
                            <span class="more-link__text"><?=getMessage("MORE_LINK_DESC")?></span>
                        </a>
                    <?endif;?>
                </div>
            </div>
        </div>
    </div>
    <?endforeach;?>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<div class="wrap-news-pagination">
<?=$arResult["NAV_STRING"]?>
</div>
<?endif;?>
<script>
    var arJsonBuilds = <?=json_encode($arResult["arJsonBuilds"])?>;
    App.initYaMapInBuilds(arJsonBuilds);
</script>
<div class="builds-list-map">
    <div id="ya-map-builds" class="builds-list-map__container"></div>
</div>