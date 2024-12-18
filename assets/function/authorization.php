<?php

require_once('db.php');

$name=$_POST['name'];
$password=$_POST['password'];

$result=$mysql->query("SELECT * FROM `users` WHERE `name`='$name' AND `password`='$password'");

if ($result->num_rows==0){
    exit();
}
else{
    $data=$result->fetch_assoc();
    echo "Вы успешно вошли на сайт";
}

$mysql->close();

?>