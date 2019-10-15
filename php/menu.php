<div id="menu"> 
    <a href="/index.php">Главная</a>
    <a href="/allClients.php">Все клиенты</a>
    <a href="/createClient.php">Создать клиента</a>
    
    <?php
    $isAdmin = $_SESSION['cashiersData']['id_cashier'] == 1;
    
    if ($isAdmin)
        echo '<a href="/admin.php"> Панель администратора </a>';
    ?>

    <a href="./php/logout.php" id="logout">Выйти</a>
    <p id="header_fio"> <? echo $_SESSION['cashiersData']['fio']; ?> </p>
</div>
