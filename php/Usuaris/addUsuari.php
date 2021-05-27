<?php
addPacient();
    
    
function addPacient()
{

// Variables amb els camps del formulari  
    $nom = $_POST['nomU'];
    $cognoms = $_POST['cognomsU'];
    $dni = $_POST['dniU'];
    $dataNaixament = $_POST['dataNaixamentU'];
    $dataRegistre = $_POST['dataRegistreU'];
    $username = $_POST['usernameU'];
    $password = $_POST['contrasenyaU'];
    $email = $_POST['emailU'];
// Variables connexió MySQL
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "projectefinal";
    $error = "";
// Realitzem la connexió amb la base de dades
    $connect = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
    
$sentenciasql = "INSERT INTO `users` (`idUser`, `Nom`, `Cognoms`, `DNI`, `DataNaixament`, `DataRegistro`, `Username`, `Contrasenya`, `Email`)
VALUES (NULL, '$nom', '$cognoms', '$dni', '$dataNaixament', '$dataRegistre', '$username', '$password', '$email');";

$sql= mysqli_query($connect, $sentenciasql);        
header('Location: veureUsuari.php');

}
?>