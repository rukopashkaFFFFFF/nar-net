<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин</title>
    <link rel="stylesheet" href="css/shop.css">
</head>
<body>

    <div class="header-buttons">
        <button onclick="location.href='vender/logout.php'">Выйти</button>
        <button onclick="location.href='profile.php'">Профиль</button>
        <button onclick="location.href='cart.php'">Корзина</button>
    </div>

    <?php
        if($_SESSION['message']) {
            echo '<p class="msg">' .$_SESSION['message']. '</p>';
        }
        unset ($_SESSION['message']);
        ?>

    <h1>Магазин</h1>
    
    <div class="product-container">
        <div class="product">
            <img src="images/apple.jpg" alt="Яблоко">
            <h2>Яблоко</h2>
            <p>Сочные яблоки с незабываемым вкусом.</p>    
        </div>
        
        <div class="product">
            <img src="images/banana.jpeg" alt="Банан">
            <h2>Банан</h2>
            <p>Питательные бананы, идеальны для перекуса.</p>
        </div>
        
        <div class="product">
            <img src="images/orange.jpg" alt="Апельсин">
            <h2>Апельсин</h2>
            <p>Сладкие апельсины, полны витаминов.</p>
        </div> 
    </div>
    <form action="vender/gotocart.php" method="POST">
                <label for="amount">Количество:</label>
                <input type="number" name="amount" id="amount" min="0" max="10">
                <select name="fruit" id="fruit">
                    <option value="Яблоко">Яблоко</option>
                    <option value="Банан">Банан</option>
                    <option value="Апельсин">Апельсин</option>
                </select>
                <button>Добавить в корзину</button>
    </form>   

</body>
</html>
