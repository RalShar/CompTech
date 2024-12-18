<?php
session_start(); // Начинаем сессию
include("config.php");

// Проверяем, был ли отправлен запрос на добавление товара
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем имя кнопки, которое будет ID товара
    $productId = key($_POST); // Получаем первое имя из массива $_POST
    $productId = intval($productId); // Преобразуем его в целое число
    $userId = $_SESSION['id_user']; // Предполагаем, что ID пользователя хранится в сессии

    // Проверяем, существует ли товар уже в заказе
    $sql = "SELECT count FROM `order` WHERE id_user = ? AND id_product = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Если товар уже в заказе, увеличиваем количество
        $row = $result->fetch_assoc();
        $newcount = $row['count'] + 1;

        $updateSql = "UPDATE `order` SET count = ? WHERE id_user = ? AND id_product = ?";
        $updateStmt = $connect->prepare($updateSql);
        $updateStmt->bind_param("iii", $newcount, $userId, $productId);
        $updateStmt->execute();
    } else {
        // Если товара нет в заказе, добавляем его с количеством 1
        $insertSql = "INSERT INTO `order` (id_user, id_product, count) VALUES (?, ?, 1)";
        $insertStmt = $connect->prepare($insertSql);
        $insertStmt->bind_param("ii", $userId, $productId);
        $insertStmt->execute();
    }

    // Перенаправляем пользователя на страницу cart.php
    header("Location: ../../cart.php?message=Товар добавлен в корзину!");
    exit();
} else {
    // Если запрос не POST, перенаправляем с ошибкой
    header("Location: ../../cart.php?error=Ошибка добавления товара в корзину.");
    exit();
}

// Закрываем соединение
$connect->close();
?>
