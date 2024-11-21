<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <h1>Мои заказы</h1>
    <table>
        <thead>
            <tr>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Статус</th>
                <th>Дата создания</th>
            </tr>
        </thead>
        <tbody>
            <!-- Пример строк в таблице -->
            <tr>
                <td>Заказ 1</td>
                <td>10</td>
                <td>В обработке</td>
                <td>2023-10-10</td>
            </tr>
            <tr>
                <td>Заказ 2</td>
                <td>5</td>
                <td>Завершен</td>
                <td>2023-10-11</td>
            </tr>
            <!-- Здесь можно добавить больше строк -->
        </tbody>
    </table>

    <div class="button-container">
        <button onclick="location.href='basket.php'">Создать новый заказ</button>
        <button onclick="location.href='shop.php'">Вернуться на главную страницу</button>
        <button onclick="location.href='vender/logout.php'">Выйти</button>
    </div>
</body>
</html>

<?php
session_start();
require_once("vender/connect.php");

<meta charset >

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
