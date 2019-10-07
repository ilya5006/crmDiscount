<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.html");
    }

    require_once "./db.php";

    $idClient = $_SESSION['clientInfo']['id_client'];
    $currentClientBonuses = (int)$_SESSION['clientInfo']['bonuses'];
    $sumBonusesPayment = $_GET['sum'];
    $totalBonusesAmount = $currentClientBonuses - $sumBonusesPayment;
    Database::queryExecute("UPDATE clients SET bonuses = '$totalBonusesAmount' WHERE id_client = '$idClient'");

    header("Location: ../index.php");
?>