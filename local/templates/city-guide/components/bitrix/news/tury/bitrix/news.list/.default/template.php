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
<div class="tur-list">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="tur-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="row">
                <div class="col-12 col-md-3">
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
                        >
                    </div>
                </div>
                <div class="col-12 col-md-9">
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
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br/><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
</div>
