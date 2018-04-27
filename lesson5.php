<!DOCTYPE html>
<html lang="ru">
	<head>
		<link rel="stylesheet" type="text/css" href="/style/css/style.css">
		<meta charset="UTF-8">
		<?php
			$title = 'lesson#5';
			$h1 = 'lesson#5';
			$user = 'Alexander';
			$date = '20.04.2018';
		?>
		<title><?php echo "$title"; ?></title>
	</head>
	<body>
		<?php require_once 'page_nav.php'; ?>
		<h1><? echo $h1; ?></h1>
		<p>Ваше имя: <? echo $user; ?></p>
		<p>Текущая дата: <? echo date('d m Y'); ?></p>
		<p>Дата выполнения: <? echo $date; ?></p>
		<a href="/index.php">Ha main</a><br>
		<!-- CODE -->
		<?
		$nf = 0;
		$dir = './image/thumbs/';
		$dirB = './image/';
		$handle = opendir($dir);
		$fsize[] = null;
		while (false !== ($file = readdir($handle))) {
			$path_info = pathinfo($file);
			$GLOBALS["ftype"] = $path_info[extension];
			$fsize[$nf] = filesize($dir . $file);
			if (($file != "..") and ($file != ".") and ($ftype == "jpg")) {
				$pic[$nf] = $file;
				$nf++;
			}
		}
		$maxpicpage = 2;
		$begin = 0;
		$end = count($pic)-1;
		?>
		<div class="text_intro">
			<p style="font-size: 18px;">Картинная галерея.</p>
			<p>Вывод фалов с расширением jpeg</p>
		</div>
		
		<?php 
			if (isset($_FILES['file'])) {
				upload_file($_FILES['file']);
			}
		 ?>

		<div class="galery"><?
		$beginpage = $begin;
		for ($j = $begin; $j <= ($end / $maxpicpage); $j++) {
			for ($i = $beginpage; $i <= $maxpicpage; $i++) {
				$photoBig = $dirB . mb_substr($pic[$i], 6);
				$photo = $dir . $pic[$i];
				?><div class="element">
				<a href=<? echo $photoBig ?> title="Увеличить" target="_blank">
				<img src=<? echo $photo ?> alt="увеличить">
				</a>
				<p>Название файла: <? echo $pic[$i] ?>. Размер файла: <? echo "$fsize[$i]"; ?> байт</p>
				</div><? 
			}
			if ($beginpage < $end) { $beginpage += ($maxpicpage + 1); }
			var_dump($beginpage);
			echo '= ' . $beginpage . "<br>";
			var_dump($j);
			echo '= ' . $j . "<br>";

			// $beginpage += $end;
		}
		?></div>
		<form enctype="multipart/form-data" action="upload.php" method="POST">
		    <?/*<input type="hidden" name="MAX_FILE_SIZE" value=<? echo($maxsize); ?> />*/?>
		    Отправить этот файл: <input name="userfile" type="file" />
		    <input type="submit" value="Отправить" />
		</form>
		<div class="footer"></div>
	</body>
</html>