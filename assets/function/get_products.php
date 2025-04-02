<?php
include 'config.php'; // Подключите файл с соединением с БД
include 'function.php'; // Подключите файл с функцией fncatalog

$min = isset($_GET['min']) ? $_GET['min'] : null;
$max = isset($_GET['max']) ? $_GET['max'] : null;
$types = isset($_GET['types']) ? explode(',', $_GET['types']) : [];

// Вызов функции с параметрами
$output = fncatalog($min, $max, $types);
echo $output;
?>
