<?php

	
    login();
    
    
    
    function login()
    {

        // Variables amb els camps del formulari
	$mail = $_POST['email'];
	$passwd = $_POST['password'];

    // Variables connexió MySQL
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "projectefinal";
    $error = "";
    // Realitzem la connexió amb la base de dades
    $conn = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
            
    // Sentencia SQL a executar
    //$sentenciasql = "SELECT * FROM users where username = '".$mail."' and contrasenya = '".$passwd."' ;";
    //$sql= mysqli_query($connect, $sentenciasql);

    $sql = "SELECT * FROM users WHERE username=? and contrasenya =?"; // SQL with parameters
    $stmt = $conn->prepare($sql); 

    $stmt->bind_param("ss", $mail, $passwd);
    $stmt->execute();
    $result = $stmt->get_result(); 
    $mostrar = $result->fetch_assoc(); 
    $rowCount = mysqli_num_rows($result);

    
    
    if($rowCount>0){
        echo 'ok';
        header('Location: menuprincipal.php');
    }else{
        
        echo 'Contrasenya mal fatal';
        header('Location: ../index-mal.html');
    }
    /*if($mostrar['Contrasenya'] == $passwd){

        echo 'ok';
        header('Location: menuprincipal.php');
       
    }else{
        
        echo 'Contrasenya mal fatal';
        header('Location: ../index-mal.html');
    }*/
    
    }

?>