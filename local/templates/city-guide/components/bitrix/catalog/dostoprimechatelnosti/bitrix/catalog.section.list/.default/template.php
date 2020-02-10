<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true)
?>

<? if (count($arResult['SECTION']) > 0): ?>
    <div class="dostoprimechatelnosti-list-li">
        <div class="row">
            <?
            foreach ($arResult["SECTIONS"] as $arSection):
                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
                ?>

                <div class="col-12 col-sm-6 col-md-4 col-lg3">
                    <div class="dostoprimechatelnosti-item-li"
                         id="<?= $this->GetEditAreaId($arSection['ID']); ?>">
                        <a class="section-list" href="<?= $arSection['SECTION_PAGE_URL'] ?>">
                            <? $f['src'] = '/local/templates/city-guide/images/box-logo.jpg'; ?>
                            <div class="box-image">
                                <img src="<?= $f['src'] ?>" alt="" class="img-fluid">
                            </div>

                            <h4><?= $arSection['NAME']; ?></h4>
                        </a>
                    </div>
                </div>

            <? endforeach; ?>
        </div>
    </div>
<? endif; ?>