<?
    session_start();
    $_SESSION['isAuth'] = null;
    session_destroy();
    header("Location: ./../index.php");
?>