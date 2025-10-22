<?php
    session_start();

    // $url = $_SERVER['REQUEST_URI']."";
    // $url = explode('?', $url);
    // echo $url[1];
    // $_SESSION["sortElement"] = $url[1];

    $_SESSION["sortElement"] = $_POST["sortComand"];

    echo $_SESSION["sortElement"];

    header("Location: ../Admin/admin.php");
?>