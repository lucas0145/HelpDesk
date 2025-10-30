<?php
    include_once("../PHP/conn.php");

    session_start();
    //Pega o id do usuario guardado na sessao
    $id = $_SESSION['id'];

    //Pega informaçoes no banco de dados
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

        <a href="../index.html" id="btnSair" onclick="sairFnc()">Sair</a>
    </nav>

    <section id="sec-histo">
        <h1>Lista de Chamados</h1>

        <form action="../PHP/sort.php" method="POST">

            <label>Sort By: </label>

            <select name="sortTxt" id="sortInp">
                <option value="">Coluna MySQL</option>
                <option value="id_user">Usuario</option>
                <option value="prioridade">Prioridade</option>
                <option value="dataHora">Data e Hora</option>
                <option value="status">Status</option>
                <option value="responsavel">Responsavel</option>
            </select>

            <select name="sortDir" id="sortDir">
                <option value="asc">Crescente</option>
                <option value="desc">Decrescente</option>
            </select>

            <br><br>

            <label>Group by: </label>

            <select name="groupTxt" id="groupTxt">
                <option value="">Coluna MySQL</option>
                <option value="id_user">Usuario</option>
                <option value="prioridade">Prioridade</option>
                <option value="dataHora">Data e Hora</option>
                <option value="status">Status</option>
                <option value="responsavel">Responsavel</option>
            </select>

            <select name="groupMeth" id="groupMeth">
                <option value="">Group By Method</option>
                <option value="sum(x)">Soma</option>
                <option value="count(x)">Contar</option>
            </select>

            <br><br>

            <input type="submit" value="Enviar" onclick="sortFnc()">
        </form>

            
        <article>

            <?php

                //Verifica se o elemento e nada e ignora o erro
                error_reporting(1);

                //Pega informaçao da sessão
                $sortElement = $_SESSION["sortElement"];
                $sortTxt = $_SESSION["sortTxt"];
                $groupTxt = $_SESSION["groupTxt"];
                $groupMeth = $_SESSION["groupMeth"];

                // echo $groupTxt. " -- ". $groupMeth . "--" . $sortTxt . "<br>";
                // echo "select * $groupMeth from tbl_chamados as c left join tbl_users as u on c.id_user = u.id $groupTxt $sortTxt <br>";

                //Pega mais informaçaoes do banco de dados
                $result = mysqli_query($conn, "select * $groupMeth from tbl_chamados as c left join tbl_users as u on c.id_user = u.id $groupTxt $sortTxt"  /*$sortElement*/);
                
                // echo $groupTxt;

                if ($groupTxt == "") {
                    
                    //Adapta as informaçoes do sql
                    while($row = $result->fetch_assoc()) {  

                        //Guarda na sessão o id da chamada
                        $_SESSION["id_chamada"] = $row["id_chamada"];  

                        //Cria uma div para cada chamado com informaçoes nessessarias
                        echo    "<div>
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
                }else {

                    while($row = $result->fetch_assoc()) {  
                        
                        //Guarda na sessão o id da chamada
                        $_SESSION["id_chamada"] = $row["id_chamada"];  

                        $colName = explode('(', $groupMeth)[1];
                        $colName = explode(')', $colName)[0];

                        // echo $groupMeth;

                        //Cria uma div para cada chamado com informaçoes nessessarias
                        echo    "<h1 class='groupResult'>
                                    Encontrado ". $row[substr($groupMeth, 2, strlen($groupMeth))] ." chamado  com ". $colName ." ". $row[$colName] . "
                                </h1>";

                    }
                }
            ?>
        </article>

    </section>

    <script src="admin.js"></script>
</body>
</html>
