<?php

    session_start();
    require_once('connect.php');
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password = md5($password);

    $check_user = mysqli_query($conn, "SELECT 1 FROM `users` WHERE `login` = '$login' AND `password` = '$password' LIMIT 1");

        if (mysqli_num_rows($check_user) > 0) {

            $_SESSION['username'] = $user;
            $user = mysqli_fetch_assoc($check_user);    
          
            $_SESSION['login'] = $login;

            header('Location: ../profile.php');


        } else {
            $_SESSION['message'] = 'Неверный логин или пароль';
            header('Location: ../login.php');
        }
?>