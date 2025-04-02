<?php
session_start();
include("assets/function/config.php"); // Подключение БД
include("assets/function/function.php"); //Подключение функций php
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="assets/css/catalog.css">
    <link rel="stylesheet" href="assets/css/headfont.css"> <!--CSS Для шапки и футера-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    /> <!--Подключение шрифта-->
</head>
<body>
     <header>
    <div class="headup">
      <nav>
        <a href="about.html">О нас</a>
        <a href="guarantee.html">Гарантии и возврат</a>
        <a href="FAQ.html">FAQ</a>
        <a href="delivery.html">Доставка и оплата</a>
        <a href="contacts.html">Контакты</a>
      </nav>
    </div>
    <div class="headdowncont">
      <div class="headdown">
       <button class="mobmenu_but" onClick="openNav()"><img src="assets/img/Sorting Left.png" alt="menu_mobile"></button>
        <img src="assets/img/logo.png" alt="logo" class="logo" onclick="location.href='index.php'" />
<button class="catalogbut" onclick="location.href='catalog.php'">
        <span>Каталог</span><img src="assets/img/catalog.png" alt="catalog" />
      </button>
        <div class="search">
          <input type="text" placeholder="Поиск" />
          <img src="assets/img/Search.png" alt="searchicon" />
        </div>
        <nav class="headbtns">
          <button type="button" onclick="location.href='profile.php'">
            <img src="assets/img/Profile_Circle-192x192.png" alt="profile" />
            <span>Профиль</span>
          </button>
          <button type="button" onclick="location.href='cart.php'">
            <img src="assets/img/Shopping_Card-192x192.png" alt="cart" />
            <span>Корзина</span>
          </button>
          <button type="button" onclick="location.href='fav.php'">
            <img src="assets/img/Heart-192x192.png" alt="fav" />
            <span>Избранное</span>
          </button>
        </nav>
      </div>
    </div>
	  <div id="mySidenav" class="sidenav">
		  <div class="sideup">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img src="assets/img/Close - 192x192.png" alt="sideclose"></a>
			  </div>
		  <div class="sidesearch">
		  <input type="text">
		  <img src="assets/img/Search.png" alt="sidesearch">
		  </div>
		  <div class="sidea">
  <a href="about.html">О компании</a>
  <a href="delivery.html">Доставка и оплата</a>
  <a href="guarantee.html">Гарантии и возврат</a>
  <a href="FAQ.html">FAQ</a>
  <a href="contacts.html">Контакты</a>
			  </div>
</div>
	  <div id="overlay" class="overlay" onclick="closeNav()"></div>
  </header>
		  <div id="mySidefil" class="sidenav1">
		  <div class="sideup1">
			   <div class="closena">
  <a href="javascript:void(0)" class="closebtn1" onclick="closeNav1()"><img src="assets/img/Close - 192x192.png" alt="sideclose"></a>
			  <p>Закрыть</p>
			  </div>
			  </div>
		  <div class="sidefil">
			  <h2>Фильтры</h2>
<div class="sidefilin">
  <h3 class="filthead">Цена</h3>
  <div class="priceinput">
    <input type="number">
    <input type="number">
  </div>
  <div class="type">
    <h3>Тип</h3>
    <label>
      <input type="checkbox" value="case">
      Корпус
    </label>
    <label>
      <input type="checkbox" value="cpu">
      Процессор
    </label>
    <label>
      <input type="checkbox" value="gpu">
      Видеокарта
    </label>
    <label>
      <input type="checkbox" value="ssd">
      SSD
    </label>
  </div>
  <div class="manufacturer">
    <h3>Производитель</h3>
    <label>
      <input type="checkbox" value="Kingston">
      Kingston
    </label>
    <label>
      <input type="checkbox" value="Zalman">
      Zalman
    </label>
    <label>
      <input type="checkbox" value="Intel">
      Intel
    </label>
    <label>
      <input type="checkbox" value="Nvidia">
      Nvidia
    </label>
    <label>
      <input type="checkbox" value="Seagate">
      Seagate
    </label>
  </div>
	<button id="applyFilters" onclick="applyFilters()">Применить фильтры</button>
	  <button id="resetFilters" onclick="resetFilters()">Сбросить фильтры</button>
</div>
			  </div>
		 
</div>
      <div id="myModal" class="modal"><!--Модальное окно-->
        <!-- Контент в модальном окне -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <div class="obrat">
            <h1>Обратная связь</h1>
            <form class="obratform" action="assets/function/feedback.php" method="POST">
            <input type="email" placeholder="E-mail" name="email">
            <input type="text" placeholder="Имя" name="name">
            <textarea placeholder="Сообщение" name="message"></textarea>
            <button type="submit">Отправить</button>
          </form>
          </div>
        </div>
      </div>
    <section class="catasec">
      <h1>Каталог</h1>
		<button class="filters" onClick="openNav1()">Фильтры</button>
      <div class="catalog">
<div class="filter"><!--Фильтры-->
  <h2>Фильтры</h2>
  <div>
    <h3 class="filthead">Цена</h3>
    <div class="priceinput">
      <input type="number" name="min" placeholder="" value="0">
      <input type="number" name="max" placeholder="" value="0">
    </div>
    <div class="type">
      <h3>Тип</h3>
      <label>
        <input type="checkbox" value="case">
        Корпус
      </label>
      <label>
        <input type="checkbox" value="cpu">
        Процессор
      </label>
      <label>
        <input type="checkbox" value="gpu">
        Видеокарта
      </label>
      <label>
        <input type="checkbox" value="ssd">
        SSD
      </label>
    </div>
    <div class="manufacturer">
      <h3>Производитель</h3>
      <label>
        <input type="checkbox" value="Kingston">
        Kingston
      </label>
      <label>
        <input type="checkbox" value="Zalman">
        Zalman
      </label>
      <label>
        <input type="checkbox" value="Intel">
        Intel
      </label>
      <label>
        <input type="checkbox" value="MSI">
        MSI
      </label>
      <label>
        <input type="checkbox" value="Seagate">
        Seagate
      </label>
    </div>
    <button id="applyFilters" onclick="applyFilters()">Применить фильтры</button>
	  <button id="resetFilters" onclick="resetFilters()">Сбросить фильтры</button>
  </div>
</div>
<div class="catalog-container">
<?=fncatalog('all')?> <!--Список товаров-->
		  </div>
</div>
    </section>
	<div class="icon-bar">
    <a href="catalog.php"><img src="assets/img/Category.png" alt="catalog">Каталог</a>
    <a href="profile.php"><img src="assets/img/Profile_Circle-192x192.png" alt="profile">Профиль</a>
    <a href="cart.php"><img src="assets/img/Shopping_Card-192x192.png" alt="cart">Корзина</a>
    <a href="fav.php"><img src="assets/img/Heart-192x192.png" alt="favorites">Избранное</a>
  </div>
    <footer>
      <div class="foot">
        <div class="tel">
          <a href="tel:79457854558">7-945-785-45-58</a>
          <a href="tel:79457552511">7-945-755-25-11</a>
          <p>Бесплатно по России</p>
        </div>
        <div class="links1">
          <a href="about.html">О компании</a>
          <a href="delivery.html">Доставка и оплата</a>
          <a href="guarantee.html">Гарантии и возврат</a>
          <a href="contacts.html">Контакты</a>
          <div class="soc">
            <img src="assets/img/vk.png" alt="vk" />
            <img src="assets/img/telegram.png" alt="telegram" />
            <img src="assets/img/youtube.png" alt="youtube" />
          </div>
        </div>
        <div class="links2">
          <a href="">Что с моим заказом?</a>
          <a href="FAQ.html">FAQ</a>
          <a id="myBtn" style="cursor:pointer;">Обратная связь</a><!--Вызов модального окна-->
          <div class="paymet">
            <img src="assets/img/mastercard.png" alt="mastercard" />
            <img src="assets/img/Visa.png" alt="Visa" />
            <img src="assets/img/Mir.png" alt="mir" />
          </div>
        </div>
      </div>
    </footer>
          <script>
            // Get the modal
          var modal = document.getElementById("myModal");
          
          // Get the button that opens the modal
          var btn = document.getElementById("myBtn");
          
          // Get the <span> element that closes the modal
          var span = document.getElementsByClassName("close")[0];
          
          // When the user clicks on the button, open the modal
          btn.onclick = function() {
            modal.style.display = "block";
          }
          
          // When the user clicks on <span> (x), close the modal
          span.onclick = function() {
            modal.style.display = "none";
          }
          
          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          } 
          </script>
          <script>
function addToCart(button) {
    var productId = button.value; // Получаем id_product из кнопки
    var xhr = new XMLHttpRequest(); // Создаем новый XMLHttpRequest объект
    xhr.open("POST", "assets/function/add-order.php", true); // Указываем метод и URL
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Устанавливаем заголовок

    // Обработка ответа от сервера
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Если успешно, выводим ответ
            alert(xhr.responseText);
        } else {
            alert("Произошла ошибка: " + xhr.status);
        }
    };

    // Отправляем данные на сервер
    xhr.send("id_product=" + encodeURIComponent(productId));
}
</script>
<script>
function addToFav(button) {
    var productId = button.value; // Получаем id_product из кнопки
    var xhr = new XMLHttpRequest(); // Создаем новый XMLHttpRequest объект
    xhr.open("POST", "assets/function/addfav.php", true); // Указываем метод и URL
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Устанавливаем заголовок

    // Обработка ответа от сервера
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Если успешно, выводим ответ
            alert(xhr.responseText);
        } else {
            alert("Произошла ошибка: " + xhr.status);
        }
    };

    // Отправляем данные на сервер
    xhr.send("id_product=" + encodeURIComponent(productId));
}
	function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("overlay").style.display = "block"; // Показываем затемнение
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("overlay").style.display = "none"; // Скрываем затемнение
}
	function openNav1() {
  document.getElementById("mySidefil").style.width = "100%";
}

function closeNav1() {
  document.getElementById("mySidefil").style.width = "0";
}// Функция применения фильтров
function applyFilters() {
    // 1. Собираем актуальные значения фильтров
    const filters = {
        min_price: document.querySelector('input[name="min"]').value,
        max_price: document.querySelector('input[name="max"]').value,
        types: [],
        manufacturers: []
    };

    // 2. Собираем только отмеченные чекбоксы
    document.querySelectorAll('.type input[type="checkbox"]:checked').forEach(cb => {
        filters.types.push(cb.value);
    });
    
    document.querySelectorAll('.manufacturer input[type="checkbox"]:checked').forEach(cb => {
        filters.manufacturers.push(cb.value);
    });

    // 3. Отправка запроса
    fetch('assets/function/apply_filters.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'filters=' + encodeURIComponent(JSON.stringify(filters))
    })
    .then(response => response.text())
    .then(html => {
        document.getElementById('all').innerHTML = html;
    })
    .catch(error => console.error('Ошибка:', error));
}

// Функция полного сброса фильтров
function resetFilters() {
    // 1. Сбрасываем все поля ввода
    document.querySelectorAll('input[name="min"], input[name="max"]').forEach(input => {
        input.value = '';
    });

    // 2. Снимаем все чекбоксы
    document.querySelectorAll('.filter input[type="checkbox"]').forEach(checkbox => {
        checkbox.checked = false;
    });

    // 3. Применяем пустые фильтры
    applyFilters();
}
	function resetFilters() {
    // Сбрасываем все чекбоксы
    document.querySelectorAll('.filter input[type="checkbox"]').forEach(checkbox => {
        checkbox.checked = false;
    });
    
    // Сбрасываем поля цены
    document.querySelector('input[name="min"]').value = '';
    document.querySelector('input[name="max"]').value = '';
    
    // Применяем пустые фильтры
    applyFilters();
}
</script>
          </body>
          </html>