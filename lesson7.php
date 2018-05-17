<!DOCTYPE html>
<html lang="ru">
	<head>
		<link rel="stylesheet" type="text/css" href="/style/css/style.css">
		<meta charset="UTF-8">
		<?php
			$title = 'lesson#7';
			$h1 = 'lesson#7';
			$user = 'Alexander';
			$date = '30.04.2018';
		?>
		<title><?php echo "$title"; ?></title>
	</head>
	<body>
		<h1><? echo $h1; ?></h1>
		<p>Ваше имя: <? echo $user; ?></p>
		<p>Текущая дата: <? echo date('d m Y'); ?></p>
		<p>Дата выполнения: <? echo $date; ?></p>
		<a href="/index.php">Ha main</a><br>
		<!-- CODE -->
		<h1>Хеширование пароля с помощью md5 и соли</h1>
    	<a href="/lesson7/md5/registration.php">Регистрация</a> | <a href="/lesson7/md5/login.php">Авторизация</a>
    	<h1>Хеширование пароля с помощью crypt</h1>
    	<a href="/lesson7/Crypt_and_blowfish/registration.php">Регистрация</a> | <a href="/lesson7/Crypt_and_blowfish/login.php">Авторизация</a>
		<div class="footer"></div>
	</body>
</html>