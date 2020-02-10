<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <?
    $APPLICATION->ShowHead();

    \Bitrix\Main\Page\Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
    \Bitrix\Main\Page\Asset::getInstance()->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge" />');

    \Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-3.3.1.min.js");

    //\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/bootstrap3.min.css");
    //\Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/bootstrap3.min.js");

    \Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap4.min.css");
    \Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/bootstrap4.min.js");

    //\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/font-awesome4.7.min.css");
    \Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/font-awesome5.2.min.css");


    \Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/jquery.fancybox3.min.css");
    \Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.fancybox3.min.js");

    //\Bitrix\Main\Page\Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/owl.carousel.css");
    //\Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/owl.carousel.js");
    \Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/fixed-menu.js");
    \Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.spincrement.min.js");
    \Bitrix\Main\Page\Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/counts.js");

    ?>


</head>
<body>

<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>

<header class="wrapper-header">
    <div class="wrapper-menu">
        <div class="container">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="/">
                        <span id="gid">#Гид</span>ПоГороду
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <? $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "top_menu"
	),
	false
); ?>

                        <div class="box-login">
                            <div class="user-menu">
                                <?
                                global $USER;
                                if ($USER->IsAuthorized()) {
                                    $rsUser = CUser::getByID($USER->GetID());
                                    $rsUser = $rsUser->Fetch();
                                    ?>
                                    <div class="title">
                                        <a>
                                            <i class="fas fa-user"></i><?= $rsUser['LAST_NAME'] . ' ' . $rsUser['NAME']; ?>
                                        </a>
                                    </div>
                                    <ul>
                                        <li>
                                            <a title="Профиль" href="/personal/">
                                                <i class="fas fa-user"></i> Профиль
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Выход" href="/auth/logout.php">
                                                <i class="fas fa-sign-out-alt"></i> Выход
                                            </a>
                                        </li>
                                    </ul>
                                <? } else { ?>
                                    <div class="title">
                                        <a href="/auth/">
                                            <i class="fas fa-user"></i>Авторизоваться
                                        </a>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="wrapper-logo">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="logo">
                        <span class="title">
                            #<span class="gid">Гид</span> по городу
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper-blocks">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="box-block">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="box-text">
                            <p class="title">Достопримечательности</p>
                            <p class="text">Мы собрали информация о памятниках архитектуры города в одном месте для
                                вашего удобства</p>
                        </div>
                    </div>
                    <div class="box-block">
                        <i class="fas fa-volume-up"></i>
                        <div class="box-text">
                            <p class="title">Аудиогид</p>
                            <p class="text">Вы сами можете посетить любой памятник в удобне для вас время, а наш
                                аудиогид всё расскажет</p>
                        </div>
                    </div>
                    <div class="box-block">
                        <i class="fas fa-car-alt"></i>
                        <div class="box-text">
                            <p class="title">Свой маршрут</p>
                            <p class="text">Вы можете создать свой маршрут путешествия и сохранить его в личном кабинете
                                на сайте.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<? if ($APPLICATION->GetCurPage(false) === '/'): ?>
    <section class="wrapper-about-rayon">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3><span class="gid">Воскресенский</span> район</h3>
                </div>
                <div class="col-12 col-md-6">
                    <p class="text-indent">
                        Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от
                        всех
                        живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль
                        журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая
                        страна,
                        в которой жаренные члены предложения залетают прямо в рот. Даже всемогущая пунктуация не имеет
                        власти над рыбными текстами, ведущими безорфографичный образ жизни.
                    </p>
                    <p class="text-indent">
                        Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир
                        грамматики. Великий Оксмокс
                        предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не
                        дал
                        сбить себя с толку. Он собрал семь своих заглавных букв, подпоясал инициал за пояс и пустился в
                        дорогу. Взобравшись на первую вершину курсивных гор, бросил он последний взгляд назад, на силуэт
                        своего родного города Буквоград, на заголовок деревни Алфавит и на подзаголовок своего переулка
                        Строчка. Грустный риторический вопрос скатился по его щеке и он продолжил свой путь. По дороге
                        встретил текст рукопись.
                    </p>
                    <p class="text-indent">
                        Она предупредила его: «В моей стране все переписывается по несколько раз. Единственное, что от
                        меня осталось, это приставка «и». Возвращайся ты лучше в свою безопасную
                        страну». Не послушавшись рукописи, наш текст продолжил свой путь. Вскоре ему повстречался
                        коварный
                        составитель
                    </p>

                    <a href="/istoriya" class="btn btn-history">История района</a>
                </div>
                <div class="col-12 col-md-6">
                    <img src="/local/templates/city-guide/images/rayon.jpg" alt="История Воскресенского района"
                         class="img-fluid">
                </div>
            </div>
        </div>
    </section>
<? endif; ?>

<section class="wrapper-content">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <? if ($APPLICATION->GetCurPage(false) !== '/'): ?>
                    <div class="box-breadcrumbs">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:breadcrumb",
                            "my_breadcrumbs",
                            array(
                                "PATH" => "",
                                "SITE_ID" => "s1",
                                "START_FROM" => "0",
                                "COMPONENT_TEMPLATE" => ""
                            ),
                            false
                        );
                        ?>
                    </div>

                    <div class="box-title">
                        <h3><? $APPLICATION->ShowTitle() ?></h3>
                    </div>


                <? endif; ?>

                <div class="content">






