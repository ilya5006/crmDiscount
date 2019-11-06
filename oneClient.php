<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.php");
    }
    
    if (isset($_GET['accrual']))
    {
        $link = "Location: ./php/accrualOfBonuses.php?sum=" . $_GET['sum'];
        header($link);
    }
    if (isset($_GET['payment']))
    {
        $link = "Location: ./bonusPayment.php?sum=" . $_GET['sum'];
        header($link);
    }

    $idClient = $_GET['id_client'];
    require_once "./php/db.php";
    
    if (isset($_GET['id_client']))
    {
        $clientInfo = Database::query("SELECT * FROM clients WHERE id_client = '$idClient'");
        if (empty($clientInfo))
        {
        ?>
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="./css/index.css">
            </head>
    
            <body style="justify-content: center;">
                <h1 id="error" stule="margin-top: 0px"> Клиент не найден </h1>
                <div class="wrapper">
                <a href="./index.php"> Попробовать снова </a>
                </div>
            </body>
        <?php
        }
        else
        {
            $_SESSION['clientInfo'] = $clientInfo;
        ?>
            <!DOCTYPE html>
            <html lang="ru">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Информация о клиенте</title>
                <link rel="stylesheet" href="./css/index.css">
            </head>
            <body>
                <header>
                    <?php require_once(__DIR__ . '/php/menu.php'); ?>
                    <h1>Панель управления</h1>
                </header>

                <div id="info">
                    <p> <strong>ID:</strong> <br> <?php echo $clientInfo['id_client']; ?> </p>
                    <hr>
                    <p id="fio"> <strong>ФИО:</strong> <br> <?php echo $clientInfo['fio']; ?> </p>
                    <hr>
                    <p id="bonuses"> <strong>Количество бонусов:</strong> <br> <?php echo $clientInfo['bonuses']; ?> </p>
                    <hr>
                    <p id="next_writeoff_date"> <strong>Следующая дата списания бонусов:</strong> <br> <?php echo $clientInfo['next_writeoff_date']; ?> </p>
                    <hr>
                    <a href="./php/deleteClient.php?id_client=<?php echo $_SESSION['clientInfo']['id_client']; ?>">Удалить клиента</a>
                </div>

                <form id="bonus_payment" action="" method="GET">
                    <input type="number" placeholder="Сумма заказа в рублях" name="sum" min="0" max="1000000" required>
                    <input type="submit" value="Начисление бонусов" name="accrual">
                    <input type="submit" value="Оплатить часть суммы бонусами" name="payment">
                </form>
            </body>
            </html>
        <?php
        }
    }
?>