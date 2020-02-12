<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$elementsIds = $arResult['DISPLAY_PROPERTIES']['ATTR_POINTS']['VALUE'];
$sectionIblock = abs($arResult['DISPLAY_PROPERTIES']['ATTR_POINTS']['LINK_IBLOCK_ID']);

$route = [];

$arFilter = Array(
    "IBLOCK_ID" => $sectionIblock,
    "ACTIVE_DATE" => "Y",
    "ACTIVE" => "Y",
    'ID' => $elementsIds
);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array());
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();

    $cor = explode(',', $arProps['ATTR_MAP']['VALUE']);
    $route[] = $cor;

    $arFields['PROPERTIES'] = $arProps;
    $arResult['TUR'][] = $arFields;
}
?>
<script>
    let snt_route = <?= CUtil::PhpToJSObject($route, false, true); ?>;
</script>
