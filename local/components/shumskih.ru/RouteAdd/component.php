<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CModule::IncludeModule('IBLOCK');

$iBlockId = $arParams['IBLOCK_ID'];

$places = [];

$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID" => IntVal(3), "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array("NAME" => "ASC"), $arFilter, false, false, $arSelect);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();

    $places[$arFields['ID']] = array(
        "NAME" => $arFields['NAME'],
        "MAP" => explode(',', $arProps["ATTR_MAP"]["VALUE"]),
        "ADDRESS" => $arProps["ATTR_ADDRESS"],
    );
}

$arResult["PLACES"] = $places;
unset($places);

$errors = [];
$result = [];
$pointsCurrent = 65;
$sntRoute = [];

$arResult['ACTION'] = 'create';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id']) && (abs($_GET['id']) > 0)) {
        $id = abs($_GET['id']);

        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_*");
        $arFilter = Array(
            "IBLOCK_ID" => $iBlockId,
            "ACTIVE_DATE" => "Y",
            "ACTIVE" => "Y",
            "PROPERTY_ATTR_AUTHOR_ID" => $USER->GetID(),
            "ID" => $id
        );
        $res = CIBlockElement::GetList(Array("NAME" => "ASC"), $arFilter, false, false, $arSelect);
        if ($res->SelectedRowsCount() > 0) {
            if ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();
                $arProps = $ob->GetProperties();

                $arResult['ID'] = $arFields['ID'];
                $arResult['CURRENT_ROUTE']['NAME'] = $arFields['NAME'];

                foreach ($arProps['ATTR_POINTS']['VALUE'] as $value) {
                    $arResult['CURRENT_ROUTE']['POINTS'][] = array('ID' => $value, 'CHR' => $pointsCurrent++);


                    $sntRoute[] = array(
                        $arResult['PLACES'][$value]['MAP'][0],
                        $arResult['PLACES'][$value]['MAP'][1],
                    );
                }

                $arResult['ACTION'] = 'update';
            }
        } else {
            $errors[] = "Данный маршрут не существует или принадлежит другому пользователю";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['place'])) {
        $userId = $USER->GetID();
        $name = htmlentities(strip_tags(trim($_POST['placeName'])));
        $code = $name;
        $arP[] = array('replace_space' => '-', 'replace_other' => '-');
        $code = CUtil::translit($code, 'ru', $arP);

        $el = new CIBlockElement();

        $PROP = array();
        $PROP[7] = $userId;
        $PROP[8] = $_POST['place'];

        $arLoadProductArray = Array(
            "DATE_ACTIVE_FROM" => date('d.m.Y H:i:s'),
            "MODIFIED_BY" => $USER->GetID(),
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID" => $iBlockId,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => $name,
            "ACTIVE" => "Y",
            "CODE" => $code
        );

        if ($_POST['action'] == 'create') {
            if ($PRODUCT_ID = $el->Add($arLoadProductArray))
                $result[] = "Ваш маршрут сохранён: (" . $PRODUCT_ID . ")";
            else
                $errors[] = $el->LAST_ERROR;
        }

        if ($_POST['action'] == 'update') {
            $id = abs($_POST['id']);
            $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_*");
            $arFilter = Array(
                "IBLOCK_ID" => $iBlockId,
                "ACTIVE_DATE" => "Y",
                "ACTIVE" => "Y",
                "PROPERTY_ATTR_AUTHOR_ID" => $USER->GetID(),
                "ID" => $id
            );
            $res = CIBlockElement::GetList(Array("NAME" => "ASC"), $arFilter, false, false, $arSelect);
            if ($res->SelectedRowsCount() > 0) {
                if ($res = $el->Update($id, $arLoadProductArray))
                    $result[] = "Ваш маршрут обновлён: (" . $PRODUCT_ID . ")";
                else
                    $errors[] = $el->LAST_ERROR;
            } else {
                $errors[] = "Данный маршрут не существует или принадлежит другому пользователю";
            }
        }
    }
}

$arResult['RESULT'] = $result;
$arResult['ERROR'] = $errors;
?>

    <script>
        let snt_route = <?= CUtil::PhpToJSObject($sntRoute, false, true); ?>;
        let places = <?= CUtil::PhpToJSObject($arResult['PLACES'], false, true); ?>;

        let points_current = <?= $pointsCurrent; ?>;
        let select_count = <?= count($sntRoute); ?>;
    </script>

<?php

$this->IncludeComponentTemplate();



