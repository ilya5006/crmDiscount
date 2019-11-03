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

    $sumBonusesPayment = $_GET['sum'];
    $totalBonusesAmount = $currentClientBonuses - $sumBonusesPayment;
    Database::queryExecute("UPDATE clients SET bonuses = '$totalBonusesAmount' WHERE id_client = '$idClient'");
    Database::queryExecute("INSERT INTO `log` (`id_cashiers`, `types`, `id_client`, `bonuses`, `time`) VALUES ('$idCashier', 'снял(а)', '$idClient', '$sumBonusesPayment', CURRENT_DATE());");
    header("Location: ../oneClient.php?id_client=".$idClient);
?>