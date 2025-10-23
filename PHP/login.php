<?php

if (isset($_POST['submit'])) {
    
        //Chama o php com conexão mySql
        include_once("conn.php");

        //Inicia as variaveis com os inputs do form
        $senhaR = $_POST['senha'];
        $matriculaR = $_POST['matricula'];

        $result = mysqli_query($conn, "select * from tbl_users");

      //Codigo antigo que eu fiquei com medo de apagar//Codigo antigo que eu fiquei com medo de apagar
        //header("Location: ../Inicio/inicio.html");

        // echo "<br><br>";
        // while($row = $result->fetch_assoc()) {
        //     echo $row["matriculaSimples"];
        //     echo "__";
        //     echo $row["senha"];
        //     echo "<br>";
        // }

        //Adaptação dos dados do select
        while($row = $result->fetch_assoc()) {

            //Verificação de conta admin
            if ($row["isAdmin"] == '0') {
                $url = "Location: ../Inicio/inicio.php";
            } else if ($row["isAdmin"] == '1'){
                $url = "Location: ../Admin/admin.php";
            }

            //Verificação da matricula
            if ($matriculaR == $row["matriculaSimples"]) {

                echo "matricula certa <br>";

                //Verificação da senha
                if ($row["senha"] == $senhaR) {
                    session_start();
                    $_SESSION['id'] = $row["id"];
                    header($url);
                    echo "senha certa <br>";
                    die;
                    
                }else {
                    echo "senha errada <br>";
                }
            }else {
                echo "matricula errada <br>";
            }
        }
        echo "Sai do while";
        header("Location: ../Login/login.html?statusLogin=" . urlencode(0));
    }

    $codeUrl = explode("?", $_SERVER['REQUEST_URI']);

    for ($i=0; $i < count($codeUrl); $i++) { 
        
        if (strpos($codeUrl[$i], "login.php") == false) {
            
            $loginInfo = explode("%", $codeUrl[$i]);
            $matriculaR = $loginInfo[0];
            $senhaR = $loginInfo[1];

                    //Chama o php com conexão mySql
            include_once("conn.php");

            $result = mysqli_query($conn, "select * from tbl_users");

            //Adaptação dos dados do select
            while($row = $result->fetch_assoc()) {

                //Verificação de conta admin
                if ($row["isAdmin"] == '0') {
                    $url = "Location: ../Inicio/inicio.php";
                } else if ($row["isAdmin"] == '1'){
                    $url = "Location: ../Admin/admin.php";
                }

                //Verificação da matricula
                if ($matriculaR == $row["matriculaSimples"]) {

                    echo "matricula certa <br>";

                    //Verificação da senha
                    if ($row["senha"] == $senhaR) {
                        session_start();
                        $_SESSION['id'] = $row["id"];
                        header($url);
                        echo "senha certa <br>";
                        die;
                        
                    }else {
                        echo "senha errada <br>";
                    }
                }else {
                    echo "matricula errada <br>";
                }
            }
        }
    }
?>  



<script scr='../Login/login.js'></script>



