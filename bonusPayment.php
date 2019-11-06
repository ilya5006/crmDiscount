<?php
    session_start();
    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.php");
    }
    $sum = $_GET['sum'];
    $maximumBonusesToPayment = floor($sum * 30 / 100);
    $clientBonuses = (int)$_SESSION['clientInfo']['bonuses'];
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
    <?php require_once(__DIR__ . '/php/menu.php'); ?>

    <div id="info">
        <p> <strong>Процент суммы, оплачиваемый бонусами: </strong> <br> <span id="percent">0</span> </p>   
        <hr>
        <p> <strong>Максимальная сумма оплаты бонусами:</strong> <br> <span id="maximum_bonuses"><?php echo $maximumBonusesToPayment; ?></span> </p>   
        <hr>
        <p> <strong>Оставшаяся сумма заказа в рублях:</strong> <br> <span id="remaining_sum"><?php echo $sum; ?> </span></p>
        <hr>
        <p> <strong>Полная стоимость заказа:</strong> <br> <span id="total_price"><?php echo $sum; ?></span> </p>
        <hr>
        <p> <strong>Количество бонусов у клиента:</strong> <br> <span id="client_bonuses"><?php echo $clientBonuses; ?></span></p>
    </div>

    <form action="./php/bonusPayment.php" method="GET" id="bonus_payment">
        Введите кол-во бонусов <br>
        <input id="bonuses_quantity" type="number" placeholder="Введите кол-во бонусов" name="sum" min="1" max="1000000" required>
        <input type="submit" value="Оплата бонусами">
    </form>

    <script>
        let remainingSum = document.querySelector('#remaining_sum');
        let bonusesQuantity = document.querySelector('#bonuses_quantity');
        let maximumBonuses = document.querySelector('#maximum_bonuses');
        let totalPrice = document.querySelector('#total_price');
        let clientBonuses = document.querySelector('#client_bonuses');
        let percent = document.querySelector('#percent');

        bonusesQuantity.addEventListener('input', function (event)
        {
            let maximum;
            if (parseInt(clientBonuses.textContent) > parseInt(maximumBonuses.textContent))
            {
                maximum = parseInt(maximumBonuses.textContent);
            }
            else
            {
                maximum = parseInt(clientBonuses.textContent);
            }

            if (parseInt(event.target.value) > maximum)
            {
                event.target.value = maximum;
            }

            remainingSum.textContent = parseInt(totalPrice.textContent) - parseInt(event.target.value);

            percent.textContent = (parseInt(bonusesQuantity.value) * 100 / parseInt(totalPrice.textContent)).toFixed(2);
        });
    </script>
</body>
</html>