<?php
    session_start();

    require_once "./db.php";

    $login = $_GET['login'];
    $password = $_GET['password'];

    $authData = Database::query("SELECT * FROM authorization WHERE login = '$login' AND password = '$password'");

    if ($authData)
    {
        $_SESSION['isAuth'] = true;
        $_SESSION['cashiersData'] = $authData;
        header("Location: ../index.php");
    }
    else
    {
        echo '<p id="error"> Логин или пароль неверны </p>';
    }
?>