<?php
session_start();
include("assets/function/config.php"); // Подключаем файл с настройками базы данных

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы с проверкой
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $description = isset($_POST['description']) ? htmlspecialchars(trim($_POST['description'])) : '';
    $price = isset($_POST['price']) ? filter_var($_POST['price'], FILTER_VALIDATE_FLOAT) : 0;
    $type = isset($_POST['type']) ? htmlspecialchars(trim($_POST['type'])) : '';
    $manufacturer = isset($_POST['manufacturer']) ? htmlspecialchars(trim($_POST['manufacturer'])) : '';

    // Обработка загрузки изображения
    $img = 'assets/img/default.jpg'; // Значение по умолчанию
    if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'assets/img/'; // Директория для загрузки изображений
        $img = basename($_FILES['img']['name']);
        $uploadFile = $uploadDir . $img;

        // Перемещаем загруженный файл в директорию
        if (!move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
            echo "Ошибка при загрузке изображения.";
            exit();
        }
    }

    // Подготовка SQL-запроса для вставки данных в таблицу
    $sql = "INSERT INTO product (name, description, price, type, img, manufacturer) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    
    // Проверка на успешную подготовку запроса
    if ($stmt === false) {
        echo "Ошибка подготовки запроса: " . $connect->error;
        exit();
    }

    // Привязка параметров
    $stmt->bind_param("ssdsis", $name, $description, $price, $type, $img, $manufacturer);

    // Выполнение запроса и проверка на ошибки
    if ($stmt->execute()) {
        header("Location: add-product.php?success=Товар успешно добавлен!"); // Перенаправление с сообщением об успехе
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    // Закрываем соединение
    $stmt->close();
    $connect->close();
} else {
    // Если запрос не POST, перенаправляем с ошибкой
    header("Location: add-product.php?error=Ошибка добавления товара.");
    exit();
}
?>


