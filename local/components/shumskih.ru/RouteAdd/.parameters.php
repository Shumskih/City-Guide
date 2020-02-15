<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

if (!CModule::IncludeModule("iblock"))
    return;

$arTypesEx = CIBlockParameters::GetIBlockTypes(array("-" => " "));

$arIBlocks = [];
$dbIblock = CIBlock::GetList(
    array("SORT" => "ASC"),
    array("SITE_ID" => $_REQUEST["site"],
        "TYPE" => ($arCurrentValues["IBLOCK_TYPE"] != "-" ? $arCurrentValues["IBLOCK_TYPE"] : "")
    )
);

while ($arRes = $dbIblock->Fetch()) $arIBlocks[$arRes["ID"]] = "[" . $arRes["ID"] . "] " . $arRes["NAME"];

//формирование массива параметров
$arComponentParameters = array(
    "GROUPS" => [],
    "PARAMETERS" => [
        "IBLOCK_TYPE" => array(
            "PARENT" =>"BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_LIST_TYPE"),
            "TYPE" => "LIST",
            "VALUES" => $arTypesEx,
            "DEFAULT" => "news",
            "REFRESH" => "Y",
        ),
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_LIST_ID"),
            "TYPE" =>"LIST",
            "VALUES" => $arIBlocks,
            "DEFAULT" => '={$_REQUEST["ID"]}',
            "ADDITIONAL_VALUES" => "Y",
            "REFRESH" => "Y",
        ),
        "CACHE_TIME" => array("DEFAULT" => 36000000),
        "CACHE_FILTER" => array(
            "PARENT" => "CACHE_SETTINGS",
            "NAME" => GetMessage("IBLOCK_CACHE_FILTER"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N"
        ),
        "CACHE_GROUPS" => array(
            "PARENT" => "CACHE_SETTINGS",
            "NAME" => GetMessage("CP_BNL_CACHE_GROUPS"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y"
        ),
    ],
);