<?php
    include_once("conn.php");
    date_default_timezone_set('America/Sao_Paulo');

    session_start();
    $id = $_SESSION['id'];
    $pri = $_POST['prioridade'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $data = date('Y/m/d H:i:s');

    echo $pri ."--". $title ."--". $desc ."--". $data;

    $result = mysqli_query($conn, "insert into tbl_chamados values (null, '$id', '$pri', '$data' ,'$title' ,'$desc', 'EM PROGRESSO')");

    header("Location: ../Inicio/inicio.php");
?>