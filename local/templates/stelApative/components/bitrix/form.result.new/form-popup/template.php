<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use \Bitrix\Main\Context;
$context = Context::getCurrent();
$request = $context->getRequest(); 
$isAjax = $request->isAjaxRequest();
$ajaxForm = $request->getPost("ajax_form");
$formId = $request->get("WEB_FORM_ID");
$resultId = $request->get("RESULT_ID");
//если пришел ответ или ошибки при ajax, то вернуть только форму
$isResetBuffer = ($ajaxForm == "y" && $isAjax && $formId == $arParams["WEB_FORM_ID"]) || ($isAjax && $formId == $arParams["WEB_FORM_ID"] && $resultId > 0) ? "Y" : "N";
?>
<?if($isResetBuffer == "Y"){
   $GLOBALS['APPLICATION']->RestartBuffer();
}?>
<div id="container-form-popup-<?=$arParams["WEB_FORM_ID"]?>" class="js-container-form">
<?if ($arResult["isFormNote"] === "Y"){?>   
    <div id="note-form-popup-<?=$arParams["WEB_FORM_ID"]?>" class="d-none"><?=$arResult["FORM_NOTE"]?></div>
<?}?>
<?=$arResult["FORM_HEADER"]?>
	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{
            foreach ($arQuestion["HTML_CODE_CUSTOM"] as $input) {?>
                <div class="cus-input-wrap">
                    <?=$input?>
                </div>
                <?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
                <span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"><?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?></span>
                <?endif;?>
            <?}  
		}
	} //endwhile
	?>
<?
if($arResult["isUseCaptcha"] == "Y")
{
?>
<div class="cus-input-wrap">
    <input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
    <img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />
</div>
<div class="cus-input-wrap">
    <input type="text" name="captcha_word" size="30" maxlength="50" value="" class="cus-input" placeholder="<?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?>" />
    <span class="cus-input-wrap__line"></span>
</div>        
<?
} // isUseCaptcha
?>
    <br>
	<button  type="submit" name="web_form_submit" class="btn btn-outline-primary" value="Y" /><?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?></button>
<?=$arResult["FORM_FOOTER"]?>

</div>
<?if($isResetBuffer == "Y"){
   die();
}?>