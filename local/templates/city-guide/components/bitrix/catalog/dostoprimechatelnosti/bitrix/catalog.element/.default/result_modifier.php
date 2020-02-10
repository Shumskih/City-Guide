<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$array = [];

$cor = explode(',', $arResult['PROPERTIES']['ATTR_MAP']['VALUE']);
$array['cor_x'] = $cor[0];
$array['cor_y'] = $cor[1];
$array['title'] = $arResult['NAME'];

$sectionId = abs($arResult['DISPLAY_PROPERTIES']['ATTR_ELEMENTS']['VALUE']);
$sectionIblock = abs($arResult['DISPLAY_PROPERTIES']['ATTR_ELEMENTS']['LINK_IBLOCK_ID']);

$soderganie = [];

$arFilter = Array("IBLOCK_ID" => $sectionIblock, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", 'IBLOCK_SECTION_ID' => $sectionId);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array());
while($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();

    $soderganie[$arFields['ID']] = $arFields['NAME'];

    $arFields['PROPERTY'] = $arProps;
    $arResult['GID_ELEMENTS'][] = $arFields;
}

$arResult['SODERGANIE'] = $soderganie;
?>
<script>
    let snt_cor_x = '<?= $array['cor_x']; ?>';
    let snt_cor_y = '<?= $array['cor_y']; ?>';
    let snt_title = '<?= $array['title']; ?>';
</script>
