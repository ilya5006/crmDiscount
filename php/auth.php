<?php
    session_start();

    require_once "./db.php";

    $login = $_GET['login'];
    $password = $_GET['password'];

    $isAuth = Database::query("SELECT * FROM authorization WHERE login = '$login' AND password = '$password'");
    
    if ($isAuth)
    {
        $_SESSION['isAuth'] = true;
        header("Location: ../index.php");
    }
    else
    {
        echo '<p id="error"> Логин или пароль неверны </p>';
    }
?>