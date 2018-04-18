<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<?php
			$title = 'Third lesson';
			$h1 = 'lesson#3';
			$user = 'Alexander';
			$date = '17.04.2018';
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
		echo "<br>Task #1<br><br>";
		$n = 100;
		$i = 0;
		while ($i <= $n) {
			if (($i % 3) == 0) echo "$i, ";
		$i++;
		}
		echo "<br>=======================<br>Task #2<br><br>";
		$n = 10;
		$i = 0;
		do{
			if ($i != 0) {
				$res = (($i % 2) == 0) ? " Четное. ": "Не четное. ";
			}
			else $res = " Это ноль. ";
			echo "$i - $res";
			$i++;
		} while ($i <= $n);
		echo "<br>=======================<br>Task #3<br><br>";
		$arrayObl = array(
			"Иркутская область" => array(
		    	0 => "Иркутск",
				1 => "Ангарск",
				2 => "Братск",
				3 => "Железногорск-Илимский"
			),
			"Красноярская область" => array(
				0 => "Красноярск",
				1 => "Зеленогорск"
			),
			"Московская область" => array(
				0 => "Москва",
				1 => "Зеленоград",
				2 => "Клин"
			),
		);
		foreach($arrayObl as $obl=>$mas){
			echo "$obl: ";
			$total = count($mas);
			foreach($mas as $key=>$value){
				if ($key != $total-1) { echo "$value, ";} else { echo "$value. <br>"; }
        	};
    	};
        echo "<br>=======================<br>Task #4<br><br>";
        $arrayWord = array(
        	'а' => 'a',
        	'б' => 'b',
			'в' => 'v',
			'г' => 'g',
        	'д' => 'd',
			'е' => 'e',
			'ё' => 'yo',
        	'ж' => 'zh',
			'з' => 'z',
			'и' => 'i',
        	'й' => 'j',
			'к' => 'k',
			'л' => 'l',
        	'м' => 'm',
			'н' => 'n',
			'о' => 'o',
        	'п' => 'p',
			'р' => 'r',
			'с' => 's',
        	'т' => 't',
        	'у' => 'u',
        	'ф' => 'f',
        	'х' => 'x',
			'ц' => 'c',
			'ч' => 'ch',
        	'ш' => 'sh',
			'щ' => 'shh',
			'ъ' => "'",
        	'ы' => "y'",
			'ь' => "''",
			'э' => "e'",
        	'ю' => "yu",
			'я' => "ya",
			'.' => '.',
			',' => ',');
		function translit($s) {
			$s = (string) $s;
			$s = str_replace(array("\n", "\r"), " ", $s);
			$s = preg_replace("/\s+/", ' ', $s);
			$s = trim($s);
			$s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s);
			$s = strtr($s, $GLOBALS["arrayWord"]);
		  return $s;
		}
		echo "Привет. Написать функцию транслитерации строк.<br>";
		echo translit("Привет. Написать функцию транслитерации строк.");
		echo "<br>=======================<br>Task #5<br><br>";
		$str = "Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.";
		echo $str . "<br>";
		function replace($s) {
			$s = str_replace(" ", "_", $s);
			return $s;
		}
		echo replace($str);
		echo "<br>=======================<br>Task #6<br><br>";
		$arMenu = array(
			0 => array(
				"id" => 1,
				"link" => "/index.php",
				"name" => "Главная страница",
		    	"PARENT" => 0
		    	),
		    1 => array(
		    	"id" => 2,
				"link" => "/lesson1.php",
				"name" => "Урок 1 - Домашнее задание",
		    	"PARENT" => 0
		    	),
		    2 => array(
		    	"id" => 3,
				"link" => "/lesson2.php",
				"name" => "Урок 2 - Домашнее задание",
		    	"PARENT" => 0
		    	),
		    3 => array(
		    	"id" => 4,
				"link" => "/lesson3.php",
				"name" => "Урок 3 - Домашнее задание",
		    	"PARENT" => 0
		    	),
		    4 => array(
		    	"id" => 5,
		    	"link" => "/#",
		    	"name" => "Меню с подменю",
		    	"PARENT" => 0
		    	),
		    5 => array(
		    	"id" => 6,
		    	"link" => "/#",
		    	"name" => "item1",
		    	"PARENT" => 5
		    	),
		    6 => array(
		    	"id" => 7,
		    	"link" => "/#",
		    	"name" => "item2",
		    	"PARENT" => 5
		    	),
		);
	function printmenu($arMenu) {
		?> <ul class="menu"> <?
		foreach($arMenu as $idMenu => $menuitem){
			$submenu = "";
			if ($menuitem["PARENT"] == 0) {
				?> <li><a href=<? echo $menuitem['link']; ?> > <? echo $menuitem['name']; ?> </a> <?
				foreach ($arMenu as $subkey => $subvalue) {
					if($subvalue['PARENT'] == $menuitem['id']){
						$submenu .= "<li><a href=" . $subvalue['link'] . ">" . $subvalue['name'] . "</a></li>";
					}
					if ($submenu != "") { ?> <ul class="submenu"><? echo "$submenu"; ?> </ul> <? }
					?></li><?
				}
/*				foreach($menuitem as $key=>$value){
					if ($key == 'link') { ?> <li> <a href=<? echo "$value"; ?> > <? }
					if ($key == 'name') { echo "$value"; ?></a></li> <? }
        		};
*/
			}
    	};?></ul><?
    }
	    printmenu($arMenu);
	    echo "<br>=======================<br>Task #7*<br><br>";
	    function task7() {
	    	for ($i=0; $i < 10; print $i++) { 
	    	}
	    }
	    task7();

	    echo "<br>=======================<br>Task #8*<br><br>";
	    function task8() {
	    	foreach ($GLOBALS["arrayObl"] as $key => $value) {
			    echo "<ul><li>$key: </li><ul>";
			    foreach ($value as $item) {
			        if (mb_substr($item, 0, 1) == "К") 
			        	{ echo "<li>$item </li>"; }
			    }
			    echo "</ul></ul>";
			}
	    }
	    task8();
	    echo "<br>=======================<br>Task #9*<br><br>";
	    //###############option #2###########################
	    function task9($str) {
	    echo $str . '<br>';
	    for ($i = 0; $i < mb_strlen($str); $i++) {
	        $new_text = mb_substr($str, $i, 1);
	        if ($new_text != ' ') {
	            echo  $GLOBALS["arrayWord"][$new_text];
	        } else {
	            echo "_";
	        }
	    }
		}
	    task9("*Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).");
    	?>
	</body>
</html>