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
</head>
<body>
    <p> Максимальная сумма оплаты бонусами: <span id="maximum_bonuses"><?php echo $maximumBonusesToPayment; ?></span> </p>   
    <p> Оставшаяся сумма заказа в рублях: <span id="remaining_sum"><?php echo $remainingSum ?> </span></p>
    <p> Полная стоимость заказа: <span id="total_price"><?php echo $sum ?></span> </p>
    <p> Количество бонусов у клиента: <span id="client_bonuses"><?php echo $clientBonuses; ?></span></p>

    <form style="margin-top: 100px;">
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