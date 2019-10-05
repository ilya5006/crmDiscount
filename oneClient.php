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
    <link rel="stylesheet" href="./css/oneClient.css">
    <title>Информация о клиенте</title>
</head>
<body>
    <header>
        <h1>Панель управления</h1>
    </header>

    <div id="info">
        <p id="fio"> ФИО: <?php echo $_SESSION['clientInfo']['fio']; ?> </p>
        <p id="bonuses"> Количество бонусов: <?php echo $_SESSION['clientInfo']['bonuses']; ?> </p>
        <p id="next_writeoff_date"> Следующая дата списания бонусов: <?php echo $_SESSION['clientInfo']['next_writeoff_date']; ?> </p>
    </div>

    <form id="bonus_payment" action="./bonusPayment.php" method="GET">
        <input type="text" placeholder="Сумма заказа в рублях" name="sum">
        <input type="submit" value="Оплатить чать суммы бонусами">
    </form>

    <hr>

    <form id="accrual_of_bonuses" action="./accrualOfBonuses.php" method="GET">
        <input type="text" placeholder="Сумма заказа в рублях" name="sum">
        <input type="submit" value="Начисление бонусов">
    </form>
</body>
</html>