<?php
require_once 'components/Check.php';

$check = new Check();
$check->run();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Тестовое задание для МТТ</title>
</head>

<body>

<?php if ($check->isGuest) { ?>
    <h1>Добро пожаловать, гость!</h1>
    <a href="login.php">Вход</a> | <a href="register.php">Регистрация</a>
<?php } else { ?>
    <h2><?= ucfirst($check->username) ?>, вы успешно залогинины!</h2>
    <a href="logout.php">Выйти</a>
<?php } ?>

</body>
</html>