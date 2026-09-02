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
<realty-feed xmlns="http://webmaster.yandex.ru/schemas/feed/realty/2010-06">
    <generation-date><?=$arResult["DATE_GENERATE"]?></generation-date>
    <?foreach($arResult["ITEMS"] as $arItem):
        $arProperties = $arItem["PROPERTIES"];?>
        <offer internal-id="<?=$arItem["ELEMENT"]["ID"]?>"> 
        <type>продажа</type>
        <property-type>жилая</property-type>
        <?if($arProperties["category"]["VALUE"]):?>
        <category><?=$arProperties["category"]["VALUE"]?></category>
        <?endif;?>
        <creation-date><?=$arItem["createDate"]?></creation-date>
        <last-update-date><?=$arItem["timestampDate"]?></last-update-date>
        <?if($arItem["expireDate"]):?>
        <expire-date><?=$arItem["expireDate"]?></expire-date>
        <?endif;?>
        <location>
            <country>Россия</country>
            <?if($arProperties["district"]["VALUE"]):?>
            <district><?=$arProperties["district"]["VALUE"]?></district>
            <?endif;?>
            <?if($arProperties["locality_name"]["VALUE"]):?>
            <locality-name><?=$arProperties["locality_name"]["VALUE"]?></locality-name>
            <?endif;?>
            <?if($arProperties["sub_locality_name"]["VALUE"]):?>
            <sub-locality-name><?=$arProperties["sub_locality_name"]["VALUE"]?></sub-locality-name>
            <?endif;?>
            <?if($arProperties["address"]["VALUE"]):?>
            <address><?=$arProperties["address"]["VALUE"]?></address>
            <?endif;?>
            <?if($arProperties["apartment"]["VALUE"]):?>
            <apartment><?=$arProperties["apartment"]["VALUE"]?></apartment>
            <?endif;?>
        </location>
        <?if($arProperties["deal_status"]["VALUE"]):?>
        <deal-status><?=$arProperties["deal_status"]["VALUE"]?></deal-status>
        <?endif;?>
        <price>
            <?if($arProperties["price_value"]["VALUE"]):?>
            <value><?=$arProperties["price_value"]["VALUE"]?></value>
            <?endif;?>
            <?if($arProperties["price_currency"]["VALUE"]):?>
            <currency><?=$arProperties["price_currency"]["VALUE"]?></currency>
            <?endif;?>
        </price>
        <sales-agent>
            <?if($arProperties["phone_agent"]["VALUE"]):?>
            <?if(is_array($arProperties["phone_agent"]["VALUE"])):?>
            <?foreach ($arProperties["phone_agent"]["VALUE"] as $phone) {?>
            <phone><?=$phone?></phone>
            <?}?>
            <?else:?>
            <phone><?=$arProperties["phone_agent"]["VALUE"]?></phone>
            <?endif;?>
            <?endif;?>
            <?if($arProperties["category_agent"]["VALUE"]):?>
            <category><?=$arProperties["category_agent"]["VALUE"]?></category>
            <?endif;?>
            <?if($arProperties["organization_agent"]["VALUE"]):?>
            <organization><?=$arProperties["organization_agent"]["VALUE"]?></organization>
            <?endif;?>
            <?if($arProperties["url_agent"]["VALUE"]):?>
            <url><?=$arProperties["url_agent"]["VALUE"]?></url>
            <?endif;?>
            <?if($arProperties["email_agent"]["VALUE"]):?>
            <email><?=$arProperties["email_agent"]["VALUE"]?></email>
            <?endif;?>
            <?if($arProperties["photo_agent"]["VALUE"]):?>
            <photo><?=$arProperties["photo_agent"]["VALUE"]?></photo>
            <?endif;?>
        </sales-agent>
        <?if($arProperties["image_plan"]["VALUE"]):?>
        <image tag="plan"><?=CHTTP::URN2URI(CFile::GetPath($arProperties["image_plan"]["VALUE"]), $arResult["SERVER_NAME"]);?></image>
        <?endif;?>
        <?if($arProperties["image_3d"]["VALUE"]):?>
        <image tag="plan 3d"><?=CHTTP::URN2URI(CFile::GetPath($arProperties["image_3d"]["VALUE"]), $arResult["SERVER_NAME"]);?></image>
        <?endif;?>
        <?if($arProperties["image"]["VALUE"]):?>
        <?if(is_array($arProperties["image"]["VALUE"])):?>
        <?foreach ($arProperties["image"]["VALUE"] as $image) {?>
        <image tag="more"><?=CHTTP::URN2URI(CFile::GetPath($image), $arResult["SERVER_NAME"]);?></image>
        <?}?>
        <?else:?>
        <image tag="more"><?=CHTTP::URN2URI(CFile::GetPath($arProperties["image"]["VALUE"]), $arResult["SERVER_NAME"]);?></image>
        <?endif;?>
        <?endif;?>
        <area>
            <?if($arProperties["area_value"]["VALUE"]):?>
            <value><?=$arProperties["area_value"]["VALUE"]?></value>
            <?endif;?>
            <unit>кв. м</unit>
        </area>
        <?if($arProperties["renovation"]["VALUE"]):?>
        <renovation><?=$arProperties["renovation"]["VALUE"]?></renovation>
        <?endif;?>
        <?if($arProperties["description"]["VALUE"]):?>
        <description><?=strip_tags(htmlspecialcharsbx($arProperties["description"]["VALUE"]["TEXT"]))?></description>
        <?endif;?>
        <?if($arProperties["new_flat"]["VALUE"] == "Y"):?>
        <new-flat><?=$arProperties["new_flat"]["USER_TYPE_SETTINGS"]["VIEW"]["Y"]?></new-flat>
        <?endif;?>
        <?if($arProperties["floor"]["VALUE"]):?>
        <floor><?=$arProperties["floor"]["VALUE"]?></floor>
        <?endif;?>
        <?if($arProperties["studio"]["VALUE"] == "Y"):?>
        <studio><?=$arProperties["studio"]["USER_TYPE_SETTINGS"]["VIEW"]["Y"]?></studio>
        <?endif;?>
        <?if($arProperties["rooms"]["VALUE"]):?>
        <rooms><?=$arProperties["rooms"]["VALUE"]?></rooms>
        <?endif;?>
        <?if($arProperties["open_plan"]["VALUE"] == "Y"):?>
        <open-plan><?=$arProperties["open_plan"]["USER_TYPE_SETTINGS"]["VIEW"]["Y"]?></open-plan>
        <?endif;?>
        <?if($arProperties["balcony"]["VALUE"]):?>
        <balcony><?=$arProperties["balcony"]["VALUE"]?></balcony>
        <?endif;?>
        <?if($arProperties["bathroom_unit"]["VALUE"]):?>
        <bathroom-unit><?=$arProperties["bathroom_unit"]["VALUE"]?></bathroom-unit>
        <?endif;?>
        <?if($arProperties["floors_total"]["VALUE"]):?>
        <floors-total><?=$arProperties["floors_total"]["VALUE"]?></floors-total>
        <?endif;?>
        <?if($arProperties["building_name"]["VALUE"]):?>
        <building-name><?=$arProperties["building_name"]["VALUE"]?></building-name>
        <?endif;?>
        <?if($arProperties["yandex_building_id"]["VALUE"]):?>
        <yandex-building-id><?=$arProperties["yandex_building_id"]["VALUE"]?></yandex-building-id>
        <?endif;?>
        <?if($arProperties["yandex_house_id"]["VALUE"]):?>
        <yandex-house-id><?=$arProperties["yandex_house_id"]["VALUE"]?></yandex-house-id>
        <?endif;?>
        <?if($arProperties["building_state"]["VALUE_XML_ID"]):?>
        <building-state><?=$arProperties["building_state"]["VALUE_XML_ID"]?></building-state>
        <?endif;?>
        <?if($arProperties["building_section"]["VALUE"]):?>
        <building-section><?=$arProperties["building_section"]["VALUE"]?></building-section>
        <?endif;?>
        <?if($arProperties["built_year"]["VALUE"]):?>
        <built-year><?=$arProperties["built_year"]["VALUE"]?></built-year>
        <?endif;?>
        <?if($arProperties["building_phase"]["VALUE"]):?>
        <building-phase><?=$arProperties["building_phase"]["VALUE"]?></building-phase>
        <?endif;?>
        <?if($arProperties["ready_quarter"]["VALUE"]):?>
        <ready-quarter><?=$arProperties["ready_quarter"]["VALUE"]?></ready-quarter>
        <?endif;?>
    </offer>
    <?endforeach?>
</realty-feed>