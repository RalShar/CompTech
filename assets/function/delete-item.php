<?php
session_start();
include 'config.php'; // Подключение к базе данных

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id_product'])) {
    $productId = intval($data['id_product']);
    
    // Подготовленный запрос для удаления товара из корзины
    $sql = $connect->prepare("DELETE FROM `order` WHERE `id_product` = ? AND `id_user` = ?");
    $sql->bind_param("ii", $productId, $_SESSION['id']); // Предполагаем, что id_user - это целое число

    if ($sql->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Ошибка удаления']);
    }

    $sql->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Некорректные данные']);
}

$connect->close();
?>
