<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="icons-list mb-15">
    <?foreach ($arResult['rows'] as $row):?>
    <div class="icons-list__item">
        <div class="icons-list__wrap-icon">
            <img class="icons-list__icon" src="<?=$row["UF_PATH_FILE"]?>" alt="<?=$row["UF_NAME"]?>">
        </div>
        <div class="icons-list__text">
            <?=$row["UF_NAME"]?>
        </div>
    </div>
    <?endforeach;?>
</div>