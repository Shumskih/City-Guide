<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$this->addExternalJS("https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=9d61aa15-4d3a-4f36-b7fe-dc961af172b3");
$this->addExternalJS("/local/templates/city-guide/components/bitrix/news/tury/bitrix/news.detail/.default/js/custom_view.js");
$this->addExternalJS("/local/templates/city-guide/components/bitrix/news/tury/bitrix/news.detail/.default/js/script_map.js");
?>
<div class="tur-detail">
    <div class="box-time">
        <p><i class="far fa-calendar-alt"></i> <?= $arResult['DISPLAY_ACTIVE_FROM']; ?></p>
    </div>

    <div class="alert alert-primary" role="alert">
        Маршруты строятся на основе Яндекс.Карты. <b>Можно выбрать три варианта маршрута</b>: <b>автомобильный</b>
        (показывается по-умолчанию), <b>общественный транспорт</b> (строится на основе данных маршрутов в системе
        Яндекс), <b>пешеходный</b>.
    </div>

    <div class="box-map">
        <div id="map" class="panel-map">

        </div>
    </div>

    <div class="box-custom-route">
        <div id="viewContainer"></div>
    </div>

    <? if ($arResult['DETAIL_TEXT']): ?>
        <div class="box-detail-text">
            <?= $arResult['DETAIL_TEXT']; ?>
        </div>
    <? endif; ?>

    <? $count = 65; ?>
    <? foreach ($arResult['TUR'] as $tur): ?>
        <div class="box-element">
            <div class="row">
                <div class="col-1">
                    <div class="box-count">
                        <?= chr($count); ?>
                    </div>
                </div>
                <div class="col-11">
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-3">
                            <?
                            if (!empty($tur['PREVIEW_PICTURE']['ID'])) {
                                $file = $tur['PREVIEW_PICTURE']['ID'];
                                $f = CFile::ResizeImageGet(
                                    $file,
                                    array('width' => 800, 'height' => 800),
                                    BX_RESIZE_IMAGE_EXACT,
                                    true
                                );
                            } else {
                                $f['src'] = '/local/templates/city-guide/images/box-logo.jpg';
                            }
                            ?>
                            <div class="box-image">
                                <img
                                        class="img-fluid"
                                        src="<?= $f['src']; ?>"
                                >
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-lg-9">
                            <div class="box-info">
                                <h4>
                                    <a target="_blank" href="<?= $tur['DETAIL_PAGE_URL']; ?>">
                                        <?= $tur['NAME']; ?>
                                    </a>
                                </h4>
                                <p>
                                    <b>Адрес: </b><?= $tur['PROPERTIES']['ATTR_ADDRESS']['VALUE']; ?>
                                </p>

                                <div class="box-preview-text">
                                    <?= $tur['PREVIEW_TEXT']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? $count++; ?>
    <? endforeach; ?>
</div>