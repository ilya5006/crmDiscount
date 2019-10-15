<?php
    session_start();

    if (!$_SESSION['isAuth'])
    {
        header("Location: auth.html");
    }
    
    include_once(__DIR__ . '/php/allClientList.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Все клиенты</title>
    <link rel="stylesheet" href="./css/index.css">
    <script>
        var users = [];
    <?
        foreach ($allClientData as $data)
        {   
        ?>
            id = '<? echo $data['id_client']; ?>';
            fio = '<? echo $data['fio']; ?>';
            fio = fio.toLowerCase();
            bonuses = '<? echo $data['bonuses']; ?>';

            users.push([id,fio,bonuses]);
        <?
        }
    ?>
</script>
</head>
<body>
    <? require_once(__DIR__ . '/php/menu.php'); ?> 
    <h1> Список всех клиентов </h1>
    <div id="user_list">
        <input type="text" placeholder="Показанны все клиенты" id="input-search-all-client" oninput="searchClient()">
        <div class="users"> </div>
    </div>

    <script>
        var usersSearch = [];
        var re;
        var string;

        function searchClient() 
        {
        usersSearch = [];

            if (document.querySelector("#input-search-all-client").value != '') 
            {
                users.forEach(function(element) 
                {
                    string = element[1];
                    re = document.querySelector("#input-search-all-client").value.toLowerCase();
                    
                    if (string.indexOf(re) != -1) 
                    {
                        usersSearch.push([element[0], element[1], element[2]]);
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
            users.forEach(function(data) 
            {
                info = '<a href="oneClient.php?id_client='+data[0]+ '" class="client"> <p class="client__id"> ID: ' + data[0] + '</p> <p class="client__fio">' + data[1] + '</p> <p class=class__bonuses>' + data[2] + '</p> </a>';
                document.querySelector(".users").innerHTML += info;
        });
        }

        function showSearch() 
        {
            document.querySelector(".users").innerHTML = "";
            usersSearch.forEach(function (data) 
            {
                info = '<a href="oneClient.php?id_client='+data[0]+ '" class="client"> <p class="client__id"> ID: ' + data[0] + '</p> <p class="client__fio">' + data[1] + '</p> <p class=class__bonuses>' + data[2] + '</p> </a>';
                document.querySelector(".users").innerHTML += info;
            });
        }

        showAll();
    </script>
</body>
</html>