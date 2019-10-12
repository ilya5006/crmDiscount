<?php

    if (!$_SESSION['isAuth'])
    {
        header("Location: auth.html");
    }

    require_once(__DIR__ . '/db.php');
    $logs = Database::queryAllNum("SELECT authorization.fio, clients.fio, log.types, log.bonuses, time FROM clients, authorization, log WHERE authorization.id_cashiers = log.id_cashiers AND clients.id_client = log.id_client ORDER BY log.time DESC");
    
    return $logs;
?>