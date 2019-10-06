<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: auth.html");
    }

    require_once "./php/db.php";

    function incrementDate($date, $interval)
    {
        $date = date_create($date);
        date_add($date, date_interval_create_from_date_string($interval));
        $date = date_format($date, 'Y-m-d');
        return $date;
    }

    function writeoffBonuses()
    {
        $today = date_create();
        $today = date_format($today, 'Y-m-d');

        $lastWriteoffDate = Database::query("SELECT * FROM last_writeoff_date")['last_writeoff_date'];
        $lastWriteoffDate = date_create($lastWriteoffDate);

        while (date_format($lastWriteoffDate, 'Y-m-d') != $today)
        {
            $stringLastWriteoffDate = date_format($lastWriteoffDate, 'Y-m-d');
            Database::queryExecute("UPDATE clients SET bonuses = 0 WHERE next_writeoff_date = '$stringLastWriteoffDate'");

            $nextWriteoffDateForClient = incrementDate($stringLastWriteoffDate, '1 month');

            Database::queryExecute("UPDATE clients SET next_writeoff_date = '$nextWriteoffDateForClient' WHERE next_writeoff_date = '$stringLastWriteoffDate'");

            date_add($lastWriteoffDate, date_interval_create_from_date_string('1 day'));
        }

        Database::queryExecute("UPDATE clients SET bonuses = 0 WHERE next_writeoff_date = '$today'"); // Ибо обновляются все, у кого должны списать, кроме сегодняшнего дня
        
        $nextWriteoffDateForClient = incrementDate($today, '1 month');
        
        Database::queryExecute("UPDATE clients SET next_writeoff_date = '$nextWriteoffDateForClient' WHERE next_writeoff_date = '$today'");       
        
        Database::queryExecute("UPDATE last_writeoff_date SET last_writeoff_date = '$today'");
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
        <form id="search-form" action="./php/findClient.php" method="GET">
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