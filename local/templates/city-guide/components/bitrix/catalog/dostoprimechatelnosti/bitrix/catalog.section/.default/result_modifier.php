<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$forMap = [];
foreach ($arResult['ITEMS'] as $item) {
    $array = [];

    $cor = explode(',', $item['PROPERTIES']['ATTR_MAP']['VALUE']);
    $array['cor_x'] = $cor[0];
    $array['cor_y'] = $cor[1];
    $array['title'] = $item['NAME'];
    $array['address'] = $item['PROPERTIES']['ATTR_ADDRESS']['VALUE'];
    $array['url'] = $item['DETAIL_PAGE_URL'];

    $forMap[] = $array;
}
?>
<script>
    let snt_section_map = <?= CUtil::PhpToJSObject($forMap, false, true); ?>
</script>
