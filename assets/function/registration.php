<?php
session_start();
include('config.php');

// Проверка наличия необходимых данных
if (!isset($_POST['tel'], $_POST['login'], $_POST['password'], $_POST['full_name'])) {
    die("Недостаточно данных для регистрации.");
}

// Получение роли пользователя
$sql = "SELECT `id` FROM `role` WHERE `code` = 'user'";
$role = $connect->query($sql)->fetch_assoc();

if (!$role) {
    die("Ошибка получения роли пользователя.");
}

// Подготовка SQL-запроса
$stmt = $connect->prepare("INSERT INTO `user`(`id_role`, `phone`, `login`, `password`, `full_name`) VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Ошибка подготовки запроса: " . $connect->error);
}


// Привязка параметров
$stmt->bind_param("issss", $role['id'], $_POST['tel'], $_POST['login'], $_POST['password'], $_POST['full_name']);

// Выполнение запроса
if (!$stmt->execute()) {
    die("Ошибка добавления данных: " . $stmt->error);
}

// Установка сессий
$_SESSION['login'] = $_POST['login'];
$_SESSION['id'] = $connect->insert_id;
$_SESSION['role'] = 'user'; // Роль можно установить напрямую, так как мы знаем, что это 'user'

// Перенаправление
header("Location: ../index.php");
exit;
?>
