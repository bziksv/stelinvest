<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):
foreach($arResult as $arItem){
    if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) continue;
    if($arItem["SELECTED"]){
        $activeItem = $arItem["TEXT"];
    }
}
?>
<nav>
    <div class="nav-page mb-20">
        <div class="nav-page__wrap">
            <div class="nav-page__active">
                <span class="nav-page__active-text"><?=$activeItem?></span>
            </div>
            <div class="nav-page__dropdown">
            <?
            foreach($arResult as $arItem):
                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
                    continue;?>
                <?if($arItem["SELECTED"]):?>
                    <div class="nav-page__item">
                        <a href="<?=$arItem["LINK"]?>" class="nav-page__link is-active"><?=$arItem["TEXT"]?></a>
                    </div>
                <?else:?>
                    <div class="nav-page__item">
                        <a href="<?=$arItem["LINK"]?>" class="nav-page__link"><?=$arItem["TEXT"]?></a>
                    </div>
                <?endif?>
            <?endforeach?>
            </div>
        </div>
    </div>
</nav>
<?endif?>