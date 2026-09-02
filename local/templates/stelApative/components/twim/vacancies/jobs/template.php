<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="jobs">
<?if(count($arResult['ITEMS']) == 0):?>
   <div class="h2"><?=getMessage("EMPTY_JOBS_DESC")?></div>
    <p>
        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-jobs"><?=getMessage("SEND_BTN_TEXT")?></button>
    </p>
<?else:?>
<div class="h2"><?=getMessage("AVAILABLE_VACANCIES_TEXT")?>:</div>
<div class="jobs__items">
    <?
    foreach ($arResult['ITEMS'] as $key=>$val):
        $this->AddEditAction($val['ID'],$val['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($val['ID'],$val['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('FAQ_DELETE_CONFIRM', array("#ELEMENT#" => CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_NAME")))));
        $id = $key + 1;
        $message = $val['NAME'] . " (" . $val['ID'] . ") ";
    ?> 
    <div class="jobs__item" id="<?=$this->GetEditAreaId($val['ID']);?>">
        <a href="#jobs-pos-<?=$id?>" class="jobs__btn"  data-toggle="collapse" data-target="#jobs-pos-<?=$id?>" aria-expanded="false" aria-controls="jobs-pos-<?=$id?>">
            <div>
                <b><?=getMessage("POST_TEXT")?>:</b> <?=$val['NAME']?>
            </div>
            <?if(!empty($val['DISPLAY_PROPERTIES']["PLACE_WORK"]["DISPLAY_VALUE"])):?>
            <div class="d-none d-xll-block">
                <b><?=$val['DISPLAY_PROPERTIES']["PLACE_WORK"]["NAME"]?>:</b> <?=$val['DISPLAY_PROPERTIES']["PLACE_WORK"]["DISPLAY_VALUE"]?>
            </div>
            <?$message .= $val['DISPLAY_PROPERTIES']["PLACE_WORK"]["NAME"] . ": " . $val['DISPLAY_PROPERTIES']["PLACE_WORK"]["DISPLAY_VALUE"] . " ";?>
            <?endif;?>
            <?if(!empty($val['DISPLAY_PROPERTIES']["SALARY_WORK"]["DISPLAY_VALUE"])):?>
            <div class="d-none d-xll-block">
                <b><?=$val['DISPLAY_PROPERTIES']["SALARY_WORK"]["NAME"]?>:</b> <?=$val['DISPLAY_PROPERTIES']["SALARY_WORK"]["DISPLAY_VALUE"]?>
            </div>
            <?$message .= $val['DISPLAY_PROPERTIES']["SALARY_WORK"]["NAME"] . ": " . $val['DISPLAY_PROPERTIES']["SALARY_WORK"]["DISPLAY_VALUE"];?>
            <?endif;?>
            <svg class="jobs__btn-arrow">
                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/svg/icons.svg#arrow-bottom"></use>
            </svg>
        </a>
        <div class="collapse" id="jobs-pos-<?=$id?>">
            <div class="card card-body jobs__detail">
	        <div>
                   <b><?=getMessage("POST_TEXT")?>:</b> <?=$val['NAME']?>
                </div>
                <?if(!empty($val['DISPLAY_PROPERTIES']["PLACE_WORK"]["DISPLAY_VALUE"])):?>
                <div>
                    <b><?=$val['DISPLAY_PROPERTIES']["PLACE_WORK"]["NAME"]?>:</b> <?=$val['DISPLAY_PROPERTIES']["PLACE_WORK"]["DISPLAY_VALUE"]?>
                </div>
                <?endif;?>
                <?if(!empty($val['DISPLAY_PROPERTIES']["SALARY_WORK"]["DISPLAY_VALUE"])):?>
                <div>
                    <b><?=$val['DISPLAY_PROPERTIES']["SALARY_WORK"]["NAME"]?>:</b> <?=$val['DISPLAY_PROPERTIES']["SALARY_WORK"]["DISPLAY_VALUE"]?>
                    <br><br>
                </div>
                <?endif;?>
                <?if(!empty($val['DISPLAY_PROPERTIES']["FUNCTION_WORK"]["DISPLAY_VALUE"])):?>
                <div>
                    <b><?=$val['DISPLAY_PROPERTIES']["FUNCTION_WORK"]["NAME"]?>:</b>
                    <ul>
                        <?if(is_array($val['DISPLAY_PROPERTIES']["FUNCTION_WORK"]["DISPLAY_VALUE"])):?>
                            <?foreach ($val['DISPLAY_PROPERTIES']["FUNCTION_WORK"]["DISPLAY_VALUE"] as $value):?>
                               <li><?=$value;?></li>
                            <?endforeach;?>
                        <?else:?>
                            <li><?=$val['DISPLAY_PROPERTIES']["FUNCTION_WORK"]["DISPLAY_VALUE"];?></li>
                        <?endif?>
                    </ul>
                </div>
                <br>
                <?endif;?>
                <?if(!empty($val['DISPLAY_PROPERTIES']["REQUEST_WORK"]["DISPLAY_VALUE"])):?>
                <div>
                    <b><?=$val['DISPLAY_PROPERTIES']["REQUEST_WORK"]["NAME"]?>:</b>
                    <ul>
                        <?if(is_array($val['DISPLAY_PROPERTIES']["REQUEST_WORK"]["DISPLAY_VALUE"])):?>
                            <?foreach ($val['DISPLAY_PROPERTIES']["REQUEST_WORK"]["DISPLAY_VALUE"] as $value):?>
                               <li><?=$value;?></li>
                            <?endforeach;?>
                        <?else:?>
                            <li><?=$val['DISPLAY_PROPERTIES']["REQUEST_WORK"]["DISPLAY_VALUE"];?></li>
                        <?endif?>
                    </ul>
                </div>
                <br>
                <?endif;?>
                <?if(!empty($val['DISPLAY_PROPERTIES']["CONDITION_WORK"]["DISPLAY_VALUE"])):?>
                <div>
                    <b><?=$val['DISPLAY_PROPERTIES']["CONDITION_WORK"]["NAME"]?>:</b>
                    <ul>
                        <?if(is_array($val['DISPLAY_PROPERTIES']["CONDITION_WORK"]["DISPLAY_VALUE"])):?>
                            <?foreach ($val['DISPLAY_PROPERTIES']["CONDITION_WORK"]["DISPLAY_VALUE"] as $value):?>
                               <li><?=$value;?></li>
                            <?endforeach;?>
                        <?else:?>
                            <li><?=$val['DISPLAY_PROPERTIES']["CONDITION_WORK"]["DISPLAY_VALUE"];?></li>
                        <?endif?>
                    </ul>
                </div>
                <br>
                <?endif;?>
                <?if(!empty($val['DISPLAY_PROPERTIES']["PHONE"]["DISPLAY_VALUE"])):?>
                <p><?=$val['DISPLAY_PROPERTIES']["PHONE"]["NAME"]?>:  <b>
                    <?if(is_array($val['DISPLAY_PROPERTIES']["PHONE"]["DISPLAY_VALUE"])):?>
                        <?=implode(",&nbsp;", $val['DISPLAY_PROPERTIES']["PHONE"]["DISPLAY_VALUE"]);?>
                    <?else:?>
                       <?=$val['DISPLAY_PROPERTIES']["PHONE"]["DISPLAY_VALUE"];?>
                    <?endif?>
                    </b>
                <?endif;?>
                <p>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-jobs" data-params="<?=$message?>"><?=getMessage("SEND_BTN_TEXT_ALT")?></button>
                </p>
            </div>
            <div>
                <?=$val['PREVIEW_TEXT']?>
                <?=$val['DETAIL_TEXT']?>
            </div>
        </div>
    </div>
    <?endforeach;?>
</div> 
<?endif;?>
</div>