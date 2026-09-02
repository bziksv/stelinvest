<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="tiles-img row">
    <?foreach ($arResult['rows'] as $key => $row):?>
    <div class="col-6 col-sm-3">
        <div class="tiles-img__item">
            <?if($row["UF_LINK"] !== "&nbsp;"):?>
            <a href="<?=$row["UF_LINK"]?>" target="_blank" rel="nofollow">
                <img class="tiles-img__img" src="<?=$arResult["PHOTOS"][$key]["n"]["src"]?>"  srcset="<?=$arResult["PHOTOS"][$key]["2x"]["src"]?> 2x" alt="<?=$row["UF_NAME"]?>">
            </a>
            <?else:?>
            <img class="tiles-img__img" src="<?=$arResult["PHOTOS"][$key]["n"]["src"]?>"  srcset="<?=$arResult["PHOTOS"][$key]["2x"]["src"]?> 2x" alt="<?=$row["UF_NAME"]?>">
            <?endif;?>
        </div>
    </div>
    <?endforeach;?>
</div>