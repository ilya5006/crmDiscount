<?php
    session_start();

    if ($_SESSION['cashiersData']['id_cashiers'] != 1)
    {
        header("Location: ../auth.html");
    }

    require_once "./db.php";

    $fio = $_GET['fio_cashier'];
    $login = $_GET['login_cashier'];
    $password = $_GET['password_cashier'];

    Database::queryExecute("INSERT INTO authorization VALUES (NULL, '$fio', '$login', '$password')");

    header("Location: ../admin.php");
?>