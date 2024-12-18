<?php
    session_start();

    include('../../function/config.php');

    $sql = "SELECT * FROM `status` WHERE `code` = 'new'";
    $status = $connect->query($sql)->fetch_assoc();

    $sql = sprintf("INSERT INTO `order`(`id`, `id_user`, `id_product`, `id_status`, `address`) VALUES (NULL,'%s','%s','%s','%s')", 
    $_SESSION['id'], $_POST['product'], $status['id'], $_POST['address']);
    
    $connect->query($sql);


    header("Location: /cart.php");
    exit;
?>
