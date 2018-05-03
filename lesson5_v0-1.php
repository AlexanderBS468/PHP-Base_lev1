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
		<h1><? echo $h1; ?></h1>
		<p>Ваше имя: <? echo $user; ?></p>
		<p>Текущая дата: <? echo date('d m Y'); ?></p>
		<p>Дата выполнения: <? echo $date; ?></p>
		<a href="/index.php">Ha main</a><br>
		<!-- CODE -->
		<?
		Require('page_elem.php');
		$nf = 0;
		$dir = './image/thumbs/';
		$dirB = './image/';
		$handle = opendir($dir);
		$fsize[] = NULL;
		$pic[] = NULL;
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
		$beginPic = 0;
		$endPic = count($pic)-1;

		$style_name = 'main_nav';
		$begin = 1;

		?>
		<div class="text_intro">
			<p style="font-size: 18px;">Картинная галерея.</p>
			<p>Вывод фалов с расширением jpeg</p>
		</div>

		<?
		if(isset($_GET['page'])){
			$pageon = $_GET['page'];
			navig_page($beginpage, $maxpicpage, $begin, $endPic, $style_name, $navig, $pageon);
		} else { $pageon = 1; navig_page($beginpage, $maxpicpage, $begin, $endPic, $style_name, $navig, $pageon); }
		?>

		<div class="galery"><?


	
		if(isset($_GET['page'])){
			$pageon = $_GET['page'];
			elments_page($pageon, $maxpicpage, $pic, $dir, $dirB, $endPic, $fsize);
		} else { $pageon = 0; elments_page($pageon, $maxpicpage, $pic, $dir, $dirB, $endPic, $fsize);}

		

		?></div>
		<?
		if(isset($_GET['page'])){
			$pageon = $_GET['page'];
			navig_page($beginpage, $maxpicpage, $begin, $endPic, $style_name, $navig, $pageon);
		} else { $pageon = 1; navig_page($beginpage, $maxpicpage, $begin, $endPic, $style_name, $navig, $pageon); }
		?>
		<form enctype="multipart/form-data" action="upload.php" method="POST">
		    <?/*<input type="hidden" name="MAX_FILE_SIZE" value=<? echo($maxsize); ?> />*/?>
		    Отправить этот файл: <input name="userfile" type="file" />
		    <input type="submit" value="Отправить" />
		</form>
		<div class="footer"></div>
	</body>
</html>