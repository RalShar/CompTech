<?php
session_start(); // Начинаем сессию

// Подключение к базе данных
include 'config.php';

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверка на наличие ключа 'id_product' в массиве $_POST
    if (isset($_POST['id_product'])) {
        // Получение данных
        $id_product = $_POST['id_product']; // Идентификатор товара
    } else {
        die("Ошибка: идентификатор товара не указан.");
    }

    // Проверка, установлен ли user_id в сессии
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id']; // Получаем user_id из сессии
    } else {
        die("Ошибка: пользователь не авторизован.");
    }

    // Устанавливаем статус
    $status = 'на рассмотрении';

    // Проверяем, существует ли товар в корзине
    $stmt = $connect->prepare("SELECT count FROM `order` WHERE id_user = ? AND id_product = ?");
    $stmt->bind_param("is", $user_id, $id_product); // Используем id_product вместо product_name
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Если товар уже есть в корзине, обновляем количество
        $stmt->bind_result($current_count);
        $stmt->fetch();
        $new_count = $current_count + 1;

        // Обновляем количество в базе данных
        $update_stmt = $connect->prepare("UPDATE `order` SET count = ?, status = ? WHERE id_user = ? AND id_product = ?");
        $update_stmt->bind_param("issi", $new_count, $status, $user_id, $id_product); // Изменено на id_product

        if ($update_stmt->execute()) {
            echo "Количество товара обновлено!";
        } else {
            echo "Ошибка: " . $update_stmt->error;
        }

        // Закрытие подготовленного выражения
        $update_stmt->close();
    } else {
        // Если товара нет в корзине, добавляем его
        $count = 1;

        // Подготовка SQL-запроса
        $insert_stmt = $connect->prepare("INSERT INTO `order` (id_user, id_product, status, count) VALUES (?, ?, ?, ?)");
        $insert_stmt->bind_param("issi", $user_id, $id_product, $status, $count); // Изменено на id_product

        // Выполнение запроса
        if ($insert_stmt->execute()) {
            echo "Товар добавлен в корзину!";
        } else {
            echo "Ошибка: " . $insert_stmt->error;
        }

        // Закрытие подготовленного выражения
        $insert_stmt->close();
    }

    // Закрытие подготовленного выражения
    $stmt->close();
}

// Закрытие соединения
$connect->close();
?>
