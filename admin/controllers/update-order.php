<?php

    include("../../function/config.php");

    if(isset($_GET['type'])){
        $sql = "SELECT `id` FROM `status` WHERE `code` = '{$_GET['type']}'";
        $status = $connect->query($sql)->fetch_assoc();
        $sql = sprintf("UPDATE `order` SET `id_status`='%s' WHERE `id` = '%s'", $status['id'], $_GET['id_order']);
        $connect->query($sql);
        header("Location: /admin/adminpanel.php");
        exit;
    }

    header("Location: /");
    exit;
?>