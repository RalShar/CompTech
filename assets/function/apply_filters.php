<?php
require_once 'config.php';
require_once 'function.php';

header('Content-Type: text/html; charset=utf-8');

if (isset($_POST['filters'])) {
    $filters = json_decode($_POST['filters'], true);
    
    // Очищаем пустые значения
    $cleanFilters = array_filter($filters, function($value) {
        return !empty($value);
    });
    
    echo fncatalog('all', $cleanFilters);
} else {
    // Если фильтры не переданы - показываем все товары
    echo fncatalog('all', []);
}
?>