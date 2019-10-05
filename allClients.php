<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: auth.html");
    }
    
    include_once(__DIR__ . '/php/allClientList.php');
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Все клиенты</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <h1> Список всех клиентов </h1>
    <div id="user_list">
        <input type="text" placeholder="Показанны все клиенты" id="input-search-all-client">
        <?
        foreach ($allClientData as $data)
        {   
            echo '<div class="client">';
                echo '<p class="client__id">'. $data['id_client'] .'</p>';
                echo '<p class="client__fio">'. $data['fio'] .'</p>';
                echo '<p class="class__bonuses">'. $data['bonuses'] .'</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>