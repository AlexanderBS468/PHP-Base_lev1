<?php
if (empty($_GET)) {
    return 'Ничего не передано!';
}

if (empty($_GET['operation'])) {
    return 'Не передана операция';
}

if (($_GET['x1'] == '') || ($_GET['x2'] == '')) {
    return 'Не переданы аргументы';
}

if ((gettype($x1) === "string") && (gettype($x2) === "string")){
    return 'Введите числа';
}

$x1 = $_GET['x1'];
$x2 = $_GET['x2'];

$expression = $x1 . ' ' . $_GET['operation'] . ' ' . $x2 . ' = ';

switch ($_GET['operation']) {
    case '+':
        $result = $x1 + $x2;
        break;
    case '-':
        $result = $x1 - $x2;
        break;
    case '*':
        $result = $x1 * $x2;
        break;
    case '/':
        $result = ($x2 != 0) ? ($x1 / $x2) : 'На ноль делить нельзя';
        break;

    default:
        return 'Операция не поддерживается';
}

return $expression . $result;