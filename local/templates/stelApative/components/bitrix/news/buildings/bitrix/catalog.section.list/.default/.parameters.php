<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arTemplateParameters = array(
	'SHOW_PARENT_NAME' => array(
		'PARENT' => 'VISUAL',
		'NAME' => GetMessage('CPT_BCSL_SHOW_PARENT_NAME'),
		'TYPE' => 'CHECKBOX',
		'DEFAULT' => 'Y'
	),
    'SECTION_ACTIVE_CODE' => array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('SECTION_ACTIVE_CODE_DESC'),
		'TYPE' => 'STRING',
		'DEFAULT' => ''
	),
    'SECTION_ACTIVE_ID' => array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('SECTION_ACTIVE_ID_DESC'),
		'TYPE' => 'STRING',
		'DEFAULT' => ''
	),
    'IBLOCK_URL' => array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('IBLOCK_URL_DESC'),
		'TYPE' => 'STRING',
		'DEFAULT' => ''
	),
);
?>