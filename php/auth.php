<?php
    session_start();

    require_once "./db.php";

    $login = $_GET['login'];
    $password = $_GET['password'];

    $authData = Database::query("SELECT * FROM authorization WHERE login = '$login' AND password = '$password'");

    if ($authData)
    {
        $_SESSION['isAuth'] = true;
        $_SESSION['cashiersData'] = $authData;
        header("Location: ../index.php");
    }
    else
    {
        ?>
        <head>
            <link rel="stylesheet" href="./../css/index.css">
        </head>

        <body style="justify-content: center;">
            <h1 id="error" stule="margin-top: 0px"> Логин или пароль неверны </h1>
            <div class="wrapper">
            <?
            echo '<a href="./../auth.html"> Попробовать снова </a>';
            ?>
            </div>
        </body>
        <?
    }
?>