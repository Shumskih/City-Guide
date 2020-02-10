<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

$this->setFrameMode(true);
$this->addExternalJS("https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=9d61aa15-4d3a-4f36-b7fe-dc961af172b3");
?>

<div class="catalog-element" id="<?= $this->GetEditAreaId($arResult['ID']); ?>">
    <div class="box-mesto">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="box-image">
                    <?
                    if (!empty($arResult['DETAIL_PICTURE']['ID'])) {
                        $file = $arResult['DETAIL_PICTURE']['ID'];
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
                    <img
                            class="img-fluid"
                            src="<?= $f['src']; ?>"
                            alt="<?= $arResult['DETAIL_PICTURE']['ALT']; ?>"
                            title="<?= $arResult['DETAIL_PICTURE']['TITLE']; ?>"
                    >
                </div>
                <div class="box-map">
                    <div id="map" class="panel-map"></div>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <div class="box-info">
                    <p>
                        <b>Адрес: </b><?= $arResult['PROPERTIES']['ATTR_ADDRESS']['VALUE']; ?>
                    </p>
                    <div class="box-detail-text">
                        <?= $arResult['DETAIL_TEXT']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <? if ($arResult['SODERGANIE']): ?>
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3">
            <div class="nav flex-column nav-pills box-soderganie" id="v-pills-tab" role="tablist"
                 aria-orientation="vertical">
                <h4>Содержание</h4>
                <? $count = 1; ?>
                <? foreach ($arResult['SODERGANIE'] as $key => $item): ?>
                    <a class="nav-link <?= ($count == 1) ? 'active' : ''; ?>"
                       id="tab-sd<?= $key; ?>"
                       data-toggle="pill"
                       href="#panel-sd<?= $key; ?>"
                       role="tab"
                       aria-controls="panel-sd<?= $key; ?>"
                       aria-selected="true">
                        <i class="fas fa-chevron-circle-right"></i>
                        <?= $item ?>
                    </a>
                    <? $count++; ?>
                <? endforeach; ?>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-9">
            <div class="tab-content" id="v-pills-tabContent">
                <? $count = 1; ?>
                <? foreach ($arResult['GID_ELEMENTS'] as $key => $item): ?>
                    <div class="tab-pane fade <?= ($count == 1) ? 'show active' : ''; ?>"
                         id="panel-sd<?= $item['ID']; ?>"
                         role="tabpanel"
                         aria-labelledby="tab-sd<?= $item['ID']; ?>">
                        <div class="box-glava">
                            <h4 class="glava-title">
                                <?= $item['NAME']; ?>
                            </h4>
                            <? if ($item['PROPERTY']['ATTR_AUDIOGUIDE_MP3']['VALUE']): ?>
                                <div class="glava-audio">
                                    <div class="row">
                                        <div class="col-12 col-md-4 col-lg-3">
                                            <div class="box-music">
                                                <i class="fas fa-music"></i> Аудиогид
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8 col-lg-9">
                                            <?
                                            $audioFile = CFile::GetFileArray($item['PROPERTY']['ATTR_AUDIOGUIDE_MP3']['VALUE'])
                                            ?>
                                            <audio controls>
                                                <source src="<?= $audioFile['SRC'] ?>" type="audio/mpeg">
                                            </audio>
                                        </div>
                                    </div>
                                </div>
                            <? endif; ?>
                            <div class="glava-text">
                                <?= $item['DETAIL_TEXT']; ?>
                            </div>
                            <? if ($item['PROPERTY']['ATTR_PHOTO']['VALUE']): ?>
                                <div class="box-foto">
                                    <div class="row">
                                        <? foreach ($item['PROPERTY']['ATTR_PHOTO']['VALUE'] as $photo): ?>
                                            <?
                                            $f = CFile::ResizeImageGet(
                                                $photo,
                                                array('width' => 800, 'height' => 800),
                                                BX_RESIZE_IMAGE_EXACT,
                                                true
                                            );
                                            ?>
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                                <div class="photo" style="background-image: url(<?= $f['src']; ?>);">
                                                    <a data-fancybox="gallery" href="<?= $f['src']; ?>">

                                                    </a>
                                                </div>
                                            </div>
                                        <? endforeach; ?>
                                    </div>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                    <? $count++; ?>
                <? endforeach; ?>
            </div>
        </div>
        <? endif; ?>
    </div>
