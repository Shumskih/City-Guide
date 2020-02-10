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
?>
<div class="myblog-detail">
    <div class="box-time">
        <p>
            <i class="fas fa-calendar-alt"></i> <?= $arResult['DISPLAY_ACTIVE_FROM']; ?>
        </p>
    </div>

    <div class="row">
        <? if ($arResult['DETAIL_PICTURE']['ID']): ?>
        <div class="col-12 col-md-3">
            <div class="box-image">
                <a data-fancybox="gallery" href="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>">
                    <img
                            class="img-fluid"
                            src="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>"
                            alt="<?= $arResult['DETAIL_PICTURE']['ALT']; ?>"
                            title="<?= $arResult['DETAIL_PICTURE']['TITLE']; ?>"
                    >
                </a>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <? else: ?>
            <div class="col-12">
                <? endif; ?>
                <div class="box-detail-text">
                    <?= html_entity_decode($arResult['DETAIL_TEXT']); ?>
                </div>

                <? if ($arResult['PROPERTIES']['ATTR_FOTO']['VALUE']): ?>
                    <div class="box-foto">
                        <div class="row">
                            <? foreach ($arResult['PROPERTIES']['ATTR_FOTO']['VALUE'] as $photo): ?>
                                <?
                                    $f = CFile::ResizeImageGet(
                                            $photo,
                                            array('width' => 800, 'height' => 800),
                                            BX_RESIZE_IMAGE_EXACT,
                                            true
                                    );
                                ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="photo"  style="background-image: url(<?= $f['src']; ?>);">
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
    </div>