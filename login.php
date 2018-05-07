<?php
require_once 'components/LoginForm.php';

$form = new LoginForm();
$form->setProperties($_POST);
$form->run();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Форма входа</title>
</head>

<body>

<h1>Вход</h1>
<form method="POST">
    <input name="login" type="text" required placeholder="Логин"><br><br>
    <input name="password" type="password" required placeholder="Пароль"><br><br>
    <input name="submit" type="submit" value="Войти">
</form>

</body>
</html>