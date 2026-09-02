<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["complexes"] = [];
$arBuildings = [];
$arResult["flats"] = [];
foreach($arResult["ITEMS"] as $arItem){
    $arProperties = $arItem["PROPERTIES"];
    $id_complex = $arProperties["complex_id"]["VALUE"];
    if(!array_key_exists($id_complex, $arResult["complexes"])){   
        //комплекс
        $arComplex = ["complex_id" => $id_complex];
        $arComplex["complex_name"] = $arProperties["building_name"]["VALUE"];
        $arComplex["complex_latitude"]  = $arProperties["complex_latitude"]["VALUE"];
        $arComplex["complex_longitude"]  = $arProperties["complex_longitude"]["VALUE"];
        $arComplex["complex_address"]  = $arProperties["complex_address"]["VALUE"];
        $arComplex["description_main"]  = $arProperties["description_main"]["VALUE"]["TEXT"];
        if(is_array($arProperties["complex_image"]["VALUE"])){
            $arComplex["complex_image"] = $arProperties["complex_image"]["VALUE"];
        } else {
            $arComplex["complex_image"] = [$arProperties["complex_image"]["VALUE"]];
        } 
        $arComplex["buildings"]  = [];
        
        // Застройщик
        $arDeveloper = ["organization_agent" => $arProperties["organization_agent"]["VALUE"]];
        if(is_array($arProperties["phone_agent"]["VALUE"])){
            $arDeveloper["phone_agent"] =  $arProperties["phone_agent"]["VALUE"][0];
        } else {
            $arDeveloper["phone_agent"] =  $arProperties["phone_agent"]["VALUE"];
        }
        $arDeveloper["url_agent"]  =  $arProperties["url_agent"]["VALUE"];
        $arDeveloper["photo_agent"]  =  $arProperties["photo_agent"]["VALUE"];
        $arDeveloper["url_agent"]  =  $arProperties["url_agent"]["VALUE"];
        $arDeveloper["deleveper_id"]  =  $arProperties["deleveper_id"]["VALUE"];
        
        $arComplex["developer"]  = $arDeveloper;
        
        // отдел продаж
        $arSalesInfo = ["organization_agent" => $arProperties["organization_agent"]["VALUE"]];
        if(is_array($arProperties["phone_agent"]["VALUE"])){
            $arSalesInfo["phone_agent"] =  $arProperties["phone_agent"]["VALUE"][0];
        } else {
            $arSalesInfo["phone_agent"] =  $arProperties["phone_agent"]["VALUE"];
        }
        $arSalesInfo["photo_agent_dk_pro"]  =  $arProperties["photo_agent_dk_pro"]["VALUE"];
        $arSalesInfo["address_agent"]  =  $arProperties["address_agent"]["VALUE"];
        $arSalesInfo["sales_latitude"]  =  $arProperties["sales_latitude"]["VALUE"];
        $arSalesInfo["sales_longitude"]  =  $arProperties["sales_longitude"]["VALUE"];
        $arSalesInfo["timezone"]  =  $arProperties["timezone"]["VALUE"];
        $arSalesInfo["work_day"]  =  $arProperties["work_day"]["VALUE"];
        $arSalesInfo["open_at"]  =  $arProperties["open_at"]["VALUE"];
        $arSalesInfo["close_at"]  =  $arProperties["close_at"]["VALUE"];
        
        $arComplex["sales_info"]  = $arSalesInfo;

        $arResult["complexes"][$id_complex] = $arComplex;
    }
    
    // Корпусы
    $building_id = $arProperties["building_id"]["VALUE"];
    if(!array_key_exists($building_id, $arBuildings)){
        $arBuild = ["building_id" => $building_id];
        
        $arBuild["building_name_dk"] = $arProperties["building_name_dk"]["VALUE"];
        $arBuild["building_fz_214"] = $arProperties["building_fz_214"]["VALUE"];
        $arBuild["building_state_dk"]  = $arProperties["building_state_dk"]["VALUE_XML_ID"];
        $arBuild["building_type"]  = $arProperties["building_type"]["VALUE"];
        $arBuild["building_phase"]  = $arProperties["building_phase"]["VALUE"];
        $arBuild["floors_total"]  = $arProperties["floors_total"]["VALUE"];
        $arBuild["built_year"]  = $arProperties["built_year"]["VALUE"];
        $arBuild["ready_quarter"]  = $arProperties["ready_quarter"]["VALUE"];
        
        $arBuild["complex_id"] = $id_complex;
        $arBuildings[$building_id]  = $arBuild;  
    }
    
    //квартиры
    $arFlat = ["id" => $arItem["ELEMENT"]["ID"]];
    $arFlat["apartment"]  = $arProperties["apartment"]["VALUE"];
    $arFlat["floor"]  = $arProperties["floor"]["VALUE"];
    $arFlat["rooms"]  = $arProperties["rooms"]["VALUE"];
    $arFlat["image_plan"]  = $arProperties["image_plan"]["VALUE"];
    $arFlat["balcony"]  = $arProperties["balcony"]["VALUE"];
    $arFlat["renovation_dk"]  = $arProperties["renovation_dk"]["VALUE"];
    $arFlat["price_value"]  = $arProperties["price_value"]["VALUE"];
    $arFlat["area_value"]  = $arProperties["area_value"]["VALUE"];
    $arFlat["kitchen_area"]  = $arProperties["kitchen_area"]["VALUE"];
    $arFlat["living_area"]  = $arProperties["living_area"]["VALUE"];
    $arFlat["rooms_area"]  = $arProperties["rooms_area"]["VALUE"];
    $arFlat["window_view"]  = $arProperties["window_view"]["VALUE"];
    $arFlat["bathroom"]  = $arProperties["bathroom_unit"]["VALUE"];
    $arFlat["layout_type"]  = $arProperties["open_plan"]["VALUE"];
    
    if(!isset($arResult["flats"][$building_id])){
        $arResult["flats"][$building_id] = [];
    }
    $arResult["flats"][$building_id][$arFlat["id"]] = $arFlat;
            
}

foreach($arBuildings as $arBuild){
    $arResult["complexes"][$arBuild["complex_id"]]["buildings"][] = $arBuild;
}

unset($arResult["ITEMS"]);