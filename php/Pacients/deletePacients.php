<?php

    eliminarpacients();
    
    
    function eliminarpacients()
    {
        $idPacientBorrar = $_GET['idPacient'];
        $cpostal = $_GET['coPostal'];
        echo $cpostal;
        
        // Variables connexió MySQL
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "projectefinal";
        $error = "";
        // Realitzem la connexió amb la base de dades
        $connect = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
                
        // Sentencia SQL a executar
        $sentenciasql = "DELETE FROM pacients WHERE idPacient = ? ";

        $stmt = $connect->prepare($sentenciasql); 
        $stmt->bind_param("i", $idPacientBorrar );
        $stmt->execute();
        $result = $stmt->get_result(); 
        //$sql= mysqli_query($connect, $sentenciasql);
        header('Location: veurePacients.php?CodiPostalBarri='.(string)$cpostal.'');
        
        
        
    }


?>

