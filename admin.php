<?php
    session_start();

    if ($_SESSION['cashiersData']['id_cashiers'] != 1)
    {
        header("Location: ./index.php");
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/index.css">
    <title>Панель администратора</title>
</head>
<body>
    
</body>
</html>