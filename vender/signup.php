<?php
session_start();
require_once("connect.php");

$fio = $_POST['fio'];
$login = $_POST['login'];
$email = $_POST['email'];
$number = $_POST['number'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirn'];

if ($password === $password_confirm) {
    
    // Хешируем пароль
    $password = md5($password); 

    // Запос на вставку пользователя в базу данных
    $result = mysqli_query($conn, "INSERT INTO pavel.users (login, password, fio, number, email) VALUES ('$login', '$password', '$fio', '$number', '$email')");
    
    if ($result) {
        $_SESSION['message'] = 'Регистрация прошла успешно';
        header('Location: ../login.php');
        exit(); // Завершаем выполнение скрипта после редиректа
    } else {
        $_SESSION['message'] = 'Ошибка при регистрации. Попробуйте снова.';
        header('Location: ../register.php');
        exit();
    }

} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../register.php');
    exit(); // Завершаем выполнение скрипта после редиректа
}
?>