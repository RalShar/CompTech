<?php
session_start();
include 'config.php'; // Подключение к базе данных

header('Content-Type: application/json'); // Установка заголовка для JSON

$userId = $_SESSION['id'];

// Инициализируем переменные
$totalCount = 0;
$totalPrice = 0;

// Запрос для получения общего количества товаров и общей стоимости
$sql = "
    SELECT SUM(o.count) AS total_count, SUM(o.count * p.price) AS total_price 
    FROM `order` o 
    INNER JOIN `product` p ON o.id_product = p.id 
    WHERE o.id_user = ?
";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    $row = $result->fetch_assoc();
    // Проверяем, что значения существуют и присваиваем их переменным
    if (isset($row['total_count'])) {
        $totalCount = $row['total_count'] ? $row['total_count'] : 0;
    }
    if (isset($row['total_price'])) {
        $totalPrice = $row['total_price'] ? intval($row['total_price']) : 0; // Преобразуем в целое число
    }
}

$stmt->close();
$connect->close();

// Форматируем цену без точек и запятых
$formattedPrice = $totalPrice . '₽'; // Просто добавляем символ валюты

// Возвращаем результат в формате JSON
echo json_encode(['total_count' => $totalCount, 'total_price' => $formattedPrice]);
?>

