<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: auth.html");
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/index.css">
    <title>Контроль скидок</title>
</head>
<body>
    <header>
        <h1>Панель управления</h1>
    </header>
    
    <div id="main">
        <form id="search" action="" method="GET">
            <input type="text" placeholder="Введите id клиента" name="id_client" id="id_client">
            <input type="submit" value="Поиск" id="search" style="width: 10%;">       <!-- Я не знаю, почему так, но если прописать ширину в .css-файле, то оно не работает... -->
        </form>

        <a href="./createClient.php" id="create_client">Создать клиента</a>
        <a href="./allClients.php" id="all_clients">Все клиенты</a>
    </div>
</body>
</html>