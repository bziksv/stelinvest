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
$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>
<nav>
<div class="nav-page mb-35">
    <div class="nav-page__wrap">
        <div class="nav-page__active">
            <span class="nav-page__active-text"><?=$arResult['SECTION_ACTIVE_NAME']?></span>
        </div>
        <?if (0 < $arResult["SECTIONS_COUNT"]){?>
        <div class="nav-page__dropdown">    
        <?
        foreach ($arResult['SECTIONS'] as &$arSection){
            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
            ?>
            <div class="nav-page__item" id="<?echo $this->GetEditAreaId($arSection['ID']); ?>">
                <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="nav-page__link<?if($arSection['SELECTED'] == "Y"):?> is-active<?endif;?>"><? echo $arSection['NAME']; ?><?
                if ($arParams["COUNT_ELEMENTS"])
                {
                    ?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
                }
                ?></a>
            </div>
        <?}?>
            <div class="nav-page__item">
                <a href="<?=$arParams["IBLOCK_URL"]?>" class="nav-page__link<?if($arResult['SECTION_ALL_SELECTED'] == "Y"):?> is-active<?endif;?>"><?=getMessage("ALL_OBJECTS_DESC")?></a>
            </div>
        </div>
        <?}?>      
        </div>
    </div>
</nav>