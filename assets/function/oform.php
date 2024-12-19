<?php
session_start(); // Не забудьте начать сессию, если вы используете $_SESSION
include("config.php");
global $connect; // Предполагается, что соединение с базой данных уже установлено

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $city = htmlspecialchars($_POST['city']);
    $delivery_option = htmlspecialchars($_POST['delivery_option']);
    $adress = htmlspecialchars($_POST['adress']);
    $section = htmlspecialchars($_POST['section']);
    $floor = htmlspecialchars($_POST['floor']);
    $room = htmlspecialchars($_POST['room']);
    $payment_method = htmlspecialchars($_POST['payment_method']);
    $full_name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $tel2 = htmlspecialchars($_POST['tel2']);
    $comment = htmlspecialchars($_POST['comment']);

    // Получаем сумму цен всех товаров из таблицы order с использованием JOIN с таблицей product
    $stmt = $connect->prepare("
        SELECT SUM(p.price) AS total_price
        FROM `order` o
        JOIN `product` p ON o.id_product = p.id
        WHERE o.id_user = ?
    ");
    
    if (!$stmt) {
        die("Ошибка подготовки запроса: " . $connect->error);
    }

    $stmt->bind_param("i", $_SESSION['id']); // Предполагаем, что id_user - это целое число
    $stmt->execute();
    $result = $stmt->get_result();
    $total_price = 0;

    if ($row = $result->fetch_assoc()) {
        $total_price = floatval($row['total_price']); // Преобразуем в float
    }

    // Подготовка запроса для вставки данных в таблицу zakaz
    $fields = ["user_id", "city", "delivery_option", "payment_method", "full_name", "email", "tel", "tel2", "comment"];
    $values = [];
    
    // Основные поля
    $values[] = $_SESSION['id']; // Предполагаем, что id_user хранится в сессии
    $values[] = $city;
    $values[] = $delivery_option;
    $values[] = $payment_method;
    $values[] = $full_name;
    $values[] = $email;
    $values[] = $tel;
    $values[] = $tel2;
    $values[] = $comment;

    // Добавляем адресные поля, если они не пустые
    if (!empty($adress)) {
        $fields[] = "adress";
        $values[] = $adress;
    }
    if (!empty($section)) {
        $fields[] = "section";
        $values[] = $section;
    }
    if (!empty($floor)) {
        $fields[] = "floor";
        $values[] = $floor;
    }
    if (!empty($room)) {
        $fields[] = "room";
        $values[] = $room;
    }
    
    // Добавляем total_price в массив полей и значений
    $fields[] = "total_price1";
    $values[] = $total_price;

    // Создаем строку запроса
    $query = "INSERT INTO `zakaz` (" . implode(", ", $fields) . ") VALUES (" . rtrim(str_repeat('?, ', count($values)), ', ') . ")";
    
    // Подготовка запроса
    $stmt = $connect->prepare($query);
    
    // Подготовка типов параметров для bind_param
    $param_types = str_repeat("s", count($values) - 1) . "d"; // Все параметры строковые, последний - число с плавающей точкой
    $stmt->bind_param($param_types, ...$values);

    // Выполняем запрос
    if ($stmt->execute()) {
        // Успешное сохранение данных
        echo "Данные успешно сохранены!";

        // Удаляем товары из корзины для текущего пользователя
        $delete_stmt = $connect->prepare("DELETE FROM `order` WHERE id_user = ?");
        $delete_stmt->bind_param("i", $_SESSION['id']);
        $delete_stmt->execute();

        // Перенаправление на index.php
        header("Location: ../../index.php");
        exit(); // Завершаем выполнение скрипта после перенаправления
    } else {
        echo "Ошибка при сохранении данных: " . $stmt->error;
    }
}
?>
