<?php
    session_start();

    if (isset($_SESSION['isAuth']))
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
    <title>Авторизация</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body style="justify-content: center">
    <form action="./php/auth.php" method="GET" id="auth">
        <input type="text" placeholder="Введите логин" name="login" id="login" required>
        <input type="password" placeholder="Введите пароль" name="password" id="password" required>
        <input type="submit" value="Войти" name="enter" id="enter">
    </form>
</body>
</html>