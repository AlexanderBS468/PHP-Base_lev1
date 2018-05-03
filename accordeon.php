<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title><?php echo "$title"; ?></title>
        <link rel="stylesheet" type="text/css" href="custom.css">
	</head>
	<body>
	<section class="ac-container">
    <div>
        <input id="ac-1" name="accordion-1" type="checkbox" />
        <label for="ac-1">Code</label>
        <article class="ac-small">
            <p><code> 
<? $str = '
<!DOCTYPE html>
<html lang=&quot;ru&quot;>
    <head>
        <meta charset=&rsquo;UTF-8&rsquo;>
         <? 
            $title = &rsquo;First lesson&rsquo;;
            $h1 = &rsquo;lesson#1&rsquo;;
            $user = &rsquo;Alexander&rsquo;;
            $date = &rsquo;10.04.2018&rsquo;;
         ?>
        <title><?php echo &quot;$title&quot;; ?></title>
    </head>
    <body>
        <h1><? echo $h1; ?></h1>
        <p>Ваше имя: <? echo $user; ?></p>
        <p>Текущая дата: <? echo date(&rsquo;d m Y&rsquo;); ?></p>
        <p>Дата выполнения: <? echo $date; ?></p>
        <a href=&quot;/index.php&quot;>Ha main</a><br>
        <?php
            $a = 5;
            $b = &rsquo;5&rsquo;;
            var_dump($a == $b); 
            echo &rsquo;Потому что сравнивались значения переменной. Так как язык РНР с динамической типизацией, переменные привелись к одному типу <br>&rsquo;;
            var_dump((int)&rsquo;012345&rsquo;); 
            echo &rsquo;Тип перевелся из String в int <br>&rsquo;;
            var_dump((float)123.0 === (int)123.0); 
            echo &rsquo;Происходит сравнение по значению и типу<br>&rsquo;;
            var_dump((int)0 === (int)&rsquo;hello, world&rsquo;);
            echo &rsquo;Происходит сравнение целочисленно типа = 0 и текс перводим в целочисленное получается = 0<br>&rsquo;;
        ?>
        <?
            $a = 12;
            $b = 21;
            $a = $a + $b;
            $b = $a - $b;
            $a = $a - $b;
            echo &rsquo;a = &rsquo; . $a . &rsquo;<br>&rsquo;;
            echo &rsquo;b = &rsquo; . $b;
        ?>
    </body>
</html>'; echo "$str"; ?></code>
            </p>
        </article>
    </div>
</section>

	</body>
</html>