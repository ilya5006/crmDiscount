<?php

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.php");
    }

    require_once(__DIR__ . '/db.php');
    $allClientData = Database::queryAll("SELECT * FROM clients");
    
    return $allClientData;
?>