<?php
session_start();
include('config.php');

// Проверка, был ли отправлен POST-запрос
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Подготовленный запрос для получения пользователя
    $stmt = $connect->prepare("SELECT * FROM `user` WHERE `login` = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    // Проверка, существует ли пользователь
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Проверка правильности пароля (без хеширования)
        if ($password === $row['password']) {
            // Получаем роль пользователя
            $roleStmt = $connect->prepare("SELECT `code` FROM `role` WHERE `id` = ?");
            $roleStmt->bind_param("i", $row['id_role']);
            $roleStmt->execute();
            $role = $roleStmt->get_result()->fetch_assoc();

            // Устанавливаем сессионные переменные
            $_SESSION['login'] = $row['login'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $role['code'];

            // Перенаправление в зависимости от роли
            if ($_SESSION['role'] === "admin") {
                header("Location: /admin/adminpanel.php");
            } else {
                header("Location: ../profile.php");
            }
            exit;
        } else {
            // Неверный пароль
            header("Location: login.php?valide_error=Некорректный логин или пароль");
            exit;
        }
    } else {
        // Пользователь не найден
        header("Location: login.php?valide_error=Некорректный логин или пароль");
        exit;
    }
} else {
    // Если не POST-запрос, перенаправляем на страницу входа
    header("Location: login.php");
    exit;
}
?>
