<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.html");
    }

    $sum = $_GET['sum'];
    $maximumBonusesToPayment = round($sum / 2);
    $clientBonuses = (int)$_SESSION['clientInfo']['bonuses'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Оплата бонусами</title>
</head>
<body>
    <p> Максимальная сумма полаты бонусами: <?php echo $maximumBonusesToPayment; ?> </p>
    <form>
        <input type="text" placeholder="">
    </form>
</body>
</html>