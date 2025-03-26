<?php
session_start();
include("assets/function/config.php");
include("assets/function/function.php");
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/fav.css" />
    <link rel="stylesheet" href="assets/css/headfont.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>CompTech</title>
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
    <div id="myModal" class="modal">
      <!-- Контент в модальном окне -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <div class="obrat">
          <h1>Обратная связь</h1>
          <form class="obratform">
          <input type="email" placeholder="E-mail">
          <input type="text" placeholder="Имя">
          <textarea placeholder="Сообщение"></textarea>
          <button type="submit">Отправить</button>
        </form>
        </div>
      </div>
    </div>
    <section class="fav">
<div class="favs">
    <h1>Избранное</h1>
    <?=fnfav()?>   
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
          <a id="myBtn" style="cursor:pointer;">Обратная связь</a>
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
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');

            if (confirm('Вы уверены, что хотите удалить этот товар из избранного?')) {
                fetch('assets/function/delete-fav.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id_product: productId }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Товар успешно удален из избранного.');
                        // Здесь можно обновить интерфейс, чтобы убрать удаленный товар
                        location.reload(); // Перезагрузите страницу или удалите элемент из DOM
                    } else {
                        alert('Ошибка при удалении товара: ' + data.error);
                    }
                })
                .catch(error => console.error('Ошибка:', error));
            }
        });
    });
});
		function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("overlay").style.display = "block"; // Показываем затемнение
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("overlay").style.display = "none"; // Скрываем затемнение
}
</script>
  </body>
</html>
