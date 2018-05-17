<?
    require_once __DIR__ . '/../Crypt_and_blowfish/db.php'; 
    require_once __DIR__ . '/../Crypt_and_blowfish/functions.php';
    session_start();
    if (isset($_SESSION['sess_login']) && isset($_SESSION['sess_pass'])) {
        $data = $db->queryAll('select * from users_crypt where username=?', $_SESSION['sess_login']);
        if ($_SESSION['sess_login'] === $data['0']['username'] && $_SESSION['sess_pass'] === $data['0']['password']) {
            echo "Информация для прошедших аутентификацию<br><br>\n";
            echo '<a href="exit.php">Выйти из системы</a><br>';
            }
        else {
            header('Location: /../../lesson7.php');
            exit;
        }
        }
    else {
        header('Location: /../../lesson7.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <meta name="robots" content="noindex,nofollow"/>
    <title>Личный кабинет</title>
</head>
<body>
    <h1>Личный кабинет</h1>
    <table border="1" width="20%" cellpadding="10">
        <caption>Личная информация</caption>
        <tr>
            <td>ФИО</td>
            <td><? echo $data['0']['fio'] ?></td>
        </tr>
        <tr>
            <td>Дата рождения</td>
            <td><? echo $data['0']['birthday'] ?></td>
        </tr>
        <tr>
            <td>О себе</td>
            <td><? echo $data['0']['info'] ?></td>
        </tr>
    </table>
</body>
</html>
