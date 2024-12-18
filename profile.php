<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header("Location: /login.php");
        exit;
    }
    ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/profile.css" />
    <link rel="stylesheet" href="assets/css/headfont.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
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
          <img
          src="assets/img/logo.png"
            alt="logo"
            class="logo"
            onclick="location.href='index.html'"
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
    <main>
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
        <section>
        <div class="profile">
            <h1>Личный кабинет</h1>
<div class="profcont">
<h2>Профиль</h2>
<div class="aboutme">
    <h2>Обо мне</h2>
    <form>
        <label class="lab1">
            Имя
            <input type="text">
        </label>
        <label class="lab2">
            Фамилия
            <input type="text">
        </label>
        <label class="lab2">Отчество
            <input type="text">
        </label>
        <div class="sex">
<p>Пол</p> 
<div class="sbtns">
<button type="button">Мужской</button> 
<button type="button">Женский</button>
</div>
</div>
        <label class="lab3">
            Мобильный<br> телефон
            <input type="tel">
        </label>
        <label class="lab4">
            E-mail
            <input type="email">
        </label>
        <div class="check">
        <p>Расылка</p>
        <div class="chks">
        <div class="chk"><input type="checkbox"><p>Согласие на смс рассылку</p></div>
        <div class="chk"><input type="checkbox"><p>Согласие на E-mail рассылку</p></div>
    </div>
    </div>
    </form>
    <div class="save">
    <button type="submit">Сохранить изменения</button>
</div>
</div>
</div>
<hr>
        </div>
    </section>
    </main>
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