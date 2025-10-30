<?php
    session_start();

    //Codigo antigo que eu fiquei com medo de apagar
    // $url = $_SERVER['REQUEST_URI']."";
    // $url = explode('?', $url);
    // echo $url[1];
    // $_SESSION["sortElement"] = $url[1];

    //Guarda o comando sql na sessão
    $_SESSION["sortElement"] = $_POST["sortComand"];

    $_SESSION["sortTxt"] = $_POST["sortTxt"];
    $_SESSION["groupTxt"] = $_POST["groupTxt"];
    $_SESSION["groupMeth"] = $_POST["groupMeth"];
    if ($_POST["sortTxt"] != "") {
        $_SESSION["sortTxt"] = "order by " . $_POST["sortTxt"] . " " . $_POST["sortDir"];
    }
    if ($_POST["groupTxt"] != "") {
        $_SESSION["groupTxt"] = "group by " . $_POST["groupTxt"];
    }
    if ($_POST["groupMeth"] != "") {
        $_POST["groupMeth"] = str_replace("x",substr($_SESSION['groupTxt'], 9, strlen($_SESSION['groupTxt'])), $_POST["groupMeth"]);
        $_SESSION["groupMeth"] = " ,". $_POST["groupMeth"];
    }

    echo "". $_SESSION["groupTxt"] ."". $_SESSION["groupMeth"];
    echo $_SESSION["sortElement"];

    header("Location: ../Admin/admin.php");
?>