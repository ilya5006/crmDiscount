<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.html");
    }

    require_once "./db.php";

    $idClient = $_SESSION['clientInfo']['id_client'];
    $currentClientBonuses = (int)$_SESSION['clientInfo']['bonuses'];
    
    $sumOfOrder = (int)$_GET['sum'];
    $newBonuses = floor($sumOfOrder / 500) * 10;
    $totalBonusesAmount = $currentClientBonuses + $newBonuses;

    Database::queryExecute("UPDATE clients SET bonuses = '$totalBonusesAmount' WHERE id_client = '$idClient'");
    
    header("Location: ../oneClient.php?id_client=".$idClient);
?>