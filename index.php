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
    <link rel="stylesheet" href="assets/css/index.css">
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
        <button class="catalogbut" onclick="location.href='catalog.php'">
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
          <button type="button" onclick="location.href='cart.php'">
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
            <form class="obratform" action="assets/function/feedback.php" method="POST">
            <input type="email" placeholder="E-mail" name="email">
            <input type="text" placeholder="Имя" name="name">
            <textarea placeholder="Сообщение" name="message"></textarea>
            <button type="submit">Отправить</button>
          </form>
          </div>
        </div>
      </div>
      <div class="banner">
        <img src="assets/img/index.png" alt="banner">
      </div>
      <section class="tabcont">
        <div class="tabs">
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'all')" id="defaultOpen">Всё</button>
            <button class="tablinks" onclick="openCity(event, 'cpu')">Процессоры</button>
            <button class="tablinks" onclick="openCity(event, 'mother')">Материнские платы</button>
            <button class="tablinks" onclick="openCity(event, 'gpu')">Видеокарты</button>
            <button class="tablinks" onclick="openCity(event, 'hdd')">HDD</button>
            <button class="tablinks" onclick="openCity(event, 'ssd')">SSD</button>
            <button class="tablinks" onclick="openCity(event, 'ram')">Оперативная память</button>
            <button class="tablinks" onclick="openCity(event, 'case')">Корпуса</button>
          </div>
        </div>
          <!-- Tab content --> 
          <?=fnindex('all')?>    
          <?=fnindex('cpu')?>  
          <?=fnindex('mother')?>   
          <?=fnindex('gpu')?>  
          <?=fnindex('hdd')?>  
          <?=fnindex('ssd')?>  
          <?=fnindex('ram')?>  
          <?=fnindex('case')?>                                       
    </section>
    <section class="actualconte">
      <h1>Актуально сейчас</h1>
      <hr>
      <div class="actual">
      <div class="actualcont">
        <div class="actual1">
          <div class="text">
<p>Материнские платы</p>
<p>LGA 1700</p>
          </div>
          <img src="assets/img/2.webp" alt="category">
        </div>
      </div>
      <div class="actualcont">
        <div class="actual2">
          <div class="text">
<p>Процессоры</p>
<p>Intel Core i5</p>
          </div>
          <img src="assets/img/1.webp" alt="category">
        </div>
      </div>
      <div class="actualcont">
        <div class="actual3">
          <div class="text">
<p>Корпуса</p>
<p>Zalman</p>
          </div>
          <img src="assets/img/6.png" alt="category">
        </div>
      </div>
        </div> 
    </section>
    <section class="tabcont">
      <h1>Новинки</h1>
      <div class="tabs">
      <div class="tab">
          <button class="tablinks2" onclick="openCity2(event, 'all2')" id="defaultOpen2">Всё</button>
          <button class="tablinks2" onclick="openCity2(event, 'cpu1')">Процессоры</button>
          <button class="tablinks2" onclick="openCity2(event, 'mother1')">Материнские платы</button>
          <button class="tablinks2" onclick="openCity2(event, 'gpu1')">Видеокарты</button>
          <button class="tablinks2" onclick="openCity2(event, 'hdd1')">HDD</button>
          <button class="tablinks2" onclick="openCity2(event, 'ssd1')">SSD</button>
          <button class="tablinks2" onclick="openCity2(event, 'ram1')">Оперативная память</button>
          <button class="tablinks2" onclick="openCity2(event, 'case1')">Корпуса</button>
        </div>
      </div>
        <!-- Tab content -->
        <?=fnindexnew('all2')?>    
          <?=fnindexnew('cpu1')?>  
          <?=fnindexnew('mother1')?>   
          <?=fnindexnew('gpu1')?>  
          <?=fnindexnew('hdd1')?>  
          <?=fnindexnew('ssd1')?>  
          <?=fnindexnew('ram1')?>  
          <?=fnindexnew('case1')?> 
  </section>
  <section class="tabcont">
    <h1>Новости и обзоры</h1>
    <div class="tabs">
    <div class="tab">
        <button class="tablinks3" onclick="openCity3(event, 'all1')" id="defaultOpen3">Всё</button>
        <button class="tablinks3" onclick="openCity3(event, 'news')">Новости</button>
        <button class="tablinks3" onclick="openCity3(event, 'review')">Обзоры</button>
      </div>
    </div>
      <!-- Tab content -->
      <div id="all1" class="tabcontent3">
        <div class="tabnews tabnews2">
          <div class="tabvec2 tabvec1">
            <p>Intel представила Arc B580 и Arc B570</p>
            <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
          </div>
      </div>
      <div class="tabnews">
        <div class="tabvec2">
          <p>Intel представила Arc B580 и Arc B570</p>
          <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
        </div>
    </div>
    <div class="tabnews tabnews2">
      <div class="tabvec2 tabvec1">
        <p>Intel представила Arc B580 и Arc B570</p>
        <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
      </div>
  </div>
  <div class="tabnews">
    <div class="tabvec2">
      <p>Intel представила Arc B580 и Arc B570</p>
      <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
    </div>
</div>
<div class="tabnews tabnews2">
  <div class="tabvec2 tabvec1">
    <p>Intel представила Arc B580 и Arc B570</p>
    <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
  </div>
</div>
      </div>  
        <div id="news" class="tabcontent3">
          <div class="tabnews tabnews2">
            <div class="tabvec2 tabvec1">
              <p>Intel представила Arc B580 и Arc B570</p>
              <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
            </div>
        </div>
        <div class="tabnews tabnews2">
          <div class="tabvec2 tabvec1">
            <p>Intel представила Arc B580 и Arc B570</p>
            <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
          </div>
      </div>
      <div class="tabnews tabnews2">
        <div class="tabvec2 tabvec1">
          <p>Intel представила Arc B580 и Arc B570</p>
          <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
        </div>
    </div>
    <div class="tabnews tabnews2">
      <div class="tabvec2 tabvec1">
        <p>Intel представила Arc B580 и Arc B570</p>
        <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
      </div>
  </div>
  <div class="tabnews tabnews2">
    <div class="tabvec2 tabvec1">
      <p>Intel представила Arc B580 и Arc B570</p>
      <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
    </div>
</div>
    </div>
      <div id="review" class="tabcontent3">
        <div class="tabnews">
          <div class="tabvec2">
            <p>Intel представила Arc B580 и Arc B570</p>
            <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
          </div>
      </div>
      <div class="tabnews">
        <div class="tabvec2">
          <p>Intel представила Arc B580 и Arc B570</p>
          <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
        </div>
    </div>
    <div class="tabnews">
      <div class="tabvec2">
        <p>Intel представила Arc B580 и Arc B570</p>
        <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
      </div>
  </div>
  <div class="tabnews">
    <div class="tabvec2">
      <p>Intel представила Arc B580 и Arc B570</p>
      <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
    </div>
</div>
<div class="tabnews">
  <div class="tabvec2">
    <p>Intel представила Arc B580 и Arc B570</p>
    <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
  </div>
</div>
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
        function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "flex";
  evt.currentTarget.className += " active";
} 
    </script>
<script>
  function openCity2(evt, cityName2) {
    // Declare all variables
    var a, tabcontent2, tablinks2;
  
    // Get all elements with class="tabcontent2" and hide them
    tabcontent2 = document.getElementsByClassName("tabcontent2");
    for (a = 0; a < tabcontent2.length; a++) {
      tabcontent2[a].style.display = "none";
    }
  
    // Get all elements with class="tablinks2" and remove the class "active"
    tablinks2 = document.getElementsByClassName("tablinks2");
    for (a = 0; a < tablinks2.length; a++) {
      tablinks2[a].className = tablinks2[a].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName2).style.display = "flex";
    evt.currentTarget.className += " active";
  }
  </script>
  
        
        <script>
          function openCity3(evt, cityName3) {
            // Declare all variables
            var q, tabcontent3, tablinks3;
          
            // Get all elements with class="tabcontent3" and hide them
            tabcontent3 = document.getElementsByClassName("tabcontent3");
            for (q = 0; q < tabcontent3.length; q++) {
              tabcontent3[q].style.display = "none";
            }
          
            // Get all elements with class="tablinks3" and remove the class "active"
            tablinks3 = document.getElementsByClassName("tablinks3");
            for (q = 0; q < tablinks3.length; q++) {
              tablinks3[q].className = tablinks3[q].className.replace(" active", "");
            }
          
            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName3).style.display = "flex";
            evt.currentTarget.className += " active";
          }
          </script>
          
          
    <script>
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        document.getElementById("defaultOpen2").click();
        document.getElementById("defaultOpen3").click();
        </script>
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