<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = hashPassword($password);
    $fio = $_POST['fio'];
    $birthday = $_POST['birthday'];
    $info = $_POST['info'];

    $db->exec('insert into users_crypt(username, password, fio, birthday, info)
    values (?,?,?,?,?)', $username, $password, $fio, $birthday, $info);

    $success = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <meta name="robots" content="noindex,nofollow"/>
    <title>Регистрация пользователя
        | Демо хеширование пароля с помощью crypt</title>
</head>
<body>
<?php if ($success) : ?>
    <div class="message">Регистрация прошла успешно</div>
<?php endif ?>
<form action="" method="post">
    <label>Логин:</label>
    <input type="text" name="username"/><br/>

    <label>Пароль:</label>
    <input type="password" name="password"/><br/>

    <label>ФИО:</label>
    <input type="fio" name="fio"/><br/>

    <label>День рождения:</label>
    <input type="birthday" name="birthday"/><br/>

    <label>О себе:</label>
    <input type="info" name="info"/><br/>


    <input type="submit" value="Загегистрироваться"/><br/>
</form>
<p><a href="login.php">Авторизация</a></p>
</body>
</html>