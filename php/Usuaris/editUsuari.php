<?php
editPacient();
    
    
function editPacient()
{ 
    //seguretat de scripts
    require_once("../class.inputfilter.php");
    $ifilter = new InputFilter();

// Variables amb els camps del formulari
    $idUsuari = $ifilter->process($_POST['idU']);
    $nom = $ifilter->process($_POST['nomU']);
    $cognoms = $ifilter->process($_POST['cognomsU']);
    $dni = $ifilter->process($_POST['dniU']);
    $dataNaixament = $_POST['dataNaixamentU'];
    $dataRegistre = $_POST['dataRegistreU'];
    $username = $ifilter->process($_POST['usernameU']);
    $password =$ifilter->process($_POST['contrasenyaU']) ;
    $email = $ifilter->process($_POST['emailU']);

// Variables connexió MySQL
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "projectefinal";
    $error = "";
// Realitzem la connexió amb la base de dades
    $connect = mysqli_connect($host, $user, $pass, $db) or die ("Error de Connexió");
    
$sentenciasql = "UPDATE users SET Nom= ?, Cognoms = ?, DNI = ?, DataNaixament =?, DataRegistro =?, Username = ?,Contrasenya =?, Email =? 
WHERE users.idUser = ?; ";

    $stmt = $connect->prepare($sentenciasql); 
    $stmt->bind_param("ssssssssi", $nom, $cognoms, $dni, $dataNaixament, $dataRegistre, $username, $password, $email ,$idUsuari );
    $stmt->execute();
    $result = $stmt->get_result(); 
//echo $stmt->error;
//$sql= mysqli_query($connect, $sentenciasql);        
header('Location: veureUsuari.php');
}
?>