<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
// photos
$arResult["PHOTOS"] = [];
foreach ($arResult['rows_raw'] as $key => $row){
    $rawFile = CFile::GetFileArray($row["UF_FILE"]);
    //trumb normal
    $file_trumb = CFile::ResizeImageGet($row["UF_FILE"], array('width'=>284, 'height'=>80), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_trumb['src'])){ $file_trumb["src"] = $rawFile["src"]; } 
    $arResult["PHOTOS"][$key]["n"] = $file_trumb;
    //trumb @2x
    $file_trumb2x = CFile::ResizeImageGet($row["UF_FILE"], array('width'=>568, 'height'=>160), BX_RESIZE_IMAGE_EXACT, true); 
    if(!isset($file_trumb2x['src'])){ $file_trumb2x["src"] = $rawFile["src"]; } 
    $arResult["PHOTOS"][$key]["2x"] = $file_trumb2x;
}