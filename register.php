<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация и Регистрация</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <form action="vender/signup.php" method="POST">
        <label for="">Ф.И.О</label>
        <input type="text" name="fio" id="fio" placeholder="Введите Ф.И.О">
        <label for="">Логин</label>
        <input type="text" name="login" id="login" placeholder="Введите логин">
        <label for="">Почта</label>
        <input type="email" name="email" id="email" placeholder="Введите логин">
        <label for="">Номер телефона</label>
        <input type="text" name="number" id="number" placeholder="Введите номер">
        <label for="">Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label for=""> Подтверждение Пароля</label>
        <input type="password" name="password_confirn" placeholder="Подтвердите пароль">
        <button type="submit">Войти</button>
        <a href="login.php"> <p>У вас уже есть аккаунт?</p></a>
        <?php
            if($_SESSION['message']) {
                echo '<p class="msg">' .$_SESSION['message']. '</p>';
            }
            unset ($_SESSION['message']);
        ?>
    </form>
</body>
</html>