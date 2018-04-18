<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<?php
			$title = 'First lesson';
			$h1 = 'lesson#1';
			$user = 'Alexander';
			$date = '10.04.2018';
		?>
		<title><?php echo "$title"; ?></title>
	</head>
	<body>
		<h1><? echo $h1; ?></h1>
		<p>Ваше имя: <? echo $user; ?></p>
		<p>Текущая дата: <? echo date('d m Y'); ?></p>
		<p>Дата выполнения: <? echo $date; ?></p>
		<a href="/index.php">Ha main</a><br>
		<?php
			$a = 5;
			$b = '5';
			var_dump($a == $b); 
			echo 'Потому что сравнивались значения переменной. Так как язык РНР с динамической типизацией, переменные привелись к одному типу <br>';
			var_dump((int)'012345'); 
			echo 'Тип перевелся из String в int <br>';
			var_dump((float)123.0 === (int)123.0); 
			echo 'Происходит сравнение по значению и типу<br>';
			var_dump((int)0 === (int)'hello, world');
			echo 'Происходит сравнение целочисленно типа = 0 и текс перводим в целочисленное получается = 0<br>';
		?>
		<?
			$a = 12;
			$b = 21;
			$a = $a + $b;
			$b = $a - $b;
			$a = $a - $b;
			echo 'a = ' . $a . '<br>';
			echo 'b = ' . $b;
		?>
	</body>
</html>