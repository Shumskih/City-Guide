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
<div class="mesta-home">
    <div class="row">
        <div class="col-12">
            <h3><span class="gid">Достопримечательности</span> района</h3>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="box-mesto-new">
                <i class="fas fa-list-alt"></i>
                <span>Все памятники архитектуры</span>
                <a href="/dostoprimechatelnosti/" class="btn btn-look">Посмотреть</a>
            </div>
        </div>

        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="box-mesto">
                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">
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
                        <div class="foto" style="background-image: url('<?= $f['src']; ?>')"></div>

                        <h4><?= $arItem['NAME']; ?></h4>
                    </a>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>
