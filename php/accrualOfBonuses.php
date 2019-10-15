<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.php");
    }

    require_once "./db.php";

    $idClient = $_SESSION['clientInfo']['id_client'];
    $idCashier = $_SESSION['cashiersData']['id_cashiers'];
    $currentClientBonuses = (int)$_SESSION['clientInfo']['bonuses'];
    
    $sumOfOrder = (int)$_GET['sum'];
    $newBonuses = floor($sumOfOrder / 500) * 10;
    $totalBonusesAmount = $currentClientBonuses + $newBonuses;

    Database::queryExecute("UPDATE clients SET bonuses = '$totalBonusesAmount' WHERE id_client = '$idClient'");
    Database::queryExecute("INSERT INTO `log` (`id_cashiers`, `types`, `id_client`, `bonuses`, `time`) VALUES ('$idCashier', 'начислил(а)', '$idClient', '$newBonuses', CURRENT_DATE());");
    header("Location: ../oneClient.php?id_client=".$idClient);
?>