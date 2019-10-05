<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: auth.html");
    }

    require_once "./php/db.php";

    function writeOffBonuses()
    {
        $date = date_create();
        $date = date_format($date, 'Y-m-d');

        Database::query("UPDATE clients SET bonuses = 0 WHERE next_writeoff_date = '$date'");
    }

    writeOffBonuses();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Контроль скидок</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <header>
        <h1>Панель управления</h1>
    </header>
    <div id="main">
        <form id="search" action="./php/findClient.php" method="GET">
            <input type="text" placeholder="Введите id клиента" name="id_client" id="id_client">
            <input type="submit" value="Поиск" id="search">       <!-- Я не знаю, почему так, но если прописать ширину в .css-файле, то оно не работает... -->
        </form>

        <div class="wrapper">
            <a href="./createClient.php" id="create_client">Создать клиента</a>
            <a href="./allClients.php" id="all_clients">Все клиенты</a>
        </div>
    </div>
</body>
</html>