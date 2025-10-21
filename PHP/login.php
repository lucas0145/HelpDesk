<?php

if (isset($_POST['submit'])) {
    
        include_once("conn.php");

        $senhaR = $_POST['senha'];
        $matriculaR = $_POST['matricula'];

        $result = mysqli_query($conn, "select * from tbl_users");

        //header("Location: ../Inicio/inicio.html");

        // echo "<br><br>";
        // while($row = $result->fetch_assoc()) {
        //     echo $row["matriculaSimples"];
        //     echo "__";
        //     echo $row["senha"];
        //     echo "<br>";
        // }

        while($row = $result->fetch_assoc()) {

            if ($row["isAdmin"] == '0') {
                $url = "Location: ../Inicio/inicio.php";
            } else if ($row["isAdmin"] == '1'){
                $url = "Location: ../Admin/admin.php";
            }

            if ($matriculaR == $row["matriculaSimples"]) {

                echo "matricula certa <br>";

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
?>  

<script scr='../Login/login.js'></script>



