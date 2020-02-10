<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);

?>


<div class="forgot_password">

    <?//my_dump($_POST);?>

    <?if ($_POST['CLOSE'] == 'Y'):?>
        <h4>Запрос на смену пароля направлен</h4>

    <?else:?>

<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<input type="hidden" name="CLOSE" value="Y">
	<p>
	<?=GetMessage("AUTH_FORGOT_PASSWORD_1")?>
	</p>

    <h4><?=GetMessage("AUTH_GET_CHECK_STRING")?></h4>

    <div class="form-group row">
        <label class="col-sm-4 col-md-2"><?=GetMessage("AUTH_LOGIN")?></label>
        <div class="col-sm-8  col-md-10">
            <input class="form-control" type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" />&nbsp;
        </div>
    </div>

    <?=GetMessage("AUTH_OR")?>
    <div class="form-group row">
        <label class="col-sm-4 col-md-2"><?=GetMessage("AUTH_EMAIL")?></label>
        <div class="col-sm-8 col-md-10">
            <input class="form-control" type="text" name="USER_EMAIL" maxlength="255" />
        </div>
    </div>

	<?if($arResult["USE_CAPTCHA"]):?>
        <div class="form-group row">
            <div class="col-sm-12">
                <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-md-2"><?echo GetMessage("system_auth_captcha")?></label>
            <div class="col-sm-8 col-md-10">
                <input class="form-control" type="text" name="captcha_word" maxlength="50" value="" />
            </div>
        </div>
	<?endif?>

    <div class="form-group row">
        <div class="col-sm-12">
            <input  class="btn btn-default buttonLogin" type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
        </div>
    </div>



</form>



<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>

    <?endif;?>

</div>

