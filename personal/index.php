<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");

global $USER;
if ($USER->IsAuthorized()) {
    $rsUser = CUser::GetByID($USER->GetID());
    $arUser = $rsUser->Fetch();
}
?>

    <div class="row">
        <div class="col-12 col-md-3">
            <div class="box-user-panel">
                <h5>Ваши данные</h5>
                <div class="box-user-panel-inner user-data">
                    <p><b>Имя: </b><?= $arUser['NAME']; ?></p>
                    <p><b>Фамилия: </b><?= $arUser['LAST_NAME']; ?></p>
                    <p><b>Логин: </b><?= $arUser['LOGIN']; ?></p>
                    <p><b>E-mail: </b><?= $arUser['EMAIL']; ?></p>
                    <a class="btn btn-user-edit" href="/personal/user-edit.php">Изменить</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="box-user-panel">
                <h5>Ваши маршруты</h5>
                <div class="box-user-panel-inner my-tur">

                    <a href="/personal/my-tur/add.php" class="btn btn-add">
                        <i class="fas fa-plus-circle"></i> Добавить свой маршрут
                    </a>

                    <?
                    $arDataFilter = array(
                        "PROPERTY_ATTR_AUTHOR_ID" => $USER->GetID()
                    );
                    ?>
                    <? $APPLICATION->IncludeComponent("bitrix:news.list", "my-tur", Array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
                        "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
                        "AJAX_MODE" => "N",    // Включить режим AJAX
                        "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
                        "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
                        "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
                        "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
                        "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
                        "CACHE_GROUPS" => "Y",    // Учитывать права доступа
                        "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                        "CACHE_TYPE" => "A",    // Тип кеширования
                        "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
                        "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                        "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
                        "DISPLAY_DATE" => "Y",    // Выводить дату элемента
                        "DISPLAY_NAME" => "Y",    // Выводить название элемента
                        "DISPLAY_PICTURE" => "Y",    // Выводить изображение для анонса
                        "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
                        "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
                        "FIELD_CODE" => array(    // Поля
                            0 => "",
                            1 => "",
                        ),
                        "FILTER_NAME" => "arDataFilter",    // Фильтр
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
                        "IBLOCK_ID" => "4",    // Код информационного блока
                        "IBLOCK_TYPE" => "services",    // Тип информационного блока (используется только для проверки)
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
                        "INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
                        "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
                        "NEWS_COUNT" => "20",    // Количество новостей на странице
                        "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
                        "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
                        "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
                        "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
                        "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
                        "PAGER_TITLE" => "Маршруты",    // Название категорий
                        "PARENT_SECTION" => "",    // ID раздела
                        "PARENT_SECTION_CODE" => "",    // Код раздела
                        "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
                        "PROPERTY_CODE" => array(    // Свойства
                            0 => "ATTR_AUTOR_ID",
                            1 => "",
                        ),
                        "SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
                        "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
                        "SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
                        "SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
                        "SET_STATUS_404" => "N",    // Устанавливать статус 404
                        "SET_TITLE" => "N",    // Устанавливать заголовок страницы
                        "SHOW_404" => "N",    // Показ специальной страницы
                        "SORT_BY1" => "ACTIVE_FROM",    // Поле для первой сортировки новостей
                        "SORT_BY2" => "SORT",    // Поле для второй сортировки новостей
                        "SORT_ORDER1" => "DESC",    // Направление для первой сортировки новостей
                        "SORT_ORDER2" => "ASC",    // Направление для второй сортировки новостей
                        "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа списка
                    ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>