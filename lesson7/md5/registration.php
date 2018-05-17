<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $salt = generateSalt();
    $password = hashPassword($salt, $password);
    $fio = $_POST['fio'];
    $birthday = $_POST['birthday'];
    $info = $_POST['info'];

    $db->exec('insert into users_md5_salt (username, password, salt, fio, birthday, info)
    values (?,?,?,?,?,?)', $username, $password, $salt, $fio, $birthday, $info);

    $success = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/../../style/css/style.css">
    <meta name="robots" content="noindex,nofollow"/>
    <title>Регистрация пользователя | Демо хеширование пароля с помощью md5 и соли</title>
</head>
<body>
<?php if ($success) : ?>
    <div class="message">Регистрация прошла успешно</div>
<?php endif ?>
<form class="forma" action="" method="post">
<ul>
    <li><h1>Решистрация</h1></li>
    <li>
        <label>Логин:</label>
        <input type="text" name="username"/>
    </li>
    <li>
        <label>Пароль:</label>
        <input type="password" name="password"/>
    </li>
    <li>
        <label>ФИО:</label>
        <input type="fio" name="fio"/>
    </li>
    <li>
        <label>День рождения:</label>
        <input type="birthday" name="birthday"/>
    </li>
    <li>
        <label>О себе:</label>
        <input type="info" name="info"/>
    </li>
    <li>
        <button class="button" type="submit" />Загегистрироваться</button>
    </li>
</ul>
</form>
<p><a href="login.php">Авторизация</a></p>
</body>
</html>