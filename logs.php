<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: auth.php");
    }
    
    include_once(__DIR__ . '/php/logShow.php');
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
    <?php require_once(__DIR__ . '/php/menu.php'); ?>
    <h1> Список всех операций </h1>
    <div id="logs">
    <?php
        foreach ($logs as $data)
        {
            echo '<div class="log">';
            echo '<p>'.$data['4'].' - </p>';
            echo '<p>'.$data['0'].'</p>';
            echo '<p>'.$data['2'].'</p>';
            echo '<p>'.$data['3'].'</p>';
            echo '<p> бонусов у</p>';
            echo '<p>'.$data['1'].'</p>';
            echo '</div>';
        }
    ?>
    </div>
</body>
</html>