<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init();
?>

<div class="my-auth-form">

    <?
    if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
        ShowMessage($arResult['ERROR_MESSAGE']);
    ?>

    <? if ($arResult["FORM_TYPE"] == "login"): ?>

        <form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top"
              action="<?= $arResult["AUTH_URL"] ?>">
            <? if ($arResult["BACKURL"] <> ''): ?>
                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
            <?endif ?>
            <? foreach ($arResult["POST"] as $key => $value): ?>
                <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
            <?endforeach ?>
            <input type="hidden" name="AUTH_FORM" value="Y"/>
            <input type="hidden" name="TYPE" value="AUTH"/>

            <div class="form-group row">
                <label class="col-sm-4 col-md-2"><?= GetMessage("AUTH_LOGIN") ?></label>
                <div class="col-sm-8  col-md-10">
                    <input class="form-control" type="text" name="USER_LOGIN" maxlength="50" value="" size="17"/>
                    <script>
                        BX.ready(function () {
                            var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
                            if (loginCookie) {
                                var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
                                var loginInput = form.elements["USER_LOGIN"];
                                loginInput.value = loginCookie;
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-md-2"><?= GetMessage("AUTH_PASSWORD") ?></label>
                <div class="col-sm-8  col-md-10">
                    <input class="form-control" type="password" name="USER_PASSWORD" maxlength="50" size="17"
                           autocomplete="off"/>
                    <? if ($arResult["SECURE_AUTH"]): ?>
                        <span class="bx-auth-secure" id="bx_auth_secure<?= $arResult["RND"] ?>"
                              title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
                        <noscript>
				<span class="bx-auth-secure" title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
                        </noscript>
                        <script type="text/javascript">
                            document.getElementById('bx_auth_secure<?=$arResult["RND"]?>').style.display = 'inline-block';
                        </script>
                    <?endif ?>
                </div>
            </div>

            <? if ($arResult["STORE_PASSWORD"] == "Y"): ?>
                <div class="form-group row">
                    <label class="col-sm-4 col-md-2"><? echo GetMessage("AUTH_REMEMBER_SHORT") ?></label>
                    <div class="col-sm-1  col-md-1">
                        <input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y"/>
                    </div>
                </div>
            <?endif ?>

            <? if ($arResult["CAPTCHA_CODE"]): ?>
                <div class="form-group row">
                    <label class="col-sm-4 col-md-2"><? echo GetMessage("AUTH_CAPTCHA_PROMT") ?></label>
                    <div class="col-sm-8  col-md-10">
                        <input type="hidden" name="captcha_sid" value="<? echo $arResult["CAPTCHA_CODE"] ?>"/>
                        <img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
                             width="180" height="40" alt="CAPTCHA"/><br/><br/>
                        <input class="form-control" type="text" name="captcha_word" maxlength="50" value=""/></td>
                    </div>
                </div>
            <?endif; ?>

            <div class="form-group row">
                <div class="col-sm-12">
                    <input class="btn btn-default buttonLogin" type="submit" name="Login"
                           value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>"/>
                </div>
            </div>


            <? if ($arResult["NEW_USER_REGISTRATION"] == "Y"): ?>
            <table>
                <tr>
                    <td colspan="2">
                        <noindex><a href="<?= $arResult["AUTH_REGISTER_URL"] ?>"
                                    rel="nofollow"><?= GetMessage("AUTH_REGISTER") ?></a></noindex>
                        <br/></td>
                </tr>
                <?endif ?>

                <tr>
                    <td colspan="2">
                        <noindex><a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>"
                                    rel="nofollow"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a></noindex>
                    </td>
                </tr>
                <? if ($arResult["AUTH_SERVICES"]): ?>
                <tr>
                    <td colspan="2">
                        <div class="bx-auth-lbl"><?= GetMessage("socserv_as_user_form") ?></div>
                        <?
                        $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "icons",
                            array(
                                "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
                                "SUFFIX" => "form",
                            ),
                            $component,
                            array("HIDE_ICONS" => "Y")
                        );
                        ?>
                    </td>
                </tr>
            </table>
        <?endif ?>

        </form>

        <? if ($arResult["AUTH_SERVICES"]): ?>
            <?
            $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
                array(
                    "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
                    "AUTH_URL" => $arResult["AUTH_URL"],
                    "POST" => $arResult["POST"],
                    "POPUP" => "Y",
                    "SUFFIX" => "form",
                ),
                $component,
                array("HIDE_ICONS" => "Y")
            );
            ?>
        <?endif ?>

    <?
    else:
        ?>

        <? header('Location: /personal/'); ?>
        <form action="<?= $arResult["AUTH_URL"] ?>">
            <table width="95%">
                <tr>
                    <td align="center">
                        <?= $arResult["USER_NAME"] ?><br/>
                        [<?= $arResult["USER_LOGIN"] ?>]<br/>
                        <a href="<?= $arResult["PROFILE_URL"] ?>"
                           title="<?= GetMessage("AUTH_PROFILE") ?>"><?= GetMessage("AUTH_PROFILE") ?></a><br/>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <? foreach ($arResult["GET"] as $key => $value):?>
                            <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
                        <? endforeach ?>
                        <input type="hidden" name="logout" value="yes"/>
                        <input type="submit" name="logout_butt" value="<?= GetMessage("AUTH_LOGOUT_BUTTON") ?>"/>
                    </td>
                </tr>
            </table>
        </form>
    <? endif ?>
</div>
