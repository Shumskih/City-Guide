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
<div class="myblog-list">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="myblog-list-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="box-image">
                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
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
                            <img
                                    class="img-fluid"
                                    src="<?= $f['src']; ?>"
                                    alt="<?= $arItem['PREVIEW_PICTURE']['ALT']; ?>"
                                    title="<?= $arItem['PREVIEW_PICTURE']['TITLE']; ?>"
                            >
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="box-title">
                        <h4>
                            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">
                                <b><?= $arItem['NAME']; ?></b>
                            </a>
                        </h4>
                    </div>
                    <div class="box-time">
                        <p>
                            <i class="fas fa-calendar-alt"></i> <?= $arItem['DISPLAY_ACTIVE_FROM']; ?>
                        </p>
                    </div>
                    <div class="box-preview">
                        <?= $arItem['PREVIEW_TEXT']; ?>
                    </div>
                </div>
            </div>
        </div>
    <? endforeach; ?>

    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br/><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
</div>
