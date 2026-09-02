<?php
$page = $APPLICATION->GetCurPage();
if ( $page != strtolower( $page ) )	
	LocalRedirect(strtolower( $page ), false, 301);

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/constant.php')) {
	require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/constant.php');
}
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/event_handlers.php')) {
	require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/event_handlers.php');
}
CModule::AddAutoloadClasses(
    '',
    array(
        '\Twim\Helper\StelApp' => '/local/php_interface/include/StelApp.php',
    )
);

function getPageClass() {
    global $APPLICATION;
    $curPageClass = $APPLICATION->GetPageProperty("body_class"); 
    if(!empty($curPageClass)){
        return $curPageClass;
    } else {
        return "page_all";
    }
}

function getPageFix() {
    global $APPLICATION; 
    $s = $APPLICATION->GetProperty('fix_container') === "Y" ? '<div class="row"><div class="col-main">' : '<div><div>';
    return  $s;
}

function each(&$arr) {
	$result = [
		0 => key($arr),
		1 => current($arr),
		"key" => key($arr),
		"value" => current($arr)
	];
	
	next($arr);
	
	return $result;
}