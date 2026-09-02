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
$this->setFrameMode(false);
?><?='<?xml version="1.0" encoding="'.SITE_CHARSET.'"?>';?>
<complexes>
    <?foreach($arResult["complexes"] as $arComplex):?>
    <complex>
        <id><?=$arComplex["complex_id"]?></id>
        <name><?=$arComplex["complex_name"]?></name>
        <latitude><?=$arComplex["complex_latitude"]?></latitude>
        <longitude><?=$arComplex["complex_longitude"]?></longitude>
        <address><?=$arComplex["complex_address"]?></address>
        <?if($arComplex["complex_image"]["VALUE"]){?>
        <images>
            <?foreach ($arComplex["complex_image"]["VALUE"] as $image):?>
            <image><?=$image;?></image>
            <?endforeach?>
        </images>
        <?}?>
        <buildings>
            <?foreach($arComplex["buildings"] as $arBuilding):?>
            <building>
                <id><?=$arBuilding["building_id"]?></id>
                <fz_214><?=$arBuilding["building_fz_214"]?></fz_214>
                <name><?=$arBuilding["building_name_dk"]?></name>
                <floors><?=$arBuilding["floors_total"]?></floors>
                <building_state><?=$arBuilding["building_state_dk"]?></building_state>
                <built_year><?=$arBuilding["built_year"]?></built_year>
                <ready_quarter><?=$arBuilding["ready_quarter"]?></ready_quarter>
                <?if($arBuilding["building_phase"]):?>
                <building_phase><?=$arBuilding["building_phase"]?></building_phase>
                <?endif;?>
                <building_type><?=$arBuilding["building_type"]?></building_type>
                <flats>
                    <?foreach($arResult["flats"][$arBuilding["building_id"]] as $arFlat):?>
                     <flat>
                        <flat_id><?=$arFlat["id"]?></flat_id>
                        <apartment><?=$arFlat["apartment"]?></apartment> 
                        <floor><?=$arFlat["floor"]?></floor>
                        <room><?=$arFlat["rooms"]?></room>
                        <plan><?=CHTTP::URN2URI(CFile::GetPath($arFlat["image_plan"]), $arResult["SERVER_NAME"]);?></plan>
                        <balcony><?=$arFlat["balcony"]?></balcony>
                        <renovation><?=$arFlat["renovation_dk"]?></renovation>
                        <price><?=$arFlat["price_value"]?></price>
                        <area><?=$arFlat["area_value"]?></area>
                        <kitchen_area><?=$arFlat["kitchen_area"]?></kitchen_area>
                        <living_area><?=$arFlat["living_area"]?></living_area>
                        <rooms_area>
                            <?foreach($arFlat["rooms_area"] as $area):?>
                            <area><?=$area?></area>
                            <?endforeach?>
                        </rooms_area>
                        <window_view><?=$arFlat["window_view"]?></window_view>
                        <bathroom><?=$arFlat["bathroom"]?></bathroom>
                        <?if($arFlat["layout_type"]):?>
                        <layout_type>free</layout_type>
                        <?endif;?>
                      </flat>
                    <?endforeach?>
                </flats>
            </building>
            <?endforeach?>
        </buildings>
        <sales_info>
            <sales_phone><?=$arComplex["sales_info"]["phone_agent"]?></sales_phone>
            <?if($arComplex["sales_info"]["photo_agent_dk_pro"]):?>
            <responsible_officer_phone><?=$arComplex["sales_info"]["photo_agent_dk_pro"]?></responsible_officer_phone>
            <?endif;?>
            <sales_address><?=$arComplex["sales_info"]["address_agent"]?></sales_address>
            <sales_latitude><?=$arComplex["sales_info"]["sales_latitude"]?></sales_latitude>
            <sales_longitude><?=$arComplex["sales_info"]["sales_longitude"]?></sales_longitude>
            <timezone><?=$arComplex["sales_info"]["timezone"]?></timezone>
            <work_days>
                <?foreach($arComplex["sales_info"]["work_day"] as $days):?>
                <work_day>
                    <day><?=$days?></day>
                    <open_at><?=$arComplex["sales_info"]["open_at"]?></open_at>
                    <close_at><?=$arComplex["sales_info"]["close_at"]?></close_at>
                </work_day>
                <?endforeach?>
            </work_days>
        </sales_info>
        <developer>
            <id><?=$arComplex["developer"]["deleveper_id"]?></id>
            <name><?=$arComplex["developer"]["organization_agent"]?></name>
            <phone><?=$arComplex["developer"]["phone_agent"]?></phone>
            <site><?=$arComplex["developer"]["url_agent"]?></site>
            <?if($arComplex["developer"]["photo_agent"]):?>
            <logo><?=$arComplex["developer"]["photo_agent"]?></logo>
            <?endif;?>
        </developer>  
    </complex>
    <?endforeach?>
</complexes>
