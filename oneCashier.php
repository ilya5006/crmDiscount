<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.php");
    }

    if ($_SESSION['cashiersData']['id_cashier'] != 1)
    {
        header("Location: ./index.php");
    }

    $idCashier = $_GET['id_cashier'];
    require_once "./php/db.php";
    
    if (isset($_GET['id_cashier']))
    {
        $cashierInfo = Database::query("SELECT * FROM authorization WHERE id_cashier = '$idCashier'");
        if (empty($cashierInfo))
        {
        ?>
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="./css/index.css">
            </head>
    
            <body style="justify-content: center;">
                <h1 id="error" stule="margin-top: 0px"> Кассир не найден </h1>
                <div class="wrapper">
                <a href="./index.php"> Попробовать снова </a>
                </div>
            </body>
        <?php
        }
        // else
        // {
        //     $_SESSION['clientInfo'] = $clientInfo;
        ?>
            <!DOCTYPE html>
            <html lang="ru">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Информация о кассире</title>
                <link rel="stylesheet" href="./css/index.css">
            </head>
            <body>
                <header>
                    <?php require_once(__DIR__ . '/php/menu.php'); ?>
                    <h1>Панель управления</h1>
                </header>

                <div id="info">
                    <p> <strong>ID:</strong> <br> <?php echo $cashierInfo['id_cashier']; ?> </p>
                    <hr>
                    <p id="fio"> <strong>ФИО:</strong> <br> <?php echo $cashierInfo['fio']; ?> </p>
                    <hr>
                    <p id="bonuses"> <strong>Логин:</strong> <br> <?php echo $cashierInfo['login']; ?> </p>
                    <hr>
                    <p id="next_writeoff_date"> <strong>Пароль:</strong> <br> <?php echo $cashierInfo['password']; ?> </p>

                    <a href="./php/deleteCashier.php?id_cashier=<?php echo $cashierInfo['id_cashier'] ?>"> Удалить кассира </a>
                </div>

                <!-- <form id="bonus_payment" action="" method="GET">
                    <input type="number" placeholder="Сумма заказа в рублях" name="sum" min="0" max="1000000" required>
                    <input type="submit" value="Начисление бонусов" name="accrual">
                    <input type="submit" value="Оплатить часть суммы бонусами" name="payment">
                </form> -->
            </body>
            </html>
        <?php
        //}
    }
?>