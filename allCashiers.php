<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: auth.html");
    }
    
    if ($_SESSION['cashiersData']['id_cashier'] != 1)
    {
        header("Location: ./index.php");
    }

    include_once(__DIR__ . '/php/allCashiersList.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Все кассиры</title>
    <link rel="stylesheet" href="./css/index.css">
    <script>
        var cashiers = [];
    <?php
        foreach ($allCashiersData as $data)
        {   
        ?>
            id = '<? echo $data['id_cashier']; ?>';
            fio = '<? echo $data['fio']; ?>';
            fio = fio.toLowerCase();
            login = '<? echo $data['login']; ?>';
            password = '<? echo $data['password']; ?>';

            cashiers.push([id,fio,login,password]);
        <?php
        }
    ?>
    </script>
</head>
<body>
    <? require_once(__DIR__ . '/php/menu.php'); ?> 
    <h1> Список всех кассиров </h1>
    <div id="user_list">
        <input type="text" placeholder="Показанны все кассиры" id="input-search-all-client" oninput="searchClient()">
        <div class="users"> </div>
    </div>

    <script>
        var cashiersSearch = [];
        var re;
        var string;

        function searchClient() 
        {
            cashiersSearch = [];

            if (document.querySelector("#input-search-all-client").value != '') 
            {
                cashiers.forEach(function(element) 
                {
                    string = element[1];
                    re = document.querySelector("#input-search-all-client").value.toLowerCase();
                    
                    if (string.indexOf(re) != -1) 
                    {
                        cashiersSearch.push([element[0], element[1], element[2], element[3]]);
                    }
                });
                showSearch();
            } 
            else 
            {
                showAll();
            }
        }

        function showAll() 
        {
            document.querySelector(".users").innerHTML = "";
            cashiers.forEach(function(data) 
            {
                info = '<a href="oneClient.php?id_client='+data[0]+ '" class="client"> <p class="client__id"> ID: ' + data[0] + '</p> <p class="client__fio">' + data[1] + '</p> <p class=class__bonuses>' + data[2] + '</p>'  + '<p class=class__bonuses>' + data[3] + '</p> </a>';
                document.querySelector(".users").innerHTML += info;
            });
        }

        function showSearch() 
        {
            document.querySelector(".users").innerHTML = "";
            cashiersSearch.forEach(function(data) 
            {
                info = '<a href="oneClient.php?id_cashier='+data[0]+ '" class="client"> <p class="client__id"> ID: ' + data[0] + '</p> <p class="client__fio">' + data[1] + '</p> <p class=class__bonuses>' + data[2] + '</p>' + '<p class=class__bonuses>' + data[3] + '</p> </a>';
                document.querySelector(".users").innerHTML += info;
            });
        }

        showAll();
    </script>
</body>
</html>