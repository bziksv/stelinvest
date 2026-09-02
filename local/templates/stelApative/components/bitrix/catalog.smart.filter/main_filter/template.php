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
<div class="mob-filter-text d-sm-none">
    <div class="mob-filter-text__title"><?=getMessage("CT_BCSF_TITLE_MOBILE")?></div>
    <button class="btn btn-outline-primary" data-show-filter><?=getMessage("CT_BCSF_FILTER_SHOW")?></button>
</div>
<div class="filter mb-0">
    <div class="filter__wrapper">
        <div><button class="btn btn-link filter__hide-mob-filter" data-hide-filter><i class="fas fa-times mr-5"></i><?=getMessage("CT_BCSF_MOBILE_HIDE_TITLE")?></button></div>
        <form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
            <?foreach($arResult["HIDDEN"] as $arItem):?>
            <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
            <?endforeach;?>
            <div class="filter__items">
            <?
            //not prices
            foreach($arResult["ITEMS"] as $key=>$arItem)
            {
                if (empty($arItem["VALUES"]) || isset($arItem["PRICE"]))
                    continue;

                if ($arItem["DISPLAY_TYPE"] == "A" && ( $arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0))
                    continue;
                
                if($arItem["CODE"] == "FLOOR"){ // сортировка этажей
                    usort($arItem["VALUES"], function($a,$b){
                        return ($a['VALUE']-$b['VALUE']);
                    });
                }
                ?>
                <?if($arItem["USER_TYPE_SETTINGS"] === array("VIEW" => ["N" => "N", "Y" => "Y"]) && $arItem["USER_TYPE"] == "SASDCheckbox"):?>
                    <div class="filter__item mb-10">
                    <span class="bx-filter-container-modef"></span>
                    <label class="filter__label mb-0"></label>
                <?else:?>
                    <div class="filter__item">
                        <span class="bx-filter-container-modef"></span>
                        <label class="filter__label"><?=$arItem["NAME"]?>:</label>
                <?endif;?>
                    <div data-role="bx_filter_block">
                        <?
                        $arCur = current($arItem["VALUES"]);
                        switch ($arItem["DISPLAY_TYPE"])
                        {
                            case "A"://NUMBERS_WITH_SLIDER
                                ?>
                                <div class="col-6 form-group">
                                    <label for="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"><?=GetMessage("CT_BCSF_FILTER_FROM")?></label>
                                    <div class="bx-filter-input-container">
                                        <input
                                            class="min-price form-control"
                                            type="text"
                                            name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                                            id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                                            value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                                            size="5"
                                            onkeyup="smartFilter.keyup(this)"
                                        />
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"><?=GetMessage("CT_BCSF_FILTER_TO")?></label>
                                    <div class="bx-filter-input-container">
                                        <input
                                            class="max-price"
                                            type="text"
                                            name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                                            id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                                            value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                                            size="5"
                                            onkeyup="smartFilter.keyup(this)"
                                        />
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col">
                                    <div class="bx-ui-slider-track-container">
                                        <div class="bx-ui-slider-track" id="drag_track_<?=$key?>">
                                            <?
                                            $precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;
                                            $step = ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / 4;
                                            $value1 = number_format($arItem["VALUES"]["MIN"]["VALUE"], $precision, ".", "");
                                            $value2 = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step, $precision, ".", "");
                                            $value3 = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step * 2, $precision, ".", "");
                                            $value4 = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step * 3, $precision, ".", "");
                                            $value5 = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
                                            ?>
                                            <div class="bx-ui-slider-part p1"><span><?=$value1?></span></div>
                                            <div class="bx-ui-slider-part p2"><span><?=$value2?></span></div>
                                            <div class="bx-ui-slider-part p3"><span><?=$value3?></span></div>
                                            <div class="bx-ui-slider-part p4"><span><?=$value4?></span></div>
                                            <div class="bx-ui-slider-part p5"><span><?=$value5?></span></div>

                                            <div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;" id="colorUnavailableActive_<?=$key?>"></div>
                                            <div class="bx-ui-slider-pricebar-vn" style="left: 0;right: 0;" id="colorAvailableInactive_<?=$key?>"></div>
                                            <div class="bx-ui-slider-pricebar-v"  style="left: 0;right: 0;" id="colorAvailableActive_<?=$key?>"></div>
                                            <div class="bx-ui-slider-range" 	id="drag_tracker_<?=$key?>"  style="left: 0;right: 0;">
                                                <a class="bx-ui-slider-handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_<?=$key?>"></a>
                                                <a class="bx-ui-slider-handle right" style="right:0;" href="javascript:void(0)" id="right_slider_<?=$key?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?
                                $arJsParams = array(
                                    "leftSlider" => 'left_slider_'.$key,
                                    "rightSlider" => 'right_slider_'.$key,
                                    "tracker" => "drag_tracker_".$key,
                                    "trackerWrap" => "drag_track_".$key,
                                    "minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
                                    "maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
                                    "minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
                                    "maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
                                    "curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
                                    "curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
                                    "fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
                                    "fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
                                    "precision" => $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0,
                                    "colorUnavailableActive" => 'colorUnavailableActive_'.$key,
                                    "colorAvailableActive" => 'colorAvailableActive_'.$key,
                                    "colorAvailableInactive" => 'colorAvailableInactive_'.$key,
                                );
                                ?>
                                <script type="text/javascript">
                                    BX.ready(function(){
                                        window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?=CUtil::PhpToJSObject($arJsParams)?>);
                                    });
                                </script>
                                <?
                                break;
                            case "B"://NUMBERS
                                ?>
                                <?if($arItem["CODE"] == "QUEUE"):?>
                                    <input class="d-none"
                                        type="text"
                                        name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                                        id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                                        value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                                    >
                                    <input class="d-none"
                                        type="text"
                                        name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                                        id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                                        value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                                    >
                                    <div class="cus-select-wrap">
                                        <select class="cus-select filter__select" 
                                                data-set-min="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" 
                                                data-set-max="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" 
                                                onchange="smartFilter.changeQueue(this, '<?=CUtil::JSEscape($arItem["VALUES"]["MAX"]["CONTROL_ID"])?>')">
                                            <option data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" value=""><? echo GetMessage("CT_BCSF_FILTER_ALL"); ?></option>
                                            <?
                                            foreach ($arItem["QUEUES"] as $val => $ar):
                                                $class = "";
                                                if ($ar["ID"] == $arItem["VALUES"]["MAX"]["HTML_VALUE"])
                                                    $class.= "selected";
//                                                if ($ar["DISABLED"])
//                                                    $class.= "disabled";
                                            ?>
                                            <option  style="display:none;" data-build="<?=$ar["BUILD_ID"]?>" <?=$class?> value="<?=CUtil::JSEscape($ar["ID"])?>" ><?=$ar["NAME"]?></option>
                                            <?endforeach?>
                                        </select>
                                        <span class="cus-select-wrap__line"></span>
                                    </div>       
                                <?else:?>
                                <div class="filter__range">
                                    <div class="filter__range-col">
                                        <span class="filter__range-label"><?=GetMessage("CT_BCSF_FILTER_FROM")?></span>
                                        <div class="filter__range-wrap-input filter__range-wrap-input_square">
                                            <div class="cus-input-wrap">
                                                <input class="cus-input filter__input"
                                                    name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                                                    id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                                                    value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                                                    size="5"
                                                    onkeyup="smartFilter.keyup(this)"       
                                                >
                                                <span class="cus-input-wrap__line"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter__range-col">
                                        <span class="filter__range-label"><?=GetMessage("CT_BCSF_FILTER_TO")?></span>
                                        <div class="filter__range-wrap-input filter__range-wrap-input_square">
                                            <div class="cus-input-wrap">
                                                <input class="cus-input filter__input"
                                                    type="text"
                                                    name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                                                    id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                                                    value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                                                    size="5"
                                                    onkeyup="smartFilter.keyup(this)"
                                                >
                                                <span class="cus-input-wrap__line"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?endif;?>
                                <?
                                break;
                            case "G"://CHECKBOXES_WITH_PICTURES
                                ?>
                                <div class="col">
                                    <div class="bx-filter-param-btn-inline">
                                    <?foreach ($arItem["VALUES"] as $val => $ar):?>
                                        <input
                                            style="display: none"
                                            type="checkbox"
                                            name="<?=$ar["CONTROL_NAME"]?>"
                                            id="<?=$ar["CONTROL_ID"]?>"
                                            value="<?=$ar["HTML_VALUE"]?>"
                                            <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                        />
                                        <?
                                        $class = "";
                                        if ($ar["CHECKED"])
                                            $class.= " bx-active";
                                        if ($ar["DISABLED"])
                                            $class.= " disabled";
                                        ?>
                                        <label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label <?=$class?>" onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'bx-active');">
                                            <span class="bx-filter-param-btn bx-color-sl">
                                                <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                                                <span class="bx-filter-btn-color-icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                                                <?endif?>
                                            </span>
                                        </label>
                                    <?endforeach?>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <?
                                break;
                            case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS
                                ?>
                                <div class="col">
                                    <div class="bx-filter-param-btn-block">
                                    <?foreach ($arItem["VALUES"] as $val => $ar):?>
                                        <input
                                            style="display: none"
                                            type="checkbox"
                                            name="<?=$ar["CONTROL_NAME"]?>"
                                            id="<?=$ar["CONTROL_ID"]?>"
                                            value="<?=$ar["HTML_VALUE"]?>"
                                            <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                        />
                                        <?
                                        $class = "";
                                        if ($ar["CHECKED"])
                                            $class.= " bx-active";
                                        if ($ar["DISABLED"])
                                            $class.= " disabled";
                                        ?>
                                        <label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label<?=$class?>" onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'bx-active');">
                                            <span class="bx-filter-param-btn bx-color-sl">
                                                <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                                                    <span class="bx-filter-btn-color-icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                                                <?endif?>
                                            </span>
                                            <span class="bx-filter-param-text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
                                            if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
                                                ?> (<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
                                            endif;?></span>
                                        </label>
                                    <?endforeach?>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <?
                                break;
                            case "P"://DROPDOWN
                                $checkedItemExist = false;
                                ?>
                                <input
                                    style="display: none"
                                    type="radio"
                                    name="<?=$arCur["CONTROL_NAME_ALT"]?>"
                                    id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
                                    value=""
                                    <?if($arItem["CODE"] == "OBJECT"):?>data-object-id="all"<?endif;?>
                                />
                                <?foreach ($arItem["VALUES"] as $val => $ar):?>
                                    <input
                                        style="display: none"
                                        type="radio"
                                        name="<?=$ar["CONTROL_NAME_ALT"]?>"
                                        id="<?=$ar["CONTROL_ID"]?>"
                                        value="<? echo $ar["HTML_VALUE_ALT"] ?>"
                                        <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                        <?if($arItem["CODE"] == "OBJECT"):?>data-object-id="<?=$val?>"<?endif;?>
                                    />
                                <?endforeach?>
                                <div class="cus-select-wrap">
                                    <select class="cus-select filter__select"
                                            onchange="smartFilter.selectDropDownCustomItem(this)<?if($arItem["CODE"] == "OBJECT"):?>, smartFilter.selectDropDownItemChange(this)<?endif;?>"
                                        >
                                        <option data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" 
                                                data-control-id="<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>"
                                                data-id="all"
                                                >
                                                    <? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
                                        </option>
                                        <?
                                        foreach ($arItem["VALUES"] as $val => $ar):
                                            $class = "";
                                            if ($ar["CHECKED"])
                                                $class.= "selected";
                                            if ($ar["DISABLED"])
                                                $class.= "disabled";
                                        ?>
                                        <option data-role="label_<?=$ar["CONTROL_ID"]?>" <?=$class?> 
                                                value="<?=CUtil::JSEscape($ar["CONTROL_ID"])?>" 
                                                data-control-id="<?=CUtil::JSEscape($ar["CONTROL_ID"])?>"
                                                data-id="<?=$val?>"
                                                >
                                                <?=$ar["VALUE"]?>
                                        </option>
                                        <?endforeach?>
                                    </select>
                                    <span class="cus-select-wrap__line"></span>
                                </div>       
                                <?
                                break;
                            case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS
                                ?>
                                <div class="col">
                                    <div class="bx-filter-select-container">
                                        <div class="bx-filter-select-block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
                                            <div class="bx-filter-select-text fix" data-role="currentOption">
                                                <?
                                                $checkedItemExist = false;
                                                foreach ($arItem["VALUES"] as $val => $ar):
                                                    if ($ar["CHECKED"])
                                                    {
                                                    ?>
                                                        <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                                                            <span class="bx-filter-btn-color-icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                                                        <?endif?>
                                                        <span class="bx-filter-param-text">
                                                            <?=$ar["VALUE"]?>
                                                        </span>
                                                    <?
                                                        $checkedItemExist = true;
                                                    }
                                                endforeach;
                                                if (!$checkedItemExist)
                                                {
                                                    ?><span class="bx-filter-btn-color-icon all"></span> <?
                                                    echo GetMessage("CT_BCSF_FILTER_ALL");
                                                }
                                                ?>
                                            </div>
                                            <div class="bx-filter-select-arrow"></div>
                                            <input
                                                style="display: none"
                                                type="radio"
                                                name="<?=$arCur["CONTROL_NAME_ALT"]?>"
                                                id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
                                                value=""
                                            />
                                            <?foreach ($arItem["VALUES"] as $val => $ar):?>
                                                <input
                                                    style="display: none"
                                                    type="radio"
                                                    name="<?=$ar["CONTROL_NAME_ALT"]?>"
                                                    id="<?=$ar["CONTROL_ID"]?>"
                                                    value="<?=$ar["HTML_VALUE_ALT"]?>"
                                                    <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                                />
                                            <?endforeach?>
                                            <div class="bx-filter-select-popup" data-role="dropdownContent" style="display: none">
                                                <ul>
                                                    <li style="border-bottom: 1px solid #e5e5e5;padding-bottom: 5px;margin-bottom: 5px;">
                                                        <label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx-filter-param-label" data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
                                                            <span class="bx-filter-btn-color-icon all"></span>
                                                            <? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
                                                        </label>
                                                    </li>
                                                <?
                                                foreach ($arItem["VALUES"] as $val => $ar):
                                                    $class = "";
                                                    if ($ar["CHECKED"])
                                                        $class.= " selected";
                                                    if ($ar["DISABLED"])
                                                        $class.= " disabled";
                                                ?>
                                                    <li>
                                                        <label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label<?=$class?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')">
                                                            <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                                                                <span class="bx-filter-btn-color-icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                                                            <?endif?>
                                                            <span class="bx-filter-param-text">
                                                                <?=$ar["VALUE"]?>
                                                            </span>
                                                        </label>
                                                    </li>
                                                <?endforeach?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <?
                                break;
                            case "K"://RADIO_BUTTONS
                                ?>
                                <div class="col">
                                    <div class="radio">
                                        <label class="bx-filter-param-label" for="<? echo "all_".$arCur["CONTROL_ID"] ?>">
                                            <span class="bx-filter-input-checkbox">
                                                <input
                                                    type="radio"
                                                    value=""
                                                    name="<? echo $arCur["CONTROL_NAME_ALT"] ?>"
                                                    id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
                                                    onclick="smartFilter.click(this)"
                                                />
                                                <span class="bx-filter-param-text"><? echo GetMessage("CT_BCSF_FILTER_ALL"); ?></span>
                                            </span>
                                        </label>
                                    </div>
                                    <?foreach($arItem["VALUES"] as $val => $ar):?>
                                        <div class="radio">
                                            <label data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label" for="<? echo $ar["CONTROL_ID"] ?>">
                                                <span class="bx-filter-input-checkbox <? echo $ar["DISABLED"] ? 'disabled': '' ?>">
                                                    <input
                                                        type="radio"
                                                        value="<? echo $ar["HTML_VALUE_ALT"] ?>"
                                                        name="<? echo $ar["CONTROL_NAME_ALT"] ?>"
                                                        id="<? echo $ar["CONTROL_ID"] ?>"
                                                        <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                                        onclick="smartFilter.click(this)"
                                                    />
                                                    <span class="bx-filter-param-text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
                                                    if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
                                                        ?>&nbsp;(<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
                                                    endif;?></span>
                                                </span>
                                            </label>
                                        </div>
                                    <?endforeach;?>
                                </div>
                                <div class="w-100"></div>
                                <?
                                break;
                            case "U"://CALENDAR
                                ?>
                                <div class="col">
                                    <div class=""><div class="bx-filter-input-container bx-filter-calendar-container">
                                        <?$APPLICATION->IncludeComponent(
                                            'bitrix:main.calendar',
                                            '',
                                            array(
                                                'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
                                                'SHOW_INPUT' => 'Y',
                                                'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MIN"]["VALUE"]).'" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
                                                'INPUT_NAME' => $arItem["VALUES"]["MIN"]["CONTROL_NAME"],
                                                'INPUT_VALUE' => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
                                                'SHOW_TIME' => 'N',
                                                'HIDE_TIMEBAR' => 'Y',
                                            ),
                                            null,
                                            array('HIDE_ICONS' => 'Y')
                                        );?>
                                    </div></div>
                                    <div class=""><div class="bx-filter-input-container bx-filter-calendar-container">
                                        <?$APPLICATION->IncludeComponent(
                                            'bitrix:main.calendar',
                                            '',
                                            array(
                                                'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
                                                'SHOW_INPUT' => 'Y',
                                                'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MAX"]["VALUE"]).'" onkeyup="smartFilter.keyup(this)" onchange="smartFilter.keyup(this)"',
                                                'INPUT_NAME' => $arItem["VALUES"]["MAX"]["CONTROL_NAME"],
                                                'INPUT_VALUE' => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
                                                'SHOW_TIME' => 'N',
                                                'HIDE_TIMEBAR' => 'Y',
                                            ),
                                            null,
                                            array('HIDE_ICONS' => 'Y')
                                        );?>
                                    </div></div>
                                </div>
                                <div class="w-100"></div>
                                <?
                                break;
                            default://CHECKBOXES
                                ?>
                                <?foreach($arItem["VALUES"] as $val => $ar):?>
                                    <?
                                    if($arItem["USER_TYPE_SETTINGS"] === array("VIEW" => ["N" => "N", "Y" => "Y"])){
                                        if($arItem["USER_TYPE"]==="SASDCheckbox" && $ar["VALUE"] === "N"){
                                            continue;
                                        }
                                        if($arItem["USER_TYPE"]==="SASDCheckbox" && $ar["VALUE"] === "Y"){
                                            $ar["VALUE"] = GetMessage("SIMPLE_" . $ar["VALUE"]);
                                        }
                                    }?>
                                    <div class="custom-control custom-checkbox">
                                        <input 
                                            type="checkbox" 
                                            class="custom-control-input" 
                                            value="<? echo $ar["HTML_VALUE"] ?>"
                                            name="<? echo $ar["CONTROL_NAME"] ?>"
                                            id="<? echo $ar["CONTROL_ID"] ?>"
                                            <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                            <? echo $ar["DISABLED"] ? 'disabled': '' ?>
                                            onclick="smartFilter.click(this)"
                                            >
                                        <label class="custom-control-label" data-role="label_<?=$ar["CONTROL_ID"]?>" for="<? echo $ar["CONTROL_ID"] ?>">
                                            <?if(count($arItem["VALUES"]) == 2 && $arItem["USER_TYPE"] == "SASDCheckbox"):?>
                                                <?=$arItem["NAME"];?>
                                            <?else:?>
                                                <?=$ar["VALUE"];?>
                                            <?endif;?>
                                                <?
                                            if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
                                                ?>&nbsp;(<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
                                            endif;?>
                                        </label>
                                    </div>
                                <?endforeach;?>       
                        <?
                        }
                        ?>
                    </div>
                </div>
            <?
            }
            ?>
                <div class="filter__controls">
                    <button id="del_filter" class="btn btn-link"  name="del_filter" type="submit" value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>"><i class="fas fa-times mr-5"></i><?=GetMessage("CT_BCSF_DEL_FILTER")?></button>
                    <button id="set_filter" class="btn btn-outline-primary btn-loader" name="set_filter"  type="submit" value="<?=GetMessage("CT_BCSF_SET_FILTER")?>">
                        <div class="loader btn-loader__loader">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>
                        <span class="btn-loader__text"><?=GetMessage("CT_BCSF_SET_FILTER")?></span>
                    </button>
                </div> 
            </div>
            <div class="d-none bx-filter-popup-result <?if ($arParams["FILTER_VIEW_MODE"] == "VERTICAL") echo $arParams["POPUP_POSITION"]?>" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
                <?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
                <span class="arrow"></span>
                <br/>
                <a href="<?echo $arResult["FILTER_URL"]?>" target=""><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
            </div>
        </form>        
    </div>
</div>
<script type="text/javascript">
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>

<? if(count($arResult["RELATED_REQUEST"]) > 0): ?>
    <div class="d-none d-sm-block mb-40"></div>
    <div class="title-page">Похожие запросы</div>
    <div class="d-none d-sm-block mb-20"></div>
    <div class="filter-link mb-0">
        <? foreach($arResult["RELATED_REQUEST"] as $related):?>
        <div class="link-item"><a href="<?=$related['URL']?>"><?=$related['NAME']?></a><span></span></div>
        <? endforeach; ?>
    </div>
<? endif; ?>
