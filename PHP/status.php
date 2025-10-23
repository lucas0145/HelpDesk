<?php

    //Chama o php com conexão mySql
    include_once("conn.php");
    session_start();
    
    //Inicia as variaveis com os inputs do form
    $status = $_POST['status'];
    $resp = $_POST['responsavel'];
    $id_chamada = $_SESSION['id_chamada'];

    echo $status. "--". $id_chamada;

    //Atualiza os dados do banco de dados
    $result = mysqli_query($conn, "UPDATE tbl_chamados SET status = '$status', responsavel = '$resp' WHERE id_chamada = '$id_chamada'");

    header("Location: ../Admin/admin.php");
?>