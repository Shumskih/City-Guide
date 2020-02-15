<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ((!$arResult['RESULT']) && (!$arResult['ERROR'])):
    $this->addExternalJS("https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=9d61aa15-4d3a-4f36-b7fe-dc961af172b3");
    $this->addExternalJS("/local/components/shumskih.ru/RouteAdd/templates/.default/js/custom_view.js");
    $this->addExternalJS("/local/components/shumskih.ru/RouteAdd/templates/.default/js/script_map.js");
endif;
?>

<div class="component-route-add">
    <div class="row">
        <div class="col-12">
            <? if ($arResult['RESULT']): ?>
                <div class="alert alert-primary" role="alert">
                    <? foreach ($arResult['RESULT'] as $res): ?>
                        <?= $res; ?>
                    <? endforeach; ?>
                </div>
            <? endif; ?>

            <? if ($arResult['ERROR']): ?>
                <div class="alert alert-danger" role="alert">
                    <? foreach ($arResult['ERROR'] as $err): ?>
                        <?= $err; ?>
                    <? endforeach; ?>
                </div>
            <? endif; ?>
        </div>
    </div>

    <? if ((!$arResult['RESULT']) && (!$arResult['ERROR'])): ?>
        <div class="row">
            <div class="col-12">
                <div class="box-map">
                    <div id="map" class="panel-map">
                    </div>
                </div>
                <div class="box-custom-route">
                    <div id="viewContainer"></div>
                </div>
            </div>
        </div>

        <form method="POST">
            <input type="hidden" name="id" value="<?= $arResult['ID']; ?>">
            <input type="hidden" name="action" value="<?= $arResult['ACTION']; ?>">

            <div class="form-row">
                <div class="col-1">
                    Название маршрута
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" name="placeName" class="form-control"
                           value="<?= $arResult['CURRENT_ROUTE']['NAME']; ?>">
                </div>
            </div>

            <div class="box-form">
                <? if ($arResult['CURRENT_ROUTE']['POINTS']): ?>
                    <? $count = 0; ?>
                    <? foreach ($arResult['CURRENT_ROUTE']['POINTS'] as $place): ?>
                        <div class="form-row">
                            <div class="col-1">
                                <div class="box-count">
                                    <?= chr($place['CHR']); ?>
                                </div>
                            </div>
                            <div class="col-10 col-md-6">
                                <select name="place[]" id="place<?= $count; ?>" class="form-control">
                                    <option value="0">Не выбрано</option>
                                    <? foreach ($arResult['PLACES'] as $key => $item): ?>
                                        <option value="<?= $key; ?>" <?= ($place['ID'] == $key) ? 'selected' : ''; ?>><?= $item["NAME"]; ?></option>
                                    <? endforeach; ?>
                                </select>
                            </div>
                            <div class="col-1">
                                <a data-select="<?= $place['ID']; ?>" class="btn btn-danger select-delete">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </div>
                        <? $count++; ?>
                    <? endforeach; ?>
                <? endif; ?>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-1">

                    </div>
                    <div class="col-10 col-md-6">
                        <a id="select-add" class="btn btn-dark">Добавить точку</a>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="/personal/" class="btn">Назад</a>
        </form>
    <? else: ?>
        <a href="/personal/">Вернуться в личный кабинет</a>
    <? endif; ?>
</div>