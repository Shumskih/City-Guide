<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->addExternalJS("https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=9d61aa15-4d3a-4f36-b7fe-dc961af172b3");
$this->setFrameMode(true);
?>

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="catalog-section">
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="box-section-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <?
                            if (!empty($arItem['PREVIEW_PICTURE']['ID'])) {
                                $file = $arItem['PREVIEW_PICTURE']['ID'];
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
                                        alt="<?= $arItem['PREVIEW_PICTURE']['ALT']; ?>"
                                        title="<?= $arItem['PREVIEW_PICTURE']['TITLE']; ?>"
                                >
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <h4 class="title">
                                <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">
                                    <?= $arItem['NAME']; ?>
                                </a>
                            </h4>
                            <div class="box-preview-text">
                                <?= $arItem['PREVIEW_TEXT']; ?>
                            </div>
                        </div>
                    </div>
                </div>

            <? endforeach; ?>

            <? if ($arParams['DISPLAY_BOTTOM_PAGER']): ?>
                <?= $arResult['NAV_STRING']; ?>
            <? endif; ?>

        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="box-map">
            <div id="map" class="panel-map"></div>
        </div>
    </div>
</div>
