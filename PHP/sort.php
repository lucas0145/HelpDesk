<?php
    session_start();

    //Codigo antigo que eu fiquei com medo de apagar
    // $url = $_SERVER['REQUEST_URI']."";
    // $url = explode('?', $url);
    // echo $url[1];
    // $_SESSION["sortElement"] = $url[1];

    //Guarda o comando sql na sessão
    $_SESSION["sortElement"] = $_POST["sortComand"];

    echo $_SESSION["sortElement"];

    header("Location: ../Admin/admin.php");
?>