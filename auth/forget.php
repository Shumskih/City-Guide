<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Восстановление пароля");
?>
<? $APPLICATION->IncludeComponent(
	"bitrix:system.auth.forgotpasswd",
	"",
	array(
		"COMPONENT_TEMPLATE" => "myforgot"
	),
	false
); ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>