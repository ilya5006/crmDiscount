<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.html");
    }
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
        <? require_once(__DIR__ . '\php\menu.php'); ?> 
        <h1>Панель управления</h1>
    </header>

    <div id="info">
        <p> <strong>ID:</strong> <br> <?php echo $_SESSION['clientInfo']['id_client']; ?> </p>
        <hr>
        <p id="fio"> <strong>ФИО:</strong> <br> <?php echo $_SESSION['clientInfo']['fio']; ?> </p>
        <hr>
        <p id="bonuses"> <strong>Количество бонусов:</strong> <br> <?php echo $_SESSION['clientInfo']['bonuses']; ?> </p>
        <hr>
        <p id="next_writeoff_date"> <strong>Следующая дата списания бонусов:</strong> <br> <?php echo $_SESSION['clientInfo']['next_writeoff_date']; ?> </p>
    </div>

    <form id="bonus_payment" action="./bonusPayment.php" method="GET">
        <input type="number" placeholder="Сумма заказа в рублях" name="sum" required>
        <input type="submit" value="Оплатить часть суммы бонусами">
    </form>

    <form id="accrual_of_bonuses" action="./php/accrualOfBonuses.php" method="GET">
        <input type="number" placeholder="Сумма заказа в рублях" name="sum" required>
        <input type="submit" value="Начисление бонусов">
    </form>
</body>
</html>