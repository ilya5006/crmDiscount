<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: auth.html");
    }

    require_once "./php/db.php";

    function writeoffBonuses()
    {
        $date = date_create('2019-12-25');
        $date = date_format($date, 'Y-m-d');

        $lastWriteoffDate = Database::query("SELECT * FROM last_writeoff_date")['last_writeoff_date'];
        $lastWriteoffDate = date_create($lastWriteoffDate);

        while (date_format($lastWriteoffDate, 'Y-m-d') != $date)
        {
            $stringLastWriteoffDate = date_format($lastWriteoffDate, 'Y-m-d');
            Database::queryExecute("UPDATE clients SET bonuses = 0 WHERE next_writeoff_date = '$stringLastWriteoffDate'");

            $nextWriteoffDateForClient = date_create($stringLastWriteoffDate);
            date_add($nextWriteoffDateForClient, date_interval_create_from_date_string('1 month'));
            $stringNextWriteoffDateForClient = date_format($nextWriteoffDateForClient, 'Y-m-d');

            Database::queryExecute("UPDATE clients SET next_writeoff_date = '$stringNextWriteoffDateForClient' WHERE next_writeoff_date = '$stringLastWriteoffDate'");

            date_add($lastWriteoffDate, date_interval_create_from_date_string('1 day'));
        }

        Database::queryExecute("UPDATE last_writeoff_date SET last_writeoff_date = '$date'");
    }

    writeoffBonuses();
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