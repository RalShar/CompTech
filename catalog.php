<?php
session_start();
include("assets/function/config.php");
include("assets/function/function.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompTech</title>
    <link rel="stylesheet" href="assets/css/catalog.css">
    <link rel="stylesheet" href="assets/css/headfont.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
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
        <img
          src="assets/img/logo.png"
          alt="logo"
          class="logo"
          onclick="location.href='index.php'"
        />
        <button class="catalogbut" onclick="location.href='catalog.html'">
          <span>Каталог</span
          ><img src="assets/img/catalog.png" alt="catalog" />
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
          <button type="button" onclick="location.href='cart.html'">
            <img src="assets/img/Shopping_Card-192x192.png" alt="cart" />
            <span>Корзина</span>
          </button>
          <button type="button" onclick="location.href='fav.html'">
            <img src="assets/img/Heart-192x192.png" alt="fav" />
            <span>Избранное</span>
          </button>
        </nav>
      </div>
    </div>
  </header>
      <div id="myModal" class="modal">
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
      <div class="catalog">
<div class="filter">
  <h2>Фильтры</h2>
<div>
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
      <input type="checkbox" value="videocard">
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
      <input type="checkbox" value="ASUS">
      Kingston
    </label>
    <label>
      <input type="checkbox" value="Zalman">
      Zalman
    </label>
    <label>
      <input type="checkbox" value="MSI">
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
</div>
</div>
<?=fncatalog('all')?> 
</div>
    </section>
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
          </body>
          </html>