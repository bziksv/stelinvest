<?

use Bitrix\Main\EventManager;
use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Loader;

Loc::loadMessages(__FILE__);

// EventManager::getInstance()->addEventHandler("main", "OnLocalRedirect", array("EventHeadlerProject", "OnBeforeLocRedirect"));
EventManager::getInstance()->addEventHandler("iblock", "OnAfterIBlockElementUpdate", array("EventHeadlerProject", "OnAfterIBlockElementUpdateFunc"));
EventManager::getInstance()->addEventHandler("iblock", "OnAfterIBlockElementAdd", array("EventHeadlerProject", "OnAfterIBlockElementAddFunc"));
// EventManager::getInstance()->addEventHandler("main", "OnEndBufferContent", array("EventHeadlerProject", "ChangeMyContent"));
EventManager::getInstance()->addEventHandler("form", "onBeforeResultAdd", "onBeforeResultAddHandler");


EventManager::getInstance()->addEventHandlerCompatible('main', 'OnEndBufferContent', function (&$content) {
    //compress html
    global $USER, $APPLICATION;
    if ((is_object($USER) && $USER->IsAuthorized()) || strpos($APPLICATION->GetCurDir(), "/bitrix/") !== false)
        return;
    if ($APPLICATION->GetProperty("save_kernel") == "Y")
        return;
    $search = array(
        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s'
    );
    $replace = array(
        '>',
        '<',
        '\\1'
    );
    $content = preg_replace($search, $replace, $content);
    //ajax
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH'], $_GET['AJAX_PAGE'])
        && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        list(, $content_html) = explode('<!--RestartBuffer-->', $content);
        if (is_string($content_html) && strlen($content_html)) {
            $content = $content_html;
        }
    }
});

class EventHeadlerProject {
    // для ajax запросов меняем статус при редиректе с 302 на 209
    public static function OnBeforeLocRedirect() {
        $request = Application::getInstance()->getContext()->getRequest();
        $ajax_sid = htmlspecialchars($request->getQuery("ajax_sid"));
        // если запрос ajax и 302 ответ, то отправляем 209, чтобы jquery поймала ответ
        if (!empty($ajax_sid) && CHTTP::GetLastStatus() == "302 Found") {
            CHTTP::SetStatus("209 Ajax Redirect");
        }
    }

    /**
     * привязка к свойству QUEUE квартиры рездела очереди
     * @param type $arFields
     */
    protected static function addApartamentPropsQueue($arFields) {
        if ($arFields["IBLOCK_ID"] == IBLOCK_APARTAMENT_ID) {
            Loader::includeModule("iblock");
            $arFilter = array('IBLOCK_ID' => $arFields["IBLOCK_ID"], "DEPTH_LEVEL" => 2, "HAS_ELEMENT" => $arFields["ID"]);
            $rsSections = CIBlockSection::GetList(
                array("SORT" => "ASC"),
                $arFilter,
                false,
                array("IBLOCK_ID", "ID", "CODE", "NAME"),
                false
            );
            while ($arSection = $rsSections->GetNext()) {
                CIBlockElement::SetPropertyValuesEx($arFields["ID"], false, array("QUEUE" => $arSection["ID"]));
            }
            \Bitrix\Iblock\PropertyIndex\Manager::updateElementIndex($arFields["IBLOCK_ID"], $arFields["ID"]);
            CIBlock::clearIblockTagCache($arFields["IBLOCK_ID"]);
        }
    }

    public static function OnAfterIBlockElementUpdateFunc(&$arFields) {
        self::addApartamentPropsQueue($arFields);
    }

    public static function OnAfterIBlockElementAddFunc(&$arFields) {
        self::addApartamentPropsQueue($arFields);
    }

}

function onBeforeResultAddHandler($WEB_FORM_ID, &$arFields, &$arrVALUES) {
    $crmPostUrl = "https://api.macro.sbercrm.com/estate/request/";
    $domain = "stelinvest.ru";
    $time = time();
    $token = md5($domain . $time . macrocrmtoken);

    if ($WEB_FORM_ID == "2") {

    }

    if ($WEB_FORM_ID == "3") {
        $postdata = http_build_query(
            array(
                'domain' => $domain,
                'time' => $time,
                'token'=>$token,
                'action'=>'question',
                'name'=>$arrVALUES["form_text_12"],
                'phone'=>$arrVALUES["form_text_13"],
                'message'=>"Объект: ".$arrVALUES["form_text_14"]."\r\nКомментарий: ".$arrVALUES["form_text_15"]."\r\nОткуда узнали: ".$arrVALUES["form_text_16"]
            )
        );

        $opts = array(
            'http' =>
                array(
                    'method' => 'POST',
                    'header' => 'Content-Type: application/x-www-form-urlencoded',
                    'content' => $postdata
                ),
            'ssl'=>array(
                'verify_peer'=>false,
                'verify_peer_name'=>false,
            ),
        );

        $context = stream_context_create($opts);
        file_get_contents($crmPostUrl,false,$context);

    }
}
