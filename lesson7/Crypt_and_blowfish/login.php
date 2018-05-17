<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

$isAuth = -1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = $db->queryOne('select id, password as hash
                        from users_crypt
                        where username=?', $username);

    $isAuth = 0;

    if ($data) {
        if(confirmPassword($data['hash'], $password)){
            $isAuth = 1;
            session_start();
            $_SESSION['sess_login'] = $username;
            $_SESSION['sess_pass'] = $data['hash'];
            header('Location: /lesson7/lk/index_crypt.php');
            exit;
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <meta name="robots" content="noindex,nofollow"/>
    <title>Авторизация пользователя | Демо хеширование пароля с помощью crypt</title>
</head>
<body>
<?php
switch ($isAuth) {
    case 1:
        echo '<div class="message">Авторизация прошла успешно</div>';
        break;
    case 0:
        echo '<div class="error">Неверный логин и(или) пароль</div>';
        break;
}
?>
<form action="" method="post">
    <label>Логин:</label>
    <input type="text" name="username"/><br/>

    <label>Пароль:</label>
    <input type="password" name="password"/><br/>

    <input type="submit" value="Авторизоваться"/><br/>
</form>
<p><a href="registration.php">Регистрация</a></p>
</body>
</html>
