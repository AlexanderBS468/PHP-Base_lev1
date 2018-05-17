<?
session_start();
session_unset(); // Удаляем все переменные
session_destroy();
header("Location: index.php");
?>