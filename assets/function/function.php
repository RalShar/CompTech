<?php

include("config.php");

function fnOutCardsUser () {
    global $connect;

    // Подготовленный SQL-запрос для повышения безопасности
    $stmt = $connect->prepare("SELECT `product`.`id` AS `id_product`, `product`.`name` AS `pname`, `product`.`img` AS `pimage`, `product`.`description` AS `description`, `order`.`count` AS `count`, `price` 
                                FROM `order` 
                                INNER JOIN `product` ON `order`.`id_product` = `product`.`id` 
                                WHERE `id_user` = ?");
    $stmt->bind_param("i", $_SESSION['id']); // Предполагаем, что id_user - это целое число
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows) {
        $data = '<form>';
        foreach ($result as $item) {
            $data .= sprintf('
            <div class="tovar">
                <img src="%s" alt="tovar">
                <div class="tovinfo">
                    <div class="tovchar">
                        <p>%s</p>
                        <p>%s</p>
                    </div>
                    <div class="number-input">
                        <button type="button" class="decrease" data-id="%d">-</button>
                        <input type="number" value="%s" min="0" class="quantity-input" data-id="%d">
                        <button type="button" class="increase" data-id="%d">+</button>
                    </div>
                    <p class="tovprice">%d ₽</p>
                    <div class="tovbtns">
                        <button type="button" class="favorite" data-id="%d"><img src="assets/img/Heart.png" alt="fav"></button>
                        <button type="button" class="delete" data-id="%d"><img src="assets/img/Trash.png" alt="del"></button>
                    </div>
                </div>
            </div>', 
            htmlspecialchars($item['pimage']), 
            htmlspecialchars($item['pname']), 
            htmlspecialchars($item['description']), 
            $item['id_product'], // id_product для кнопки уменьшения
            htmlspecialchars($item['count']), 
            $item['id_product'], // id_product для поля ввода
            $item['id_product'], // id_product для кнопки увеличения
            intval($item['price']), // Используем intval для целого числа
            $item['id_product'], // id_product для кнопки избранного
            $item['id_product']  // id_product для кнопки удаления
        );
        }

        $data .= '</form>';
        return $data;
    } else {
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
function fnindex($typeId) {
    global $connect;

    // Маппинг id на типы товаров
    $typeMapping = [
        'gpu' => 'Видеокарта',
        'cpu' => 'Процессор',
        'ram' => 'Оперативная память',
        'ssd' => 'SSD',
        'hdd' => 'HDD',
        'case' => 'Корпус',
        'mother' => 'Материнская плата',
        'all' => 'all' // Для выбора всех товаров
        // Добавьте другие типы по мере необходимости
    ];

    // Проверяем, если id равен 'all', то выводим все товары
    if ($typeId === 'all') {
        $sql = "SELECT `name` AS `pname`, `img` AS `pimage`, `description` AS `descrip`, `price` AS `price`, `type` AS `type`, `id` AS `id`
                FROM `product`
                LIMIT 5";
    } else {
        // Проверяем, существует ли тип в маппинге
        if (!array_key_exists($typeId, $typeMapping)) {
            return '<h4 class="none">Неверный тип товара</h4>';
        }

        $productType = $typeMapping[$typeId];

        // Изменяем запрос, добавляя условие WHERE для фильтрации по типу
        $sql = "SELECT `name` AS `pname`, `img` AS `pimage`, `description` AS `descrip`, `price` AS `price`, `type` AS `type`, `id` AS `id`
                FROM `product` 
                WHERE `type` = '$productType' 
                LIMIT 5";
    }

    $result = $connect->query($sql);

    if ($result->num_rows) {
        // Добавляем значение $typeId в атрибут id
        $data = sprintf('<div id="%s" class="tabcontent">', htmlspecialchars($typeId));
        
        foreach ($result as $item) {
            $data .= sprintf('
            <form id="add-to-cart-form" action="assets/function/add-order.php" method="POST" class="tab1">       
    <img src="%s" alt="tovar">
    <div class="price">
        <p>%s₽</p> 
       <button type="button"><img src="assets/img/Heart.png" alt="fav"></button>
    </div>
    <div class="descrip">
        <p>%s</p>
        <p>%s</p>
    </div>
    <div class="review">
        <div class="stars">
            <img src="assets/img/star.png" alt="star">
            <img src="assets/img/star.png" alt="star">
            <img src="assets/img/star.png" alt="star">
            <img src="assets/img/star.png" alt="star">
            <img src="assets/img/star.png" alt="star">
        </div>
        <div class="reviewbut">
            <button><img src="assets/img/Commen-192x192.png" alt="revies"></button>
            <p>152</p>
        </div>
    </div>
    <button class="tovbut" name="id_product" type="button" value="%s" onclick="addToCart(this)">
        <img src="assets/img/Shopping_Card-192x192.png" alt="cart">
        <span>В корзину</span>
    </button>
</form> 
            ', $item['pimage'], $item['price'], $item['pname'], $item['descrip'], $item['id']);
        }
        $data .= '</div>';
        return $data;
    } 
}
function fnindexnew($typeId) {
    global $connect;

    // Маппинг id на типы товаров
    $typeMapping = [
        'gpu1' => 'Видеокарта',
        'cpu1' => 'Процессор',
        'ram1' => 'Оперативная память',
        'ssd1' => 'SSD',
        'hdd1' => 'HDD',
        'case1' => 'Корпус',
        'mother1' => 'Материнская плата',
        'all2' => 'all' // Для выбора всех товаров
        // Добавьте другие типы по мере необходимости
    ];

    // Проверяем, если id равен 'all', то выводим все товары
    if ($typeId === 'all2') {
        $sql = "SELECT `name` AS `pname`, `img` AS `pimage`, `description` AS `descrip`, `price` AS `price`, `type` AS `type` , `id` AS `id`
                FROM `product`
                ORDER BY `id` DESC
                LIMIT 5";
    } else {
        // Проверяем, существует ли тип в маппинге
        if (!array_key_exists($typeId, $typeMapping)) {
            return '<h4 class="none">Неверный тип товара</h4>';
        }

        $productType = $typeMapping[$typeId];

        // Изменяем запрос, добавляя условие WHERE для фильтрации по типу
        $sql = "SELECT `name` AS `pname`, `img` AS `pimage`, `description` AS `descrip`, `price` AS `price`, `type` AS `type`, `id` AS `id`
                FROM `product` 
                WHERE `type` = '$productType' 
                LIMIT 5";
    }

    $result = $connect->query($sql);

    if ($result->num_rows) {
        // Добавляем значение $typeId в атрибут id
        $data = sprintf('<div id="%s" class="tabcontent2">', htmlspecialchars($typeId));
        
        foreach ($result as $item) {
            $data .= sprintf('
             <form id="add-to-cart-form" action="assets/function/add-order.php" method="POST" class="tab1">       
    <img src="%s" alt="tovar">
    <div class="price">
        <p>%s₽</p> 
        <button type="button" name="id_product" value="%s" onclick="addToFavorites(this)"><img src="assets/img/Heart.png" alt="fav"></button>
    </div>
    <div class="descrip">
        <p>%s</p>
        <p>%s</p>
    </div>
    <div class="review">
        <div class="stars">
            <img src="assets/img/star.png" alt="star">
            <img src="assets/img/star.png" alt="star">
            <img src="assets/img/star.png" alt="star">
            <img src="assets/img/star.png" alt="star">
            <img src="assets/img/star.png" alt="star">
        </div>
        <div class="reviewbut">
            <button><img src="assets/img/Commen-192x192.png" alt="revies"></button>
            <p>152</p>
        </div>
    </div>
    <button class="tovbut" name="id_product" type="button" value="%s" onclick="addToCart(this)">
        <img src="assets/img/Shopping_Card-192x192.png" alt="cart">
        <span>В корзину</span>
    </button>
</form>
            ', $item['pimage'], $item['price'], $item['id'], $item['pname'], $item['descrip'], $item['id']);
        }
        $data .= '</div>';
        return $data;
    } 
}
function fncatalog($typeId) {
    global $connect;

    // Маппинг id на типы товаров
    $typeMapping = [
        'gpu' => 'Видеокарта',
        'cpu' => 'Процессор',
        'ram' => 'Оперативная память',
        'ssd' => 'SSD',
        'hdd' => 'HDD',
        'case' => 'Корпус',
        'mother' => 'Материнская плата',
        'all' => 'all' // Для выбора всех товаров
        // Добавьте другие типы по мере необходимости
    ];

    // Проверяем, если id равен 'all', то выводим все товары
    if ($typeId === 'all') {
        $sql = "SELECT `name` AS `pname`, `img` AS `pimage`, `description` AS `descrip`, `price` AS `price`, `type` AS `type`, `id` AS `id`
                FROM `product`";
    } else {
        // Проверяем, существует ли тип в маппинге
        if (!array_key_exists($typeId, $typeMapping)) {
            return '<h4 class="none">Неверный тип товара</h4>';
        }

        $productType = $typeMapping[$typeId];

        // Изменяем запрос, добавляя условие WHERE для фильтрации по типу
        $sql = "SELECT `name` AS `pname`, `img` AS `pimage`, `description` AS `descrip`, `price` AS `price`, `type` AS `type`, `id` AS `id`
                FROM `product` 
                WHERE `type` = '$productType' ";
    }

    $result = $connect->query($sql);

    if ($result->num_rows) {
        // Добавляем значение $typeId в атрибут id
        $data = sprintf('<div id="%s">', htmlspecialchars($typeId));
        
        foreach ($result as $item) {
            $data .= sprintf('
              <div class="tovar">
    <img src="%s" alt="tovar">
    <div class="tovinfo">
      <div class="tovchar">
          <p>%s</p>
          <p>%s</p>
          <div class="review">
            <div class="stars">
              <img src="assets/img/star.png" alt="star">
              <img src="assets/img/star.png" alt="star">
              <img src="assets/img/star.png" alt="star">
              <img src="assets/img/star.png" alt="star">
              <img src="assets/img/star.png" alt="star">
            </div>
            <div class="reviewbut">
            <button><img src="assets/img/Commen-192x192.png" alt="review"></button>
            <p>152</p>
          </div>
          </div>
      </div>
      <div class="tovprice">
      <p>%s ₽</p>
      <button class="tovbut"><img src="assets/img/Shopping_Card-192x192.png" alt="cart"><span>В корзину</span></button>
    </div>
      <div class="tovbtns">
      <button><img src="assets/img/Heart.png" alt="fav"></button>
  </div>
    </div>
  </div>', $item['pimage'], $item['pname'], $item['descrip'], $item['price'], $item['id']);
        }
        $data .= '</div>';
        return $data;
    } 
}
?>
