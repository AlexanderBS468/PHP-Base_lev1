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
        <label for="ac-1">О нас</label>
        <article class="ac-small">
            <p>Текст статьи... </p>
        </article>
    </div>
    <div>
        <input id="ac-2" name="accordion-1" type="checkbox" checked />
        <label for="ac-2">Как мы работаем</label>
        <article class="ac-medium">
            <p>Текст статьи... </p>
        </article>
    </div>
    <div><!--...--></div>
</section>

	</body>
</html>