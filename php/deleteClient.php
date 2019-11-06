<?php
    session_start();

    require_once "./db.php";

    if ($_SESSION['cashiersData']['id_cashier'] != 1)
    {
        header("Location: ../index.php");
    }

    $clientId = $_GET['id_client'];

    Database::queryExecute("DELETE FROM clients WHERE id_client = '$clientId'");

    header("Location: ../allClients.php");
?>