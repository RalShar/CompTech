<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>ComputerS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
</head>

<body class="main">
    <main>
        <div class="formcont">
            <form action="function/logincont.php" method="post">
                <p>Войти</p>
                <div class="inputs">
                    <div class="inpt">
                        <input placeholder="Email" type="email" required name="login">
                        <input placeholder="Пароль" type="password" required name="password">
                    </div>
                    <div class="logbtn">
                        <button type="submit">
                            Войти
                        </button>
                    </div>
                    <a href="reg.php">Вперывые здесь? Зарегистрироваться</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>