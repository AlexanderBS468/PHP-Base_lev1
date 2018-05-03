<!DOCTYPE html>
<html lang="ru">
	<head>
		<link rel="stylesheet" type="text/css" href="/style/css/style.css">
		<meta charset="UTF-8">
		<?php
			$title = 'lesson#6';
			$h1 = 'lesson#6';
			$user = 'Alexander';
			$date = '28.04.2018';
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
		<?

		?>
		<form action="/result.php">
		    <input type="text" name="x1" id="x1">
		        <select name="operation" id="operation">
		            <option value="+">+</option>
		            <option value="-">-</option>
		            <option value="*">*</option>
		            <option value="/">/</option>
		        </select>
		    <input type="text" name="x2" id="x2">
		    <input type="submit" value="Посчитать">
		</form>
		<div class="footer"></div>
	</body>
</html>