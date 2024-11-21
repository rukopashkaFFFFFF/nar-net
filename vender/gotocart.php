<?php
session_start();
require_once("connect.php");

$fruit = $_POST["fruit"];
$amount = $_POST["amount"];
$status = 'В обработке';
$login = $_SESSION['login'];

$result = mysqli_query($conn,"INSERT INTO pavel.goods (name, amount, status, login) VALUES ('$fruit', '$amount', '$status', '$login')");

if ($result) {
    $_SESSION['message'] = 'Товар добавлен в корзину!';
    header('Location: ../profile.php');
    exit();
} else {
    $_SESSION['message'] = 'Ошибка при добавлении товара в корзину: ' . $result->error; // Добавляем вывод ошибки
}

?>