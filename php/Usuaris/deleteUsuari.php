<?php

    eliminarpacients();
    
    
    function eliminarpacients()
    {
        $idUserBorrar = $_GET['idUser'];
        
        // Variables connexió MySQL
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "projectefinal";
        $error = "";
        // Realitzem la connexió amb la base de dades
        $connect = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
                
        // Sentencia SQL a executar
        $sentenciasql = "DELETE FROM users WHERE idUser = '$idUserBorrar'; ";
        $sql= mysqli_query($connect, $sentenciasql);
        header('Location: veureUsuari.php');
        
        
        
    }


?>

