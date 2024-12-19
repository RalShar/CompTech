<?php
session_start();
include("../assets/function/function.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="https://unpkg.com/98.css" />
    <title>RalShar's page</title>
</head>
<body>
<section class="adminwindow">
    <div class="nav">
        <div class="nav2">
            <div class="button1" style="position: relative; top: 0; left: 0" onmousedown="dragOBJ(this,event); return false;">
                <button ondblclick="location.href='../index.php'">
                    <img src="../assets/img/home.png">
                    <p>На главную</p>
                </button>
            </div>
            <div class="button1 toggleButton" style="position: relative; top: 0; left: 0" onmousedown="dragOBJ(this,event); return false;" data-target="content1">
                <button ondblclick="location.href='#'">
                    <img src="../assets/img/check-0.png">
                    <p>Подтверждение заказов</p>
                </button>
            </div>
        </div>
        <div class="button2 toggleButton" style="position: relative; top: 0; left: 0" onmousedown="dragOBJ(this,event); return false;" data-target="content2">
            <button ondblclick="location.href='#'">
                <img src="../assets/img/add.png">
                <p>Добавить товар</p>
            </button>
        </div>
    </div>
    <div class="window2 upload content" style="position: relative; top: 0; left: 0" id="content2">
        <div class="title-bar" onmousedown="dragOBJ(this.parentNode, event); return false;">
            <div class="title-bar-text">
                Добавить товар
            </div>
            <div class="title-bar-controls">
                <button aria-label="Minimize"></button>
                <button aria-label="Maximize"></button>
                <button aria-label="Close" class="closeButton"></button>
            </div>
        </div>
        <div class="window-body">
            <form action="../assets/function/process-add-product.php" method="post" enctype="multipart/form-data">
                <div class="inputs">
                    <label for="name">Название:</label>
                    <input type="text" name="name" required>

                    <label for="price">Цена:</label>
                    <input type="number" name="price" required>
                </div>
                <div class="inputs1">
                    <label for="type">Тип:</label>
                    <input type="text" name="type" required>

                    <label for="manufacturer">Производитель:</label>
                    <input type="text" name="manufacturer" required>
                </div>
                <div class="inputs2">
                    <label for="description">Описание:</label>
                    <textarea name="description" required></textarea>

                    <input id="file-input" type="file" name="img" class="input-file" required>
                </div>

                <button type="submit" class="sub">Добавить товар</button>
            </form>
        </div>
        <div class="status-bar">
            <p class="status-bar-field">Admin Panel</p>
            <p class="status-bar-field">Powered by 98.css</p>
            <p class="status-bar-field">CPU Usage: 14%</p>
        </div>
    </div>

    <div class="window content" style="position: relative; top: 0; left: 0" onmousedown="dragOBJ(this,event); return false;" id="content1">
        <div class="title-bar">
            <div class="title-bar-text">
                Подтверждение заказов
            </div>
            <div class="title-bar-controls">
                <button aria-label="Minimize"></button>
                <button aria-label="Maximize"></button>
                <button aria-label="Close" class="closeButton"></button>
            </div>
        </div>
        <div class="window-body">
        <?=fnOutCardsAdmin()?>
        </div>
        <div class="status-bar">
            <p class="status-bar-field">Admin Panel</p>
            <p class="status-bar-field">Powered by 98.css</p>
            <p class="status-bar-field">CPU Usage: 14%</p>
        </div>
    </div>              
</section> <!-- Закрывающий тег для section -->
<footer>
    <div class="foot">
        <div class="footbut">
            <button type="submit"><img src="../assets/img/windows-0.png" alt="start"><p>Start</p></button>
            <div class="dropdown-content">
                <a href="#">Ссылка 1</a>
                <a href="#">Ссылка 2</a>
                <a href="#">Ссылка 3</a>
            </div>
        </div>
        <div class="status-bar time">
            <p class="status-bar-field" id="span"></p>
        </div>
    </div>
</footer>
<script>
    // Функция для отображения времени
    var span = document.getElementById('span');
    function time() {
        var d = new Date();
        var m = d.getMinutes();
        var h = d.getHours();
        span.textContent = ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2);
    }
    setInterval(time, 1000);

    // Функции для перетаскивания
    function $(v) { return(document.getElementById(v)); }
    function agent(v) { return(Math.max(navigator.userAgent.toLowerCase().indexOf(v),0)); }
    function xy(e,v) { return(v?(agent('msie')?event.clientY+document.body.scrollTop:e.pageY):(agent('msie')?event.clientX+document.body.scrollTop:e.pageX)); }

    function dragOBJ(d,e) {
        function drag(e) {
            if(!stop) {
                d.style.top = (tX = xy(e, 1) + oY - eY + 'px');
                d.style.left = (tY = xy(e) + oX - eX + 'px');
            }
        }

        var oX = parseInt(d.style.left), oY = parseInt(d.style.top), eX = xy(e), eY = xy(e, 1), tX, tY, stop;

        document.onmousemove = drag;
        document.onmouseup = function() { stop = 1; document.onmousemove = ''; document.onmouseup = ''; };
    }

    // Открытие блоков по двойному клику
    document.querySelectorAll('.toggleButton').forEach(button => {
        button.addEventListener('dblclick', () => {
            const targetId = button.getAttribute('data-target');
            const content = document.getElementById(targetId);
            content.style.display = 'block'; // Показываем блок
        });
    });

    // Закрытие блоков
    document.querySelectorAll('.closeButton').forEach(button => {
        button.addEventListener('click', () => {
            const content = button.closest('.content');
            content.style.display = 'none'; // Скрываем блок
        });
    });
</script>
</body>
</html>
