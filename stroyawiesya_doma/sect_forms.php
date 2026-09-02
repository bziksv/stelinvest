<div class="modal fade" id="modal-callback" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm modal-form" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title h1">Обратный звонок</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "form-popup", Array(
                        "CACHE_TIME" => "3600",	// Время кеширования (сек.)
                        "CACHE_TYPE" => "A",	// Тип кеширования
                        "CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
                        "CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
                        "EDIT_URL" => "",	// Страница редактирования результата
                        "IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
                        "LIST_URL" => "",	// Страница со списком результатов
                        "SEF_MODE" => "N",	// Включить поддержку ЧПУ
                        "SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
                        "USE_EXTENDED_ERRORS" => "Y",	// Использовать расширенный вывод сообщений об ошибках
                        "VARIABLE_ALIASES" => array(
                            "RESULT_ID" => "",
                            "WEB_FORM_ID" => "",
                        ),
                        "WEB_FORM_ID" => "2",	// ID веб-формы
                    ),
                    false
                );?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-order" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm modal-form" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title h1">Отправить заявку</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "form-popup", Array(
                        "CACHE_TIME" => "3600",	// Время кеширования (сек.)
                        "CACHE_TYPE" => "A",	// Тип кеширования
                        "CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
                        "CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
                        "EDIT_URL" => "",	// Страница редактирования результата
                        "IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
                        "LIST_URL" => "",	// Страница со списком результатов
                        "SEF_MODE" => "N",	// Включить поддержку ЧПУ
                        "SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
                        "USE_EXTENDED_ERRORS" => "Y",	// Использовать расширенный вывод сообщений об ошибках
                        "VARIABLE_ALIASES" => array(
                            "RESULT_ID" => "",
                            "WEB_FORM_ID" => "",
                        ),
                        "WEB_FORM_ID" => "3",	// ID веб-формы
                    ),
                    false
                );?>
            </div>
        </div>
    </div>
</div>