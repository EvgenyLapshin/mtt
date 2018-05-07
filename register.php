<?php
require_once 'components/RegisterForm.php';

$form = new RegisterForm();
$form->setProperties($_POST);
$form->run();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Форма регистрации</title>
</head>

<body>

<h1>Регистрация</h1>
<form method="POST">
    <input name="login" type="text" required placeholder="Логин" value="<?= $form->login ?>"><br><br>
    <input name="password" type="password" required placeholder="Пароль" value="<?= $form->password ?>"><br><br>
    <input name="submit" type="submit" value="Зарегистрироваться">
</form>

</body>
</html>