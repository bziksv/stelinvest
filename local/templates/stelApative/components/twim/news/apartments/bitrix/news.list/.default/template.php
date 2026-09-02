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
<?if(empty($arResult["ITEMS"])):?>
<div class="apartment-empty">
    <?=getMessage("EMPTY_FILTER_RESULT")?> <a class="apartment-empty__link" href="callto:<?=$phoneSale1Call;?>"><?= tplvar('phoneSale1');?></a>
</div>
<?endif;?>
<!--RestartBuffer-->
<div class="apartment-list row" data-container-height>
    <?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="col-12 col-sm-6 col-lg-4 col-xll-3" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="apartment-list__item">
            <div class="apartment-list__wrap" data-height-content>
                <?if(!empty($arItem["PHOTOS"])):?>
                <div class="apartment-list__slider item-photo-slider">
                    <?foreach ($arItem["PHOTOS"] as $key => $arPic):?>
                    <div class="apartment-list__slider-item">
                        <div class="apartment-list__wrap-img" data-responsive-background-image>
                            <img src="<?=$arPic["n"]["src"]?>" class="d-none">
                        </div>
                    </div>
                    <?endforeach;?>
                </div>
                <?endif;?>
                <div class="apartment-list__wrap-text">                    
                    <?if(!empty($arItem["DISPLAY_PROPERTIES"]["COUNT_ROOMS"])):?>
                    <p class="apartment-list__title"><?=$arItem["DISPLAY_PROPERTIES"]["COUNT_ROOMS"]["VALUE"]?></p>
                    <?else:?>
                    <p class="apartment-list__title"><?=$arItem["NAME"]?></p>
                    <?endif;?>
                    <?if(!empty($arItem["DISPLAY_PROPERTIES"]["OBJECT"])):
                    $id = $arItem["DISPLAY_PROPERTIES"]["OBJECT"]["VALUE"];?>
                    <div class="apartment-list__build">
                        <a class="apartment-list__build-link" href="<?=$arItem["DISPLAY_PROPERTIES"]["OBJECT"]["LINK_ELEMENT_VALUE"][$id]["DETAIL_PAGE_URL"]?>">
                            <?=$arItem["DISPLAY_PROPERTIES"]["OBJECT"]["LINK_ELEMENT_VALUE"][$id]["NAME"]?>
                        </a>
                    </div>
                    <?endif;?>
                    <div class="apartment-list__props">
                        <?if(!empty($arItem["DISPLAY_PROPERTIES"]["SQUARE"])):?>
                        <p class="apartment-list__square">
                            <?=getMessage("SQUARE_APARTAMENT_DESC")?>:
                            <strong><?=$arItem["DISPLAY_PROPERTIES"]["SQUARE"]["VALUE"]?> <?=getMessage("METRE")?><sup>2</sup></strong>
                        </p>
                        <?endif;?>
                        <?if(!empty($arItem["DISPLAY_PROPERTIES"]["FLOOR"])):?>
                        <p class="apartment-list__floor">
                            <?=$arItem["DISPLAY_PROPERTIES"]["FLOOR"]["NAME"]?>:
                            <strong><?=$arItem["DISPLAY_PROPERTIES"]["FLOOR"]["VALUE"]?> 
                                <?if(!empty($arItem["DISPLAY_PROPERTIES"]["MAX_FLOORS"])):?>
                                <?=getMessage("OF")?> <?=$arItem["DISPLAY_PROPERTIES"]["MAX_FLOORS"]["VALUE"]?>
                                <?endif;?>
                            </strong>
                        </p>
                        <?endif;?>
                    </div>
                    <div class="apartment-list__wrap-price">
                        <?if(!empty($arItem["DISPLAY_PROPERTIES"]["PRICE"])):?>
                        <p class="apartment-list__price-text"><?=getMessage("PRICE_APARTAMENT_DESC")?>:</p>
                        <p class="apartment-list__price">
                            <strong><?=rtrim(rtrim(number_format($arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"], 2, ',', ' '), '0'), ',');?> <?=getMessage("CURRENCY_RUB")?></strong>
                        </p>
                        <?endif;?>
                        <?if(!empty($arItem["DISPLAY_PROPERTIES"]["PRICE_SQUARE_1M"])):?>
                        <p class="apartment-list__price-one-meter-square">
                            <?=rtrim(rtrim(number_format($arItem["DISPLAY_PROPERTIES"]["PRICE_SQUARE_1M"]["VALUE"], 2, ',', ' '), '0'), ',');?> <?=getMessage("CURRENCY_SQUARE_1M_RUB")?><sup>2</sup>
                        </p>
                        <?endif;?>
                    </div>
                    <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                        <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="more-link apartment-list_more-link">
                            <span class="more-link__text"><?=getMessage("MORE_LINK")?></span>
                        </a><br>
                    <?endif;?>
                    
                </div>
            </div>
        </div>
    </div>
    <?endforeach;?>
</div>
<div class="js-nav-list">
    <?
    $paramValue = $arResult['NAV_RESULT']->NavPageNomer;
    $pageCount = $arResult['NAV_RESULT']->NavPageCount;
    $navNum = "PAGEN_" . $arResult['NAV_RESULT']->NavNum;
    if ($paramValue < $pageCount) {
        $paramValue = (int) $paramValue + 1;
        $url = htmlspecialcharsbx(
            $APPLICATION->GetCurPageParam(
                sprintf('%s=%s', $navNum, $paramValue), 
                array($navNum, 'AJAX_PAGE')
            )
        );
        echo sprintf('<div class="wrap-ajax-pagination">
            <div class="loader ajax-pagination_loader d-none">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
            </div>
            <p>
            <a data-load-ajax-list href="%s" class="btn btn-outline-primary">' . getMessage("BTN_LOAD_MORE") . '</a>
            </p>
        </div>',
        $url);
    }
    ?>
    <div class="d-flex justify-content-center">
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?>
    <?endif;?>
    </div>
</div>    
<!--RestartBuffer-->
<script>
    App.initCaruselListApartaments();
    App.initListApartaments();
</script>