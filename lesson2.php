<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<?php
			$title = 'Second lesson';
			$h1 = 'lesson#2';
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
		<!-- CODE -->
		<?
			echo "<br>Task #1<br><br>";
			$a = (int)'5';
			$b = (int)'10';
			if (($a > 0) and ($b > 0)) echo "Разность $a - $b = " . ($a - $b);
				else if (($a < 0) and ($b < 0)) echo "Произведение $a * $b = " . ($a * $b);
					else if ((($a >= 0) and ($b < 0))or(($a < 0) and ($b >= 0))) echo "Сумма $a + $b = ". ($a + $b);
			echo "<br>=======================<br>Task #2<br><br>";
			$a = 10;
			switch ($a) {
				case '0':	echo "0 ";
				case '1':	echo "1 ";
				case '2':	echo "2 ";
				case '3':	echo "3 ";
				case '4':	echo "4 ";
				case '5':	echo "5 ";
				case '6':	echo "6 ";
				case '7':	echo "7 ";
				case '8':	echo "8 ";
				case '9':	echo "9 ";
				case '10':	echo "10 ";
				case '11':	echo "11 ";
				case '12':	echo "12 ";
				case '13':	echo "13 ";
				case '14':	echo "14 ";
				case '15':	echo "15 ";
					break;
				default:
				echo "please nubmer into 0..15";
					break;
			}

			echo "<br>=======================<br>Task #3 and #4<br><br>";
			function calc($a, $b, $ar){
				switch ($ar) {
					case '+':
						return $a + $b;
						break;
					case '-':
						return $a - $b;
						break;
					case '*':
						return $a * $b;
						break;
					case '/':
						return $a / $b;
						break;
					default:
						echo "Error";
						break;
				}
			}
			$a = 10;
			$b = 5;
			echo "$a + $b = " . calc($a, $b, '+') . '<br>';
			echo "$a - $b = " . calc($a, $b, '-') . '<br>';
			echo "$a * $b = " . calc($a, $b, '*') . '<br>';
			echo "$a / $b = " . calc($a, $b, '/') . '<br>';
			echo "=======================<br>Task *#6<br><br>";
			function power($val, $pow) {
				if($pow == 0){
					return 1;
				}
			  	if($pow > 0){
    				return $val * power($val, $pow-1);
  				}
  							    	
			}
			$fval = 2;
			$fpow = 4;
			if ($fpow < 0 )
				{ echo "Error<br>"; }
			else { 
				$y = power($fval, $fpow);
				echo("$fval * $fpow = $y <br>");
			}
			
			
// function myDegree($x, $n){
//   if($n == 0){
//     return 1;
//   }
//   if($n < 0){
//     return myDegree( 1/$x, -$n); // -$n значит смену знака с отрицательного на положительный
//   }
//   return $x * myDegree($x, $n-1); // вызов функции внутри функции
// }
 
// $y = myDegree(2, 4); // самый первый вызов функции
// print $y;

			echo "=======================<br>Task *#7<br>";
			// option 1
			$armin = array(" минута ", " минуты ", " минут ");
			$arhour = array(" час ", " часа ", " часов ");
			function getMin($number, $suffix) {
				$keys = array(2, 0, 1, 1, 1, 2);
				$suffix_key = ($number > 7 && $number < 20) ? 2: $keys[min($number % 10, 5)];
				return $suffix[$suffix_key];
			}?>
			<?/*<p>Текущее Время: <? echo date(G) . getMin(date(G), $arhour) . date(i) . getMin(date(i), $armin) ." <br/>"; ?></p>*/?>
			<?
			function getTime() {
				$hour = date(G);
				$min = date(i);
				$keys = array(2, 0, 1, 1, 1, 2);
				$arhour = array(" час ", " часа ", " часов ");
				$armin = array(" минута ", " минуты ", " минут ");
				$hour = $hour . (string)$arhour[(($hour > 7 && $hour < 20) ? 2: $keys[min($hour % 10, 5)])];
				$min = $min . $armin[(($hour > 7 && $hour < 20) ? 2: $keys[min($hour % 10, 5)])];
				return $hour . $min;
				?>
			<?}
			echo "Вариант 2. Текущее Время: ". getTime();
			?>
			<?
			//$time = new time();
			//echo $time->format('H : i');
			// option 3
			// $array = array(
			//     "multi" => array(
			//          "hour" => array(
			//              0 => "час",
			//              1 => "часа",
			//              2 => "часов"
			//          ),
			//          "min" => array(
			//              0 => "минута",
			//              1 => "минуты",
			//              2 => "минут"
			//          ),
			//     )
			// );
			// function getMin($number, $suffix) {
			// 	$keys = array(2, 0, 1, 1, 1, 2);
			// 	$suffix_key = ($number > 7 && $number < 20) ? 2: $keys[min($number % 10, 5)];
			// 	return $suffix[$suffix_key];
			// }
			// $min = getMin(date(i), $array[multi][min]);
			// $hour = getMin(date(G), $array[multi][hour]);


			// option 2
			// function chti($string, $ch1, $ch2, $ch3){
			// 	$ff=Array('0','1','2','3','4','5','6','7','8','9');
			// 	if(substr($string,-2, 1)==1 AND strlen($string)>1) 
			// 		$ry=array("0 $ch3","1 $ch3","2 $ch3","3 $ch3" ,"4 $ch3","5 $ch3","6 $ch3","7 $ch3","8 $ch3","9 $ch3");
			// 		else $ry=array("0 $ch3","1 $ch1","2 $ch2","3 $ch2","4 $ch2","5 $ch3"," 6 $ch3","7 $ch3","8 $ch3"," 9 $ch3");
			// 	$string1=substr($string,0,-1).str_replace($ff, $ry, substr($string,-1,1));
			// 	return $string1;
			// }
			?>
			<?/*<p>Текущая Время: <? echo chti(date(G), 'час ', 'часа ', 'часов ') . date(i) . " $min <br/>"; ?></p>*/?>
		<footer>
			<?echo "=======================<br>Task #5";?>
			<p>Текущая дата: <? echo date('d m Y'); ?></p>
		</footer>
	</body>
</html>