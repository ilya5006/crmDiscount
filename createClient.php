<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: auth.php");
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создать клиента</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <? require_once(__DIR__ . '/php/menu.php'); ?>
    <h1>Бонусы начисляются при минимальной сумме заказа 500 рублей</h1>
    <form action="./php/createClient.php" method="GET" id="new_client">
        <input type="text" name="fio" placeholder="Введите ФИО" pattern="[A-Za-zА-Яа-яЁё-]{2,} [A-Za-zА-Яа-яЁё]{2,} [A-Za-zА-Яа-яЁё]{0,}" required>
        <input type="number" name="amount_entered" placeholder="Введите сумму заказа (в рублях)" max="1000000" required>
        <input type="submit" value="Зарегестрировать клиента">
    </form>
</body>
</html>