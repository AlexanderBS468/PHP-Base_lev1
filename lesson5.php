<!DOCTYPE html>
<html lang="ru">
	<head>
		<link rel="stylesheet" type="text/css" href="/style/css/style.css">
		<meta charset="UTF-8">
		<?php
			$title = 'lesson#4';
			$h1 = 'lesson#4';
			$user = 'Alexander';
			$date = '18.04.2018';
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

	</body>
</html>