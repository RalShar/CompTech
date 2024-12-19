<?php
session_start(); // Начинаем сессию

// Подключение к базе данных
include 'config.php'; 

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_product'])) {
        $id_product = $_POST['id_product']; // Получаем id_product из формы
    } else {
        die("Ошибка: идентификатор товара не указан.");
    }

    // Проверка, авторизован ли пользователь
    if (!isset($_SESSION['id'])) {
        echo "Отладка: переменная user_id в сессии не установлена.";
        die("Ошибка: пользователь не авторизован.");
    }
    
    // Если пользователь авторизован, продолжаем выполнение кода
    $user_id = $_SESSION['id'];

    // Проверяем, существует ли товар в таблице fav
    $stmt = $connect->prepare("SELECT id_product FROM `fav` WHERE id_user = ? AND id_product = ?");
    $stmt->bind_param("is", $user_id, $id_product); // Привязываем параметры
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Если товар уже есть в избранном
        echo "Товар уже добавлен в избранное!";
    } else {
        // Если товара нет в избранном, добавляем его
        // Подготовка SQL-запроса
        $insert_stmt = $connect->prepare("INSERT INTO `fav` (id_user, id_product) VALUES (?, ?)");
        $insert_stmt->bind_param("is", $user_id, $id_product); // Привязываем параметры

        // Выполнение запроса
        if ($insert_stmt->execute()) {
            echo "Товар добавлен в избранное!";
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
