<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация и Регистрация</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <form action="vender/signin.php" method="POST">
        <label for="">Логин</label>
        <input type="text" name="login" id="login" placeholder="Введите логин">
        <label for="">Пароль</label>
        <input type="password" name="password" id="password" placeholder="Введите пароль">
        <button type="submit">Войти</button>
        <a href="register.php"> <p>Еще не зарегестрированы?</p></a>
        <?php
            if($_SESSION['message']) {
                echo '<p class="msg">' .$_SESSION['message']. '</p>';
            }
            unset ($_SESSION['message']);
        ?>
    </form>
</body>
</html>