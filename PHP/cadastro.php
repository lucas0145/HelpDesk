<?php

include_once("conn.php");

if (isset($_POST['submit'])) {
    

        $matriculaR = $_POST['matricula'];
        $nomeR = $_POST['nome'];
        $setorR = $_POST['setor'];
        $ramalR = $_POST['ramal'];
        $senhaR = $_POST['senha'];

        echo "<br>Peguei as info<br>";

        // print_r($matricula);
        // print_r($senha);
        // print_r($setor);
        // print_r($ramal);
        // print_r($nome)
         
        $result = mysqli_query($conn, "select * from tbl_users");

        echo "<br> Fiz o Result<br>";

        while($row = $result->fetch_assoc()) {

            echo "<br>Estou no while : ".$row["matriculaSimples"]."--".$matriculaR. "<br>";

            if ($matriculaR == $row["matriculaSimples"]) {

                header("Location: ../Cadastro/cadastro.html?MR");
                die;

            }else {
 
                $result = mysqli_query($conn, "insert into tbl_users(id, isAdmin, matriculaSimples, nome, setor, ramal, senha) values (null, 0, '$matriculaR', '$nomeR', '$setorR', '$ramalR', '$senhaR')");
                header("Location: ../Login/login.html");
                die;
            }
        }

        echo "<br>Se eu apareci nao teve while<br>";
    }

?>

