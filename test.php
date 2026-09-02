<?php
define("macrocrmtoken", "gQdly9vmdme8vK6ZV33EgsztuVCN5zww9p5Q"); // Токен crm
$crmPostUrl = "https://api.macro.sbercrm.com/estate/request/";
$domain = "stelinvest.ru";
$time = time();
$token = md5($domain . $time . macrocrmtoken);

$arrVALUES["form_text_12"] = "Тест";
$arrVALUES["form_text_13"] = "+79025618481";
$arrVALUES["form_text_14"] = "Test";
$arrVALUES["form_text_15"] = "Коммент";
$arrVALUES["form_text_16"] = "";

$postdata = http_build_query(
    array(
        'domain' => $domain,
        'time' => $time,
        'token' => $token,
        'action' => 'question',
        'name' => $arrVALUES["form_text_12"],
        'phone' => $arrVALUES["form_text_13"],
        'message' => "Объект: " . $arrVALUES["form_text_14"] . "\r\nКомментарий: " . $arrVALUES["form_text_15"] . "\r\nОткуда узнали: " . $arrVALUES["form_text_16"]
    )
);

$opts = array(
    'http' =>
        array(
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postdata
        ),
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
    ),
);

$context = stream_context_create($opts);
$res = file_get_contents($crmPostUrl, false, $context);
print_r(json_decode($res, true));

