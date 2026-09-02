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
    <p>
        <img alt="<?=$arResult["DISPLAY_PROPERTIES"]["LOCATION_IMG"]["NAME"]?>" src="<?=$arResult["DISPLAY_PROPERTIES"]["LOCATION_IMG"]["FILE_VALUE"]["SRC"]?>" class="img-fluid">
    </p>
</div>
<script>
    var arJsonBuildParams = {
        "coord": <?=json_encode(explode(",", $arResult["DISPLAY_PROPERTIES"]["MAP_POSITION"]["VALUE"]))?>,
        "type": "<?=$arResult["CLASS_TYPE"]?>",
        "print": "Y"
    };
    App.initDetailNewBuild(arJsonBuildParams);  
</script>