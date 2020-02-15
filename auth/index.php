<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>

<? $APPLICATION->IncludeComponent(
    "bitrix:system.auth.changepasswd",
    "",
    Array(
        "COMPONENT_TEMPLATE" => ""
    ),
    false
); ?>

<? $APPLICATION->IncludeComponent(
    "bitrix:system.auth.confirmation",
    "",
    Array(
        "CONFIRM_CODE" => "confirm_code",
        "LOGIN" => "login",
        "USER_ID" => "confirm_user_id"
    )
); ?>

<? if ($_GET['change_password'] !== 'yes'): ?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:system.auth.form",
        "",
        Array(
            "FORGOT_PASSWORD_URL" => "/auth/forget.php",
            "REGISTER_URL" => "/auth/registration.php",
            "SUCCESS_URL" => "",
            "PROFILE_URL" => "/personal/",
            "COMPONENT_TEMPLATE" => ".default"
        ),
        false
    ); ?>
<? endif; ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>