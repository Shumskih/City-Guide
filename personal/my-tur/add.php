<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Добавление собственного маршрута"); ?><?$APPLICATION->IncludeComponent(
	"shumskih.ru:RouteAdd",
	"",
	Array(
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "services"
	)
);?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>