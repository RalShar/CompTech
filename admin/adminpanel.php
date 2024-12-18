<?php
    session_start();

    if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
        header("Location: /index.php");
        exit;
    }
    include("../assets/function/function.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="https://unpkg.com/98.css" />
    <title>ComputerS</title>
</head>
<body>
<section class="adminwindow">
    <div class="nav">
        <div class="nav2">
<div class="button1"style="position: relative; top: 0; left: 0" onmousedown="dragOBJ(this,event); return false;">
<button ondblclick="location.href='../index.php'">
    <img src="../assets/img/home.png">
    <p>На главную</p>
</button>
</div>
<div class="button1" style="position: relative; top: 0; left: 0" onmousedown="dragOBJ(this,event); return false;">
<button  ondblclick="location.href='../cart.php'">
    <img src="../assets/img/admincart.png">
    <p>Корзина</p>
</button>
</div>
</div>
<div class="button2"  style="position: relative; top: 0; left: 0" onmousedown="dragOBJ(this,event); return false;">
    <button  ondblclick="location.href='../add-order.php'">
        <img src="../assets/img/order.png">
        <p>Добавить заказ</p>
    </button>
    </div>
    </div>
    <div class="window" style="position: relative; top: 0; left: 0" onmousedown="dragOBJ(this,event); return false;">
        <div class="title-bar">
          <div class="title-bar-text">
           Панель администратора
          </div>
          <div class="title-bar-controls">
            <button aria-label="Minimize"></button>
            <button aria-label="Maximize"></button>
            <button aria-label="Close" onclick="location.href ='/admin/controllers/logout.php'"></button>
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
        </div>
    </div>
</section>
<footer>
    <div class="foot">
        <div class="footbut">
   <button type="submit"><img src="../assets/img/start.png" alt="start"><p>Пуск
   </button>
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
    var span = document.getElementById('span');
function time() {
  var d = new Date();
  var m = d.getMinutes();
  var h = d.getHours();
  span.textContent =
    ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2);
}
setInterval(time, 1000);
</script>
<script>
    function $(v) { return(document.getElementById(v)); }
function agent(v) { return(Math.max(navigator.userAgent.toLowerCase().indexOf(v),0)); }
function xy(e,v) { return(v?(agent('msie')?event.clientY+document.body.scrollTop:e.pageY):(agent('msie')?event.clientX+document.body.scrollTop:e.pageX)); }

function dragOBJ(d,e) {

    function drag(e) { if(!stop) { d.style.top=(tX=xy(e,1)+oY-eY+'px'); d.style.left=(tY=xy(e)+oX-eX+'px'); } }

    var oX=parseInt(d.style.left),oY=parseInt(d.style.top),eX=xy(e),eY=xy(e,1),tX,tY,stop;

    document.onmousemove=drag; document.onmouseup=function(){ stop=1; document.onmousemove=''; document.onmouseup=''; };

}

</script>
</body>
</html>