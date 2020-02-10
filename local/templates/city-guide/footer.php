<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
</div>
</div>
</div>
</section>

<section class="wrapper-objects">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="box-count">
                    <span class="count">
                        25
                    </span>
                    <span class="text">
                        Церкви, Храмы
                    </span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="box-count">
                    <span class="count">
                        2
                    </span>
                    <span class="text">
                        Усадьбы
                    </span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="box-count">
                    <span class="count">
                        9
                    </span>
                    <span class="text">
                        Памятнков
                    </span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="box-count">
                    <span class="count">
                        4
                    </span>
                    <span class="text">
                        Музея
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<? if ($APPLICATION->GetCurPage(false) === '/'): ?>
    <section class="wrapper-mesta">
        <div class="container">
            <? $APPLICATION->IncludeComponent("bitrix:news.list", "mesta-home", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "3",	// Код информационного блока
		"IBLOCK_TYPE" => "services",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "7",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
	),
	false
); ?>
        </div>
    </section>
<? endif; ?>

<section class="wrapper-mobile">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2><span class="gid">Мобильный гид</span> по району</h2>
                <p>
                    Сделайте свой тур по нашему району и посещайте интересные объекты в удоное для вас время
                </p>
                <a href="/" class="btn btn-register">Регистрация</a>
            </div>
        </div>
    </div>
</section>

<footer class="wrapper-footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                <div class="box-footer">
                    <div class="footer-logo">
                        <span class="title">
                            <span id="span" class="gid">Гид</span> по городу
                        </span>
                    </div>
                    <p>
                        Данный сайт содержит общедоступную информацию о памятниках на районе
                    </p>
                    <p>
                        При копировании информации ссылка на сайт обязательна
                    </p>
                    <p>© 2019<? if (abs(date('Y')) <> 2019) echo " - " . date('Y') ?>. Все права защищены</p>
                </div>

            </div>
            <div class="col-12  col-md-3 col-lg-4 col-xl-4">

            </div>
            <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                <div class="box-footer">
                    <div class="copirait">
                        <div class="site-ontop">
                            <p><a target="_blank" href="http://shumskih.ru/">shumskih.ru<br>
                                    Создание сайта</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>