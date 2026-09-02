<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

/** @var CBitrixComponentTemplate $this */
/** @var array $arResult */
/** @var CMain $APPLICATION */

// Composite keeps <head> assets from AddHeadString in the static HTML.
// Body output from OnEpilog is dropped on cache hits (guests), so the
// banner must be injected by a head script — same as module 1.0.3.
if (method_exists($this, 'setFrameMode')) {
	$this->setFrameMode(false);
}

$cookieName = htmlspecialcharsbx($arResult['COOKIE_NAME']);
$textVer = (int)$arResult['TEXTVER'];
$padding = (int)$arResult['PADDINGSIZE'];
$opacity = htmlspecialcharsbx((string)$arResult['OPACITY']);
$zIndex = (int)$arResult['ZINDEX'];
$topOffset = (int)$arResult['TOP'];
$styleId = (int)$arResult['SETSTYLE'];
$position = htmlspecialcharsbx($arResult['POSITION']);
$animation = htmlspecialcharsbx($arResult['ANIMATION']);
$btnText = htmlspecialcharsbx($arResult['TEXTBTN']);
$mainText = $arResult['MAINTEXT'];

$classes = array(
	'nca-cookiesaccept-line',
	'style-'.$styleId,
	'nca-position-'.$position,
	'nca-animation-'.$animation,
);
if ($arResult['HIDE_MOBILE'] === 'Y') {
	$classes[] = 'nca-hidden-mobile';
}
if ($arResult['HIDE_PC'] === 'Y') {
	$classes[] = 'nca-hidden-pc';
}
if ($arResult['TOPORBOTTOM'] === '1') {
	$classes[] = 'nca-place-top';
} else {
	$classes[] = 'nca-place-bottom';
}

$styleVars = sprintf(
	'--nca-padding:%dpx;--nca-opacity:%s;--nca-zindex:%d;--nca-top:%d%%;',
	$padding,
	$opacity,
	$zIndex,
	$topOffset
);

ob_start();
?>
<div
	id="nca-cookiesaccept-line"
	class="<?=htmlspecialcharsbx(implode(' ', $classes))?>"
	style="<?=htmlspecialcharsbx($styleVars)?>"
	data-cookie-name="<?=$cookieName?>"
	data-textver="<?=$textVer?>"
	role="dialog"
	aria-live="polite"
>
	<div class="nca-bar" id="nca-bar">
		<div class="nca-cookiesaccept-line-text"><?=$mainText?></div>
		<div class="nca-cookiesaccept-line-actions">
			<button type="button" id="nca-cookiesaccept-line-accept-btn" class="nca-accept-btn">
				<?=$btnText?>
			</button>
		</div>
	</div>
</div>
<?php
$html = trim(preg_replace('/\s+/', ' ', (string)ob_get_clean()));
$cssUrl = $this->GetFolder().'/style.css';

$APPLICATION->AddHeadString(
	'<link rel="stylesheet" href="'.htmlspecialcharsbx($cssUrl).'">',
	true
);

$APPLICATION->AddHeadString(
	'<script>'
	.'document.addEventListener("DOMContentLoaded",function(){'
	.'(function(){'
	.'if(window!==window.top){return;}'
	.'var cookieName='.CUtil::PhpToJSObject($arResult['COOKIE_NAME']).';'
	.'if(!cookieName){return;}'
	.'function readCookie(name){var p=("; "+document.cookie).split("; "+name+"=");return p.length===2?p.pop().split(";").shift():"";}'
	.'function writeAcceptCookie(name){var maxAge=60*60*24*400;var parts=[name+"=Y","path=/","max-age="+maxAge,"SameSite=Lax"];if(window.location.protocol==="https:"){parts.push("Secure");}document.cookie=parts.join("; ");}'
	.'if(readCookie(cookieName)==="Y"){return;}'
	.'var wrap=document.createElement("div");wrap.innerHTML='.CUtil::PhpToJSObject($html).';'
	.'var root=wrap.firstElementChild;if(!root){return;}'
	.'document.body.appendChild(root);'
	.'var btn=document.getElementById("nca-cookiesaccept-line-accept-btn");'
	.'if(btn){btn.addEventListener("click",function(){writeAcceptCookie(cookieName);if(root.parentNode){root.parentNode.removeChild(root);}});}'
	.'})();'
	.'});'
	.'</script>',
	true
);
