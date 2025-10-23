<?php
    include_once("../PHP/conn.php");

    session_start();
    //Pega o id do usuario guardado na sessao
    $id = $_SESSION['id'];

    //Pega as informaçoes no banco de dados
    $result = mysqli_query($conn, "select * from tbl_users where id=" . $id);

    //Recebe as informaçoes do banco de dados
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
    <link rel="stylesheet" href="inicio.css">
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
            <a onclick="chaFnc(this)">Abrir Chamada</a>
            <a onclick="histFnc(this)">Histórico</a>
        </div>

        <a href="../index.html" id="btnSair" onclick="sairFnc()">Sair</a>
    </nav>

    <section id="sec-welcome">
        <h1>Seja bem vindo ao chamados BHM!</h1>
        <p>
            Aqui você pode enviar um chamado para o nosso suporte de TI.
            <br>Segue um tutorial rápido ->
            <br>Clique em "Abrir anydesk" para abrir o anydesk direto na conexão do computador do nosso TI.
            <br>Clique em "Abrir chamada" para começar o processo de chamada do nosso site.
            <br>Clique em "Histórico" para ver os chamados que você já fez.
        </p>
    </section>
    <section id="sec-chamada">
        <h1>Faça sua chamada</h1>
        <form action="../PHP/chamado.php" method="POST">
            <span>
                <label for="">Prioridade</label>
                <select name="prioridade" id="" required>
                    <option value="">Selecione</option>
                    <option value="1">Alta</option>
                    <option value="2">Normal</option>
                    <option value="3">Baixa</option>
                </select>
            </span>

            <span>
                <label for="">Assunto</label>
                <input type="text" name="title" maxlength="45" required>
            </span>

            <span id="spanDesc">
                <label for="">Descrição</label>
                <textarea name="desc" oninput="formatTxt(this)" required></textarea>
            </span>

            <span id="btnSubmit">
                <input type="submit" name="submit">
            </span>
        </form>
    </section>
    <section id="sec-histo">
        <h1>Histórico</h1>
        
        <article>
            <?php

                //Pega mais informaçaoes do banco de dados
                $result = mysqli_query($conn, "select * from tbl_chamados where id_user=" . $id);

                //Adapta as informaçoes do sql
                while($row = $result->fetch_assoc()) {  

                    //Cria uma div para cada chamado com informaçoes nessessarias
                    echo        "<div>
                                    <h1>".$row["assunto"]."</h1> <h2>Id Chamada: ".$row["id_chamada"]."</h2>
                                    <p class='pDesc'>".$row["descricao"]."</p> 
                                    <p><b>".$row["dataHora"]."</b></p> 
                                    <p><b>Prioridade: "; 
                                    //Codigo para troca prioridade numerica(1,2 e 3) para escrita(alta,media e baixa)
                                    switch ($row['prioridade']) {
                                        case 1:
                                            echo "Alta";
                                            break;
                                        case 2:
                                            echo "Média";
                                            break;
                                        case 3:
                                            echo "Baixa";
                                            break;
                                        default:
                                            break;
                                    }echo " </b></p>
                                    <p><b>".$row["status"]."</b></p>
                                </div>";
                }
            ?>
        </article>
    </section>

    <script src="inicio.js"></script>
</body>
</html>
