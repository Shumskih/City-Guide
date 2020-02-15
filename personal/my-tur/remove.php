<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Удаление собственного маршрута ");

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id']) && abs($_GET['id']) > 0) {
        $id = abs($_GET['id']);

        CModule::IncludeModule('IBLOCK');

        $arSelect = Array("ID", "NAME");
        $arFilter = Array(
            "IBLOCK_ID" => 4,
            "ACTIVE_DATE" => "Y",
            "ACTIVE" => "Y",
            "PROPERTY_ATTR_AUTHOR_ID" => $USER->GetID(),
            "ID" => $id
        );
        $res = CIBlockElement::GetList(Array("NAME" => "ASC"), $arFilter, false, false, $arSelect);
        if ($res->SelectedRowsCount() > 0) {
            if ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();

            }
        } else {
            $errors[] = 'Маршрут не существует или принадлежит другому пользователю!';
        }
    } else {
        $errors[] = 'Не передан идентификатор маршрута!';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && abs($_POST['id']) > 0) {
        $id = abs($_POST['id']);

        CModule::IncludeModule('IBLOCK');

        $arSelect = Array("ID", "NAME");
        $arFilter = Array(
            "IBLOCK_ID" => 4,
            "ACTIVE_DATE" => "Y",
            "ACTIVE" => "Y",
            "PROPERTY_ATTR_AUTHOR_ID" => $USER->GetID(),
            "ID" => $id
        );
        $res = CIBlockElement::GetList(Array("NAME" => "ASC"), $arFilter, false, false, $arSelect);
        if ($res->SelectedRowsCount() > 0) {
            if ($ob = $res->GetNextElement()) {
                $result = CIBlockElement::Delete($id);
            }
        } else {
            $errors[] = 'Маршрут не существует или принадлежит другому пользователю!';
        }
    } else {
        $errors[] = 'Не передан идентификатор маршрута!';
    }
}
?>

    <div class="row">
        <div class="col-12">

            <? if ($errors): ?>
                <div class="alert alert-danger" role="alert">
                    <? foreach ($errors as $err): ?>
                        <?= $err; ?>
                    <? endforeach; ?>
                </div>

                <a href="/personal">Вернуться в личный кабинет</a>
            <? else: ?>
                <? if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                    <? if ($result): ?>
                        <div class="alert alert-primary" role="alert">
                            Маршрут удалён.
                        </div>
                        <a href="/personal/">Вернуться в личный кабинет</a>
                    <? else: ?>
                        <div class="alert alert-danger" role="alert">
                            Произошла ошибка при удалении
                        </div>
                    <? endif; ?>
                <? else: ?>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $id; ?>">

                        <div class="alert alert-primary" role="alert">
                            Вы действительно хотите удалить свой маршрут <b><?= $arFields['NAME']; ?></b>? Восставить
                            его
                            будет
                            нельзя, только создать снова.
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Удалить</button>
                            <a href="/personal/" class="btn btn-secondary">Назад</a>
                        </div>
                    </form>
                <? endif; ?>
            <? endif; ?>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>