<?php

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.php");
    }

    if ($_SESSION['cashiersData']['id_cashier'] != 1)
    {
        header("Location: ../index.php");
    }

    require_once(__DIR__ . '/db.php');
    $allCashiersData = Database::queryAll("SELECT * FROM authorization");
    
    return $allCashiersData;
?>