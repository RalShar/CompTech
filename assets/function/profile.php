<?php
// Начинаем сессию
session_start();

// Подключаем файл с настройками базы данных
include 'config.php';

// Проверяем, установлен ли user_id в сессии
if (!isset($_SESSION['id'])) {
    echo "Ошибка: пользователь не авторизован.";
    exit;
}

// Получение данных из формы с проверкой на существование
$last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : null;
$first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : null;
$middle_name = isset($_POST['middle_name']) ? trim($_POST['middle_name']) : null;
$gender = isset($_POST['gender']) ? trim($_POST['gender']) : null;
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : null;
$email = isset($_POST['email']) ? trim($_POST['email']) : null;

// Соединение полей ФИО, если они не пустые
$full_name = trim("$last_name $first_name $middle_name");
$updates = [];
$params = [];
$types = '';

// Проверка и добавление полей к запросу
if (!empty($full_name)) {
    $updates[] = "full_name=?";
    $params[] = $full_name;
    $types .= 's';
}
if (!empty($gender)) {
    $updates[] = "sex=?";
    $params[] = $gender;
    $types .= 's';
}
if (!empty($phone)) {
    $updates[] = "phone=?";
    $params[] = $phone;
    $types .= 's';
}
if (!empty($email)) {
    $updates[] = "login=?";
    $params[] = $email;
    $types .= 's';
}

// Проверка, есть ли что обновлять
if (empty($updates)) {
    echo "Ошибка: нет данных для обновления.";
    exit;
}

// Получаем user_id из сессии
$user_id = $_SESSION['id'];
$params[] = $user_id; // Добавляем user_id в параметры
$types .= 'i'; // Добавляем тип для id

// Формируем SQL-запрос, не добавляя id в обновляемые поля
$sql = "UPDATE user SET " . implode(", ", $updates) . " WHERE id=?";

$stmt = $connect->prepare($sql);

// Проверка на успешность подготовки запроса
if (!$stmt) {
    echo "Ошибка подготовки запроса: " . $connect->error;
    exit;
}

// Привязка параметров
if (count($params) !== substr_count($sql, '?')) {
    echo "Ошибка: количество параметров не совпадает с количеством знаков '?' в запросе.";
    exit;
}

$stmt->bind_param($types, ...$params);

if ($stmt->execute()) {
    echo "Данные успешно обновлены.";
} else {
    echo "Ошибка обновления данных: " . $stmt->error;
}

// Закрытие подключения
$stmt->close();
$connect->close();
?>
