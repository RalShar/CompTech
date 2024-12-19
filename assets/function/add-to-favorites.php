<?php
session_start();
include 'config.php'; // Подключение к базе данных

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id_product']) && isset($_SESSION['id'])) {
    $productId = intval($data['id_product']);
    $userId = intval($_SESSION['id']);

    // Проверяем, существует ли товар с данным id_product
    $checkProduct = $connect->prepare("SELECT COUNT(*) FROM `product` WHERE `id` = ?");
    $checkProduct->bind_param("i", $productId);
    $checkProduct->execute();
    $checkProduct->bind_result($count);
    $checkProduct->fetch();
    $checkProduct->close();

    if ($count > 0) {
        // Проверяем, есть ли товар уже в избранном
        $checkFavorite = $connect->prepare("SELECT COUNT(*) FROM `fav` WHERE `id_user` = ? AND `id_product` = ?");
        $checkFavorite->bind_param("ii", $userId, $productId);
        $checkFavorite->execute();
        $checkFavorite->bind_result($favoriteCount);
        $checkFavorite->fetch();
        $checkFavorite->close();

        if ($favoriteCount > 0) {
            echo json_encode(['success' => false, 'error' => 'Товар уже добавлен в избранное']);
        } else {
            // Подготовленный запрос для добавления товара в избранное
            $sql = $connect->prepare("INSERT INTO `fav` (`id_user`, `id_product`) VALUES (?, ?)");
            $sql->bind_param("ii", $userId, $productId);

            if ($sql->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Ошибка добавления в избранное']);
            }

            $sql->close();
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Товар не найден']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Некорректные данные']);
}

$connect->close();
?>
