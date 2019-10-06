<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.html");
    }

    $sum = $_GET['sum'];
    $maximumBonusesToPayment = round($sum / 2);
    $clientBonuses = (int)$_SESSION['clientInfo']['bonuses'];
    $remainingSum = $sum - $maximumBonusesToPayment;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Оплата бонусами</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>

    <div id="info">
        <p> <strong>Максимальная сумма оплаты бонусами:</strong> <span id="maximum_bonuses"><?php echo $maximumBonusesToPayment; ?></span> </p>   
        <p> <strong>Оставшаяся сумма заказа в рублях:</strong> <span id="remaining_sum"><?php echo $remainingSum ?> </span></p>
        <p> <strong>Полная стоимость заказа:</strong> <span id="total_price"><?php echo $sum ?></span> </p>
        <p> <strong>Количество бонусов у клиента:</strong> <span id="client_bonuses"><?php echo $clientBonuses; ?></span></p>
    </div>

    <form action="./php/bonusPayment.php" method="GET" id="bonus_payment">
        Введите кол-во бонусов <br>
        <input id="bonuses_quantity" type="text" placeholder="Введите кол-во бонусов" name="sumBonusesPayment" value="<?php echo $maximumBonusesToPayment ?>">
        <input type="submit" value="Оплата бонусами">
    </form>

    <script>
        let remainingSum = document.querySelector('#remaining_sum');
        let bonusesQuantity = document.querySelector('#bonuses_quantity');
        let maximumBonuses = document.querySelector('#maximum_bonuses');
        let totalPrice = document.querySelector('#total_price');

        bonusesQuantity.addEventListener('input', (event) =>
        {
            if (parseInt(event.target.value) > parseInt(maximumBonuses.textContent))
            {
                event.target.value = maximumBonuses.textContent;
            }
            
            remainingSum.textContent = parseInt(totalPrice.textContent) - parseInt(event.target.value);
        });
    </script>
</body>
</html>