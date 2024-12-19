<?php
session_start();
include("config.php"); // Подключаем файл с настройками базы данных

// Проверяем, был ли отправлен запрос на добавление товара
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $manufacturer = $_POST['manufacturer']; // Получаем производителя

    // Обработка загрузки изображения
    $img = null;
    if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../img/'; // Директория для загрузки изображений
        $img = basename($_FILES['img']['name']);
        $uploadFile = $uploadDir . $img;

        // Перемещаем загруженный файл в директорию
        if (!move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
            echo "Ошибка при загрузке изображения.";
            exit();
        }
    }

   // Проверяем, было ли загружено изображение
if ($img === null) {
    $img = 'assets/img/default.jpg';
    } else {
    // Сохраняем полный путь к изображению
    $img = 'assets/img/'. $img;
    }

    // Подготовка SQL-запроса для вставки данных в таблицу
    $sql = "INSERT INTO product (name, description, price, type, img, manufacturer) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("ssdiss", $name, $description, $price, $type, $img, $manufacturer); // Изменили типы данных

    // Выполнение запроса и проверка на ошибки
    if ($stmt->execute()) {
        header("Location: ../../admin/adminpanel.php?success=Товар успешно добавлен!"); // Перенаправление с сообщением об успехе
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    // Закрываем соединение
    $stmt->close();
    $connect->close();
} else {
    // Если запрос не POST, перенаправляем с ошибкой
    header("Location: ../../admin/adminpanel.php?error=Ошибка добавления товара.");
    exit();
}
?>
