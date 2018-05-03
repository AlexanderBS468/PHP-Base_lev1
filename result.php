<?php
$result = require __DIR__ . '/calc.php';
?>
<html>
<head>
    <title>Калькулятор</title>
</head>
<body>
    <b>Результат вычислений:</b>
    <br>
    <?= $result ?>
    <a href="./lesson6.php" style="margin: 50px;">Назад к калькулятору</a>
</body>
</html>