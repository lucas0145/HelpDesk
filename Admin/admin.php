<?php
    include_once("../PHP/conn.php");

    session_start();
    $id = $_SESSION['id'];

    $result = mysqli_query($conn, "select * from tbl_users where id=" . $id);

    while($row = $result->fetch_assoc()) {
        
        $nome = $row["nome"];
        $setor = $row["setor"];
        $ramal = $row["ramal"];
    }
    //echo $id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../responsividade.css">
    <link rel="shortcut icon" href="/Imagem/checklist.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>

    <nav>
        <h1>Olá, <?php echo $nome?></h1>
        
        <div>
            <h2>Ramal: <?php echo $ramal ?></h2>
            <h2>Setor: <?php echo $setor ?></h2>
        </div>
        <div>
            <a href="anydesk:bhmest020">Abrir anydesk</a>
            <a onclick="histFnc(this)">Lista de Chamados</a>
        </div>

        <a href="../index.html" id="btnSair">Sair</a>
    </nav>

    <section id="sec-histo">
        <h1>Lista de Chamados</h1>

        <form action="../PHP/sort.php" method="POST">

            <label>Select * from tbl_chamados </label>
            <!-- <select name="sortSelect" id="sortSelect" oninput="sortFnc(this)">
                <option value="">Selecione</option>
                <option value="id_chamada">Id Chamada</option>
                <option value="id_user">Id Usuario</option>
                <option value="prioridade">Prioridade</option>
                <option value="dataHora">Data e Hora</option>
                <option value="assunto">Assunto</option>
                <option value="status">Status</option>
            </select> -->

            <input type="text" name="sortComand" placeholder="order by/ group by/ where..." id="sortSelect">
            <input type="submit" value="Enviar" onclick="sortFnc()">
        </form>

            
        <article>

            <?php

                error_reporting(0);
                if ($_SESSION["sortElement"] == "") {
                    $_SESSION["sortElement"] = "";
                }
                error_reporting(1);

                $sortElement = $_SESSION["sortElement"];

                // echo $sortElement;

                $result = mysqli_query($conn, "select * from tbl_chamados ".$sortElement);

                while($row = $result->fetch_assoc()) {  

                    $_SESSION["id_chamada"] = $row["id_chamada"];  
                    echo        "<div>
                                    <h1>".$row["assunto"]."</h1> <h2>Id_User: ".$row["id_user"]."</h2> <h2>Id_Chamado: ".$row["id_chamada"]."</h2>
                                    <p>".$row["descricao"]."</p> 
                                    <p><b>".$row["dataHora"]."</b></p> <p><b>Prioridade: ".$row["prioridade"]."</b></p>

                                        <form action='../PHP/status.php' method='POST'>
                                            <select name='status' id='' required>
                                                <option value=''>".$row['status']."</option>
                                                <option value='EM PROGRESSO'>EM PROGRESSO</option>
                                                <option value='CONCLUIDO'>CONCLUIDO</option>
                                                <option value='CANCELADO'>CANCELADO</option>
                                            </select>
                                            <select name='responsavel' id='' required>
                                                <option value=''>".$row['responsavel']."</option>
                                                <option value='Lucas Balmant'>Lucas Balmant</option>
                                                <option value='Carlos Eduardo'>Carlos Eduardo</option>
                                                <option value='João Pedro'>João Pedro</option>
                                                <option value='Sem Responsavel'>Sem Responsavel</option>
                                            </select>
                                            <input type='submit' name='submit'>
                                        </form>
                                </div>";
                }
            ?>
        </article>
    </section>

    <script src="admin.js"></script>
</body>
</html>
