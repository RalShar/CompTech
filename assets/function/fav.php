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
        echo "Отладка: переменная id_user в сессии не установлена.";
        die("Ошибка: пользователь не авторизован.");
    }
    
    // Если пользователь авторизован, продолжаем выполнение кода
    $id_user = $_SESSION['id'];

    // Проверяем, существует ли товар в корзине
    $stmt = $connect->prepare("SELECT count FROM `order` WHERE id_user = ? AND id_product = ?");
    $stmt->bind_param("is", $id_user, $id_product); // Привязываем параметры
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Если товар уже есть в корзине, обновляем количество
        $stmt->bind_result($current_count);
        $stmt->fetch();
        $new_count = $current_count + 1;

        // Обновляем количество в базе данных
        $update_stmt = $connect->prepare("UPDATE `order` SET count = ? WHERE id_user = ? AND id_product = ?");
        $update_stmt->bind_param("iis", $new_count, $id_user, $id_product); // Привязываем параметры

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
        $insert_stmt = $connect->prepare("INSERT INTO `order` (id_user, id_product, count) VALUES (?, ?, ?)");
        $insert_stmt->bind_param("isi", $id_user, $id_product, $count); // Привязываем параметры

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
