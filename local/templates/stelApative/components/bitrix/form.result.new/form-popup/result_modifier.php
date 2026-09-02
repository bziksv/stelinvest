<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//custom header form
$arResult["FORM_HEADER"] = substr_replace($arResult["FORM_HEADER"], ' id="form-popup-'.$arParams["WEB_FORM_ID"].'" class="form-popup" ', 5, 0);

//custom feild form
foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion){
    $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE_CUSTOM"] = [];
    foreach ($arQuestion["STRUCTURE"] as $arItemQuestion) {
		
		if($arItemQuestion["FIELD_PARAM"] === "required") {
			$arItemQuestion["MESSAGE"] = $arItemQuestion["MESSAGE"] . "*";
		}
		
        switch ($arItemQuestion["FIELD_TYPE"]) {
        case "file": //file
            $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE_CUSTOM"][] = '<div class="file-upload">
                    <div class="file-upload__wrap-file">
                        <input type="file" name="form_file_'.$arItemQuestion["ID"].'" ' . $arItemQuestion["FIELD_PARAM"] . '>
                        <span class="file-upload__text">'.$arItemQuestion["MESSAGE"].'</span>
                    </div>  
                </div>';
            break;
        case "checkbox": //checkbox
            $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE_CUSTOM"][] = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="form_checkbox_'.$FIELD_SID.'[]" value="'.$arItemQuestion["ID"].'" ' . $arItemQuestion["FIELD_PARAM"] . ' id="check_'.$arItemQuestion["ID"].'" >
                        <label class="custom-control-label" for="check_'.$arItemQuestion["ID"].'">'.$arItemQuestion["MESSAGE"].'</label>
                    </div>';
                    
            break;
        case "textarea": //textarea
            $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE_CUSTOM"][] = '<textarea class="cus-textarea" name="form_textarea_'.$arItemQuestion["ID"].'" ' . $arItemQuestion["FIELD_PARAM"] . ' cols="'.$arItemQuestion["FIELD_WIDTH"].'" rows="'.$arItemQuestion["FIELD_HEIGHT"].'" placeholder="'.$arItemQuestion["MESSAGE"].'">'. $arResult["arrVALUES"]['form_textarea_'.$arItemQuestion["ID"]] .'</textarea><span class="cus-input-wrap__line"></span>';
            break;
        case "text"://text
            $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE_CUSTOM"][]= '<input class="cus-input" name="form_text_'.$arItemQuestion["ID"].'" type="text" ' . $arItemQuestion["FIELD_PARAM"] . ' value="'.$arResult["arrVALUES"]['form_text_'.$arItemQuestion["ID"]].'" placeholder="'.$arItemQuestion["MESSAGE"].'" ><span class="cus-input-wrap__line"></span>';
            break;
        default: 
            $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE_CUSTOM"][] = $arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"];
            break;
        }
    }  
}