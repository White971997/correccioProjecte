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
    $connect = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
            
    // Sentencia SQL a executar
    $sentenciasql = "SELECT * FROM users where username = '".$mail."';";
    $sql= mysqli_query($connect, $sentenciasql);

    $rowCount = mysqli_num_rows($sql);
    $mostrar=mysqli_fetch_array($sql);
    

    if($mostrar['Contrasenya'] == $passwd){

        echo 'ok';
        header('Location: menuprincipal.php');
       
    }else{
        $error ="Contrasenya mal fatal ";
        header('Location: ../index-mal.html');
    }
    }

    




?>