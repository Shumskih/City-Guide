<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="mfeedback">
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>

    <div class="mf-name">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="mf-text">
                    <?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <input type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>">
            </div>
        </div>
	</div>

    <div class="mf-email">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="mf-text">
                    <?=GetMessage("MFT_EMAIL")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <input type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>">
            </div>
        </div>
    </div>

    <div class="mf-message">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="mf-text">
                    <?=GetMessage("MFT_MESSAGE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <textarea name="MESSAGE" rows="5" cols="40"><?=$arResult["MESSAGE"]?></textarea>
            </div>
        </div>
    </div>

	<?if($arParams["USE_CAPTCHA"] == "Y"):?>
	<div class="mf-captcha">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?endif;?>

<?$APPLICATION->IncludeComponent(
	"bitrix:main.userconsent.request", 
	".default", 
	array(
		"ID" => "1",
		"IS_CHECKED" => "Y",
		"AUTO_SAVE" => "Y",
		"IS_LOADED" => "N",
		"REPLACE" => array(
			"button_caption" => "Отправить",
			"fields" => array(
				0 => "Email",
				1 => "Телефон",
				2 => "Имя",
			),
		),
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
<hr>
	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
	<input type="submit" class="mfeedback-button" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
</form>
</div>