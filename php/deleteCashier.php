<?php
    session_start();

    require_once "./db.php";

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.html");
    }

    if ($_SESSION['cashiersData']['id_cashier'] != 1)
    {
        header("Location: ../index.php");
    }

    $cashierId = $_GET['id_cashier'];

    Database::queryExecute("DELETE FROM authorization WHERE id_cashier = '$cashierId'");

    header("Location: ../admin.php");
?>