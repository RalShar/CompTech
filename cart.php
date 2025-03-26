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
    <link rel="stylesheet" href="assets/css/cart.css" />
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
        <section class="cartcont">
            <div class="cart">
        <div class="tovarcont">
            <h1>Корзина</h1>
            <?=fnOutCardsUser()?>   
    <div class="tovleft">  
      <div class="order">
<h1>Оформление заказа</h1>
<form class="ordercont" id="myForm" action="assets\function\oform.php" method="POST">
<div class="town">
  <p>Город Доставки</p>
  <input type="text" placeholder="Город" value="Москва" name="city" id="city" required>
</div>
<div class="checkscont">
<p>Способ получения</p>
<div class="checks">
  <div class="deliv1">
    <label>
      <input type="radio" name="delivery_option" value="delivery" id="delivery" checked>
      <div class="word_opts">
        <p>Доставка</p>
        <p>490 руб/завтра</p>
      </div>
    </label>
  </div>
  <div class="deliv2">
    <label>
      <input type="radio" name="delivery_option" value="fromshop" id="fromshop">
      <div class="word_opts">
        <p>Самовывоз</p>
        <p>Бесплатно</p>
      </div>
    </label>
  </div>
</div>
</div>
<div id="delivery_adress" class="delivery_adress">
  <p>Адрес доставки</p>
  <input placeholder="Адрес" type="text" name="adress" id="adress">
  <div class="delad">
    <input placeholder="Подъезд" type="text" name="section" id="section">
    <input placeholder="Этаж" type="text" name="floor" id="floor">
    <input placeholder="Квартира/Офис" type="text" name="room" id="room">
  </div>
</div>
<div class="payment_method">
  <p>Способ оплаты</p>
  <div class="checks">
    <div class="deliv1">
      <label>
        <input type="radio" name="payment_method" value="cash">
        <div class="word_opts">
          <p>Наличными</p>
          <p>Оплата наличными при получении заказа</p>
        </div>
      </label>
    </div>
    <div class="deliv2">
      <label>
        <input type="radio" name="payment_method" value="online">
        <div class="word_opts">
          <p>Онлайн</p>
          <p>Безопасная оплата банковской картой онлайн</p>
        </div>
      </label>
      </div>
    </div>
</div>
<div class="personal_data">
  <p>Контактные данные</p>
<div class="personal1">
<input type="text" placeholder="ФИО" name="full_name" required>
<input type="email" placeholder="Email" name="email" required>
</div>
<div class="personal2">
  <input type="tel" placeholder="Телефон" name="tel" required>
  <input type="tel" placeholder="Телефон(дополнительный)" name="tel2">
  </div>
</div>
<div class="comments">
<p>Дополнительная информация</p>
<textarea name="comment" id="comment">
  Комментарий к заказу
  </textarea>
</div>
</form>
      </div>
    </div>
        </div>
        <div class="buy">
            <div class="txt1">
                <p>Ваши товары(2)</p>
                <p>13 680₽</p>
            </div>
            <div class="txt1">
                <p>Способ получения</p>
                <p>Доставка</p>
            </div>
            <div class="txt1">
                <p>Стоимость доставки</p>
                <p>480₽</p>
            </div>
            <hr>
            <div class="txt2 txt1">
                <p>Итого к опалте</p>
                <p>14 160₽</p>
            </div>
            <button type="submit" id="submitButton">Оформить заказ</button>
            <p class="txt3">Нажимая на кнопку "Оформить заказ", Вы соглашаетесь с условиями оферты и политики конфиденциальности</p>
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
    document.addEventListener('DOMContentLoaded', function() {
    const favoriteButtons = document.querySelectorAll('.favorite');

    favoriteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');

            fetch('assets/function/add-to-favorites.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id_product: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Товар добавлен в избранное!');
                } else {
                    alert('Ошибка: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Ошибка:', error);
            });
        });
    });
});
    </script>
    <script>
document.addEventListener('DOMContentLoaded', () => {
    // Находим все элементы с классом .number-input (это ваши инпуты количества)
    const quantityInputs = document.querySelectorAll('.quantity-input');

    quantityInputs.forEach(input => {
        const productId = input.getAttribute('data-id'); // Получаем id продукта из атрибута data-id
        const increaseButton = input.nextElementSibling; // Кнопка увеличения
        const decreaseButton = input.previousElementSibling; // Кнопка уменьшения

        // Обработчик для кнопки увеличения
        increaseButton.addEventListener('click', () => {
            input.value = parseInt(input.value) + 1; // Увеличиваем значение
            updateQuantity(productId, input.value); // Обновляем количество на сервере
        });

        // Обработчик для кнопки уменьшения
        decreaseButton.addEventListener('click', () => {
            input.value = Math.max(0, parseInt(input.value) - 1); // Уменьшаем значение, не ниже 0
            updateQuantity(productId, input.value); // Обновляем количество на сервере
        });

        // Обработчик для изменения значения в input
        input.addEventListener('change', () => {
            updateQuantity(productId, input.value); // Обновляем количество на сервере
        });
    });

    // Функция для отправки AJAX-запроса на обновление количества
    function updateQuantity(productId, newCount) {
      fetch('assets/function/update-order.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id_product: productId, count: newCount }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Количество обновлено успешно');
            } else {
                console.error('Ошибка при обновлении количества');
            }
        })
        .catch(error => console.error('Ошибка:', error));
    }
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');

            if (confirm('Вы уверены, что хотите удалить этот товар из корзины?')) {
                fetch('assets/function/delete-item.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id_product: productId }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Товар успешно удален из корзины.');
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
</script>
     <script>
      const deliveryRadio = document.getElementById('delivery');
      const fromShopRadio = document.getElementById('fromshop');
      const input1 = document.getElementById('adress');
      const input2 = document.getElementById('section');
      const input3 = document.getElementById('floor');
      const input4 = document.getElementById('room');
  
      // Функция для обновления атрибута required
      function updateRequiredFields() {
          if (deliveryRadio.checked) {
              input1.setAttribute('required', 'required');
              input2.setAttribute('required', 'required');
              input3.setAttribute('required', 'required');
              input4.setAttribute('required', 'required');
          } else {
              input1.removeAttribute('required');
              input2.removeAttribute('required');
              input3.removeAttribute('required');
              input4.removeAttribute('required');
          }
      }
  
      // Добавляем обработчики событий change для радиокнопок
      deliveryRadio.addEventListener('change', updateRequiredFields);
      fromShopRadio.addEventListener('change', updateRequiredFields);
  </script>
  
  <script>
    document.getElementById('submitButton').addEventListener('click', function() {
        // Получаем форму
        const form = document.getElementById('myForm');
        
        // Проверяем, валидна ли форма
        if (form.checkValidity()) {
            // Если форма валидна, отправляем её
            form.submit();
        } else {
            // Если форма не валидна, показываем сообщения об ошибках
            form.reportValidity();
        }
    });
</script>
<script>
  const deliveryRadio1 = document.getElementById('delivery'); // Радиокнопка "Доставка"
  const fromShopRadio1 = document.getElementById('fromshop'); // Радиокнопка "Самовывоз"
  const deliveryAddressDiv = document.getElementById('delivery_adress'); // Блок с адресом доставки

  // Функция для обновления видимости блока с адресом доставки
  function updateDeliveryAddressVisibility() {
      if (deliveryRadio1.checked) {
          deliveryAddressDiv.style.display = 'block'; // Показываем блок
      } else {
          deliveryAddressDiv.style.display = 'none'; // Скрываем блок
      }
  }

  // Добавляем обработчики событий change для радиокнопок
  deliveryRadio1.addEventListener('change', updateDeliveryAddressVisibility);
  fromShopRadio1.addEventListener('change', updateDeliveryAddressVisibility);
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
