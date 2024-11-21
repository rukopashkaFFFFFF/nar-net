<?php
session_start();
require_once("vender/connect.php");

// Выполняем запрос к базе данных
$sql = "SELECT * FROM pavel.goods"; // Измените имя таблицы на актуальное
$result = $conn->query($sql);

// Начинаем выводить таблицу
echo "<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Список товаров</title>
    <link rel="stylesheet" href="css/display.css">
</head>
<body>";

if ($result->num_rows > 0) {
    echo "<h2>Список товаров</h2>"; // Заголовок таблицы
    echo "<table>"; // Создание таблицы с границей

    // Вывод заголовков таблицы
    echo "<tr>";
    while ($field_info = $result->fetch_field()) {
        echo "<th>" . htmlspecialchars($field_info->name) . "</th>"; // Выводим имя поля как заголовок
    }
    echo "</tr>";

    // Вывод строк таблицы
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>"; // Каждая ячейка
        }
        echo "</tr>";
    }

    echo "</table>"; // Закрытие таблицы
} else {
    echo "<div class='message'>Нет данных для отображения.</div>";
}

$conn->close(); // Закрываем соединение

echo "</body></html>"; // Закрываем HTML документ
?>
