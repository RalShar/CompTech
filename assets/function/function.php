<?php

include("config.php");

function fnOutCardsUser(){
    global $connect;

    $sql = "SELECT `product`.`name` AS `pname`, `product`.`image` AS `pimage`, `address`, `price` FROM `order` INNER JOIN `status` ON `order`.`id_status` = `status`.`id` INNER JOIN `product` ON `order`.`id_product` = `product`.`id` WHERE `id_user` = '{$_SESSION['id']}'";

    $result = $connect->query($sql);

    if($result->num_rows){
        $data = '<div class="cartcont">';
        foreach($result as $item){
            $data .= sprintf('
            <div class="cartup">
            <img src=%s alt="tovar">
            <div class="carttxt">
              <p>%s</p>
              <p>%s ₽</p>
            </div>
          </div>', $item['pimage'], $item['pname'], $item['price']);
        }
        $data .= '</div>';
        return $data;
    }else{
        return '<h4 class="none">Заказов не найдено</h4>';
    }
}

function fnOutCardsProduct(){
    global $connect;

    $sql = "SELECT * FROM `product`";

    $result = $connect->query($sql);

    if($result->num_rows){
        $data = '
        <div class="mb-3">
            <label for="product" class="form-label">Выберите товар</label>
            <select name="product" class="form-select" id="product">';
        foreach($result as $key => $item){
            if($key == 1){
                $data .= sprintf('
                <option value="%s" selected>%s (%s рублей)</option>',  
                $item['id'],$item['name'], $item['price']); 
            }else{
                $data .= sprintf('
                <option value="%s">%s (%s рублей)</option>',  
                $item['id'],$item['name'], $item['price']); 
            }
            
        }
        $data .= '</select></div>';
        return $data;
    }else{
        return '<h4 class="fs-3 text-center">Заказов не найдено</h4>';
    }
}

function fnOutCardsAdmin(){
    global $connect;

    $sql = "SELECT `full_name`, `login`, `order`.`id` AS `oid`,`product`.`name` AS `pname`, `status`.`name` AS `sname`, `status`.`code` AS `scode`, `price` FROM `order` INNER JOIN `status` ON `order`.`id_status` = `status`.`id` INNER JOIN `product` ON `order`.`id_product` = `product`.`id` INNER JOIN `user` ON `order`.`id_user` = `user`.`id`";

    $result = $connect->query($sql);

    if($result->num_rows){
        $data = '<div class="cards my-4">';
        foreach($result as $item){
            if($item['scode'] == "new"){
                $data .= sprintf('
                <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">Заказ №%s</h5>
                    <p class="card-text">Статус: %s</p>
                    <p class="card-text">Заказчик: %s</p>
                    <p class="card-text">Почта: %s</p>
                    <p class="card-text">Товар: %s</p>
                    <p class="card-text">Цена: %s ₽</p>
                    <div class="field-row" style="justify-content: flex-end">
                        <button onclick="location.href = \'/admin/controllers/update-order.php?type=confirmed&id_order=%s\'">Подтвердить</button>
                        <button  onclick="location.href = \'/admin/controllers/update-order.php?type=canceled&id_order=%s\'">Отменить</button>
                    </div>
                </div>
            </div>
            <hr>', $item['oid'], $item['sname'], $item['full_name'], $item['login'], $item['pname'], $item['price'], $item['oid'], $item['oid']);
            }else{
                $data .= sprintf('
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">Заказ №%s</h5>
                        <p class="card-text">Статус: %s</p>
                        <p class="card-text">Заказчик: %s</p>
                        <p class="card-text">Почта: %s</p>
                        <p class="card-text">Товар: %s</p>
                        <p class="card-text">Цена: %s рублей</p>
                    </div>
                    <hr>
                </div>', $item['oid'], $item['sname'], $item['full_name'], $item['login'], $item['pname'],$item['price']);
            }
            
        }
        $data .= '</div>';
        return $data;
    }else{
        return '<h4 class="fs-3 text-center">Заказов не найдено</h4>';
    }
}

?>