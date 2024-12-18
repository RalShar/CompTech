<?php
    session_start();

    include('../../function/config.php');

    $sql = "SELECT `id`, `code` FROM `role` WHERE `code` = 'user'";
    $role = $connect->query($sql)->fetch_assoc();

    $sql = sprintf("INSERT INTO `user`(`id`, `id_role`, `login`, `password`, `full_name`, `phone`) VALUES (NULL,'%s','%s','%s','%s','%s')",
        $role['id'],
        $_POST['login'],
        $_POST['password'],
        $_POST['name'],
        $_POST['tel'],
    );

    if(!$connect -> query($sql)){
        echo "Ошибка добавления данных";
    }

    $_SESSION['login'] = $_POST['login'];
    $_SESSION['id'] = $connect->insert_id;
    $_SESSION['role'] = $role['code'];

    if($_SESSION['role'] == "admin"){
        header("Location: /admin/");
        exit;
    }

    header("Location: ../order.php");
    exit;
?>