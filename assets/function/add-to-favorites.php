<?php
session_start();
include 'config.php'; // Подключение к базе данных

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id_product']) && isset($_SESSION['id'])) {
    $productId = intval($data['id_product']);
    $userId = intval($_SESSION['id']);

    // Подготовленный запрос для добавления товара в избранное
    $sql = $connect->prepare("INSERT INTO `fav` (`id_user`, `id_product`) VALUES (?, ?)");
    $sql->bind_param("ii", $userId, $productId);

    if ($sql->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Ошибка добавления в избранное']);
    }

    $sql->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Некорректные данные']);
}

$connect->close();
?>
