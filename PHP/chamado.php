<?php
    //Chama o php com conexão mySql
    include_once("conn.php");
    //Arruma o fusohorario
    date_default_timezone_set('America/Sao_Paulo');

    //Pega os dados da sessão
    session_start();
    $id = $_SESSION['id'];
    $pri = $_POST['prioridade'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $data = date('Y/m/d H:i:s');

    echo $pri ."--". $title ."--". $desc ."--". $data;

    //Insere os dados no banco de dados
    $result = mysqli_query($conn, "insert into tbl_chamados values (null, '$id', '$pri', '$data' ,'$title' ,'$desc', 'EM PROGRESSO', 'Sem Responsavel')");

    header("Location: ../Inicio/inicio.php");
?>