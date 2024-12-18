<?php
include("config.php");

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы и экранируем их
    $email = $connect->real_escape_string(trim($_POST['email'] ?? ''));
    $name = $connect->real_escape_string(trim($_POST['name'] ?? ''));
    $message = $connect->real_escape_string(trim($_POST['message'] ?? ''));

    // Вставка данных в таблицу feedback
    $sql = "INSERT INTO feedback (email, name, message, created_at) VALUES ('$email', '$name', '$message', NOW())";

    // Выполняем запрос
    $connect->query($sql);
    
    // Переход на index.php
    header("Location: ../../index.php");
    exit(); // Завершаем выполнение скрипта
}

// Закрываем соединение
$connect->close();
?>



