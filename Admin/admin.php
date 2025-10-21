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
        
        <article>
            <?php

                $result = mysqli_query($conn, "select * from tbl_chamados order by prioridade");

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
