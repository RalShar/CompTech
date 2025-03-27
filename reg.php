<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet preload" href="assets/css/reg.css">
    <title>ComputerS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
<script>
const password = document.getElementById('password');
const passwordRepeat = document.getElementById('password-repeat');
const form = document.querySelector("form");
const errorMessage = document.createElement("p");
errorMessage.style.color = "red";
errorMessage.style.display = "none"; // Скрыть сообщение об ошибке по умолчанию
form.appendChild(errorMessage);

const checkPassword = () => {
    if (password.value !== passwordRepeat.value) {
        errorMessage.textContent = "Пароли не совпадают!";
        errorMessage.style.display = "block"; // Показать сообщение об ошибке return false;
    } else {
        errorMessage.style.display = "none"; // Скрыть сообщение об ошибке
        return true;
    }
};

document.querySelector(".send").addEventListener("click", (event) => {
    if (!checkPassword()) {
        event.preventDefault(); // Предотвратить отправку формы, если пароли не совпадают
    }
});
</script>
    <main>
		<section>
        <div class="formcont">
            <form action="assets/function/registration.php" method="post">
                <p>Регистрация</p>
                <div class="inputs">
                    <div class="inpt">
                        <input placeholder="Email" type="email" required name="login" id="login">
                        <input placeholder="Пароль" type="password" required name="password" id="password">
                        <input placeholder="Повторите пароль" type="password" required id="password-repeat">
                        <input placeholder="Номер телефона" type="tel" required name="tel" id="tel">
                        <input placeholder="ФИО" type="full_name" required name="full_name" id="full_name">
                    </div>
                    <div class="logbtn">
                        <button type="submit" class="send">
                            Зарегистрироваться
                        </button>
                    </div>
                    <a href="login.php">Уже есть аккаунт? Войти</a>
                </div>
				</section>
            </form>
        </div>
    </main>
</body>

</html>
