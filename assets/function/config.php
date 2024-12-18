<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "v1";

    $connect = new mysqli($hostname, $username, $password, $dbname);
    if(!$connect){
        echo "Ошибка базы данных: ".mysqli_connect_error();
    }
?>