<?php

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.html");
    }

    require_once(__DIR__ . '/db.php');
    $allClientData = Database::queryAll("SELECT * FROM clients");
    
    return $allClientData;
?>