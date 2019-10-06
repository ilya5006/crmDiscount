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
            bonuses = '<? echo $data['bonuses']; ?>';

            users.push([id,fio,bonuses]);
        <?
        }
    ?>
</script>
</head>
<body>
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
                users.forEach(function (element) 
                {
                string = element[1];
                re = '[*/' + document.querySelector("#input-search-all-client").value + '/*]';

                if (string.search(re) == 0) 
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
        users.forEach(function (data) 
        {
            info = "<div class=\"client\">\n<p class=\"client__id\"> ".concat(data[0], " </p>\n<p class=\"client__fio\"> ").concat(data[1], " </p>\n<p class=\"class__bonuses\"> ").concat(data[2], " </p>\n</div>");
            document.querySelector(".users").innerHTML += info;
        });
        }

        function showSearch() 
        {
        document.querySelector(".users").innerHTML = "";
        usersSearch.forEach(function (data) {
            info = "<div class=\"client\">\n<p class=\"client__id\"> ".concat(data[0], " </p>\n<p class=\"client__fio\"> ").concat(data[1], " </p>\n<p class=\"class__bonuses\"> ").concat(data[2], " </p>\n</div>");
            document.querySelector(".users").innerHTML += info;
        });
        }

        showAll();
    </script>
</body>
</html>