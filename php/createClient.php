<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: ../auth.html");
    }

    require_once "./db.php";

    function calculateNextWriteoffDate()
    {
        $date = date_create();
        date_add($date, date_interval_create_from_date_string('1 month'));
        $date = date_format($date, 'Y-m-d');
        return $date;
    }

    $fio = $_GET['fio'];
    $amountEntered = (int)$_GET['amount_entered'];
    $bonuses = floor($amountEntered / 500) * 10;
    $nextWriteoffDate = calculateNextWriteoffDate();

    Database::queryExecute("INSERT INTO clients VALUES (NULL, '$fio', '$bonuses', '$nextWriteoffDate')");

    echo '<p> Количество бонусов, которое было изначально зачислено: ' . $bonuses . '</p>';
    echo '<p> Вы будете перенаправлены на главную страницу через: <span id="timeout">5</span></p>';
?>

<script>
    let timeout = document.querySelector('#timeout');
    let timer = parseInt(timeout.textContent);
    let currentValue = timer;

    setInterval(() =>
    {
        currentValue--;
        timeout.textContent = currentValue;
    }, 1000);

    setTimeout(() =>
    {
        location.href = '../index.php';
    }, 5000);
    
</script>