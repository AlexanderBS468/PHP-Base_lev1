<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<?php
			$title = 'First lesson';
			$h1 = 'lesson#1';
			$user = 'Alexander';
		?>
		<title><?php echo "$title"; ?></title>
	</head>
	<body>
		<h1><? echo $h1; ?></h1>
		<p>Ваше имя: <? echo $user; ?></p>
		<p>Текущая дата: <? echo date('d m Y'); ?></p>
		<nav>
			<ul>
				<li><a href="/index.php">Ha main</a></li>
				<li><a href="/lesson1.php">Lesson1</a></li>
				<li><a href="/lesson2.php">Lesson2</a></li>
				<li><a href="/lesson3.php">Lesson3</a></li>
				<li><a href="/lesson4.php">Lesson4</a></li>
				<li><a href="/lesson5.php">Lesson5</a></li>
				<li><a href="/lesson6.php">Lesson6</a></li>
				<li><a href="/lesson7.php">Lesson7</a></li>
				<li><a href="/accordeon.php">!!!!!!!!!!Accordeon!!!!!!!!!!!!</a></li>
			</ul>			
		</nav>
	</body>
</html>