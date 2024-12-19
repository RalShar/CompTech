<?php
session_start();
require 'config.php'; // Подключение к базе данных

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id_product = $data['id_product'];
    $count = $data['count'];

    // Подготовленный запрос для обновления количества
    $sql = $connect->prepare("UPDATE `order` SET `count` = ? WHERE `id_product` = ? AND `id_user` = ?");
    $sql->bind_param("iii", $count, $id_product, $_SESSION['id']); // Предполагаем, что id_user - это целое число

    if ($sql->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>