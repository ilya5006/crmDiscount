<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.php");
    }

    require_once "./db.php";

    function isUserFound($clientInfo)
    {
        if (isset($clientInfo['id_client']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    $idClient = $_GET['id_client'];

    $clientInfo = Database::query("SELECT * FROM clients WHERE id_client = '$idClient'");

    if (isUserFound($clientInfo)) 
    {
        $_SESSION['clientInfo'] = $clientInfo;
        header("Location: ../oneClient.php");
    }
    else
    {
        echo "Вы ввели неправильный ID";
        unset($_SESSION['clientInfo']); // unset для того, чтобы очистить предыдущий результат поиска
    }
?>