<?php
    session_start();

    if ($_SESSION['cashiersData']['id_cashier'] != 1)
    {
        header("Location: ./index.php");
    }

    if (isset($_GET['create_cashier']))
    {
        header("Location: ./php/createCashier.php?fio_cashier=".$_GET['fio_cashier']."&login_cashier=".$_GET['login_cashier']."&password_cashier=".$_GET['password_cashier']);
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/index.css">
  
    <style>
        form
        {
            width: 800px;
        }
    </style>

    <title>Панель администратора</title>
</head>
<body>
    <header>
        <? require_once(__DIR__ . '\php\menu.php'); ?>
        <h1>Панель администратора</h1>
    </header>

    <form action="" method="GET">
        <input type="text" placeholder="Введите ФИО кассира" name="fio_cashier" id="fio_cashier">
        <input type="text" placeholder="Введите логин кассира" name="login_cashier" id="login_cashier">
        <input type="text" placeholder="Введите пароль кассира" name="password_cashier" id="password_cashier">        
        <input type="submit" name="create_cashier" id="create_client" value="Создать кассира">
        <!-- Позже тут будет возможность удалять кассира -->
    </form>
</body>
</html>