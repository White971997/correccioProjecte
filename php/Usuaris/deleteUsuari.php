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
        $sentenciasql = "DELETE FROM users WHERE idUser = ?; ";
        $stmt = $connect->prepare($sentenciasql); 
        $stmt->bind_param("i", $idUserBorrar );
        $stmt->execute();
        $result = $stmt->get_result(); 
        //echo $stmt->error;
       // $sql= mysqli_query($connect, $sentenciasql);
        header('Location: veureUsuari.php');
        
        
        
    }


?>

