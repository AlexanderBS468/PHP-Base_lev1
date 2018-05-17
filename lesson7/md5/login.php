<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

$isAuth = -1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = $db->queryOne('select id, password as hash, salt
                        from users_md5_salt
                        where username=?', $username);

    $isAuth = 0;

    if ($data) {
        if(confirmPassword($data['hash'], $data['salt'], $password)){
            $isAuth = 1;
           
            session_start();
            $_SESSION['sess_login'] = $username;
            $_SESSION['sess_pass'] = $data['hash'];
            header('Location: /lesson7/lk/index.php');
            exit;
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/../../style/css/style.css">
    <meta name="robots" content="noindex,nofollow"/>
    <title>Авторизация пользователя | Демо хеширование пароля с помощью md5 и соли</title>
</head>
<body>
<?php
switch ($isAuth) {
    case 1:
        echo '<div class="message">Авторизация прошла успешно, через 5 сек, перейдете в личный кабинет</div>';
        break;
    case 0:
        echo '<div class="error">Неверный логин и(или) пароль</div>';
        break;
}
?>

<form class="forma" action="" method="post">
<ul>
    <li><h1>Авторизация</h1></li>
    <li>
        <label>Логин:</label>
        <input type="text" name="username"/>
    </li>
    <li>
        <label>Пароль:</label>
        <input type="password" name="password"/>
    </li>
    <li>
        <button class="button" type="submit" />Авторизоваться</button>
    </li>
</ul>
</form>

<p><a href="registration.php">Регистрация</a></p>
</body>
</html>