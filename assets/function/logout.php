<?php
session_start(); // Начинаем сессию

// Удаляем все переменные сессии
$_SESSION = array();

// Если вы хотите уничтожить сессию полностью, также удалите идентификатор сессии
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}

// Уничтожаем сессию
session_destroy();

// Перенаправляем пользователя на главную страницу или страницу входа
header("Location: ../../index.php"); // Замените на нужный вам URL
exit();
?>
