<?php
editPacient();
    
    
function editPacient()
{

// Variables amb els camps del formulari
    $idUsuari = $_POST['idU'];
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
    
$sentenciasql = "UPDATE users SET Nom= '$nom', Cognoms = '$cognoms', DNI = '$dni', DataNaixament ='$dataNaixament', DataRegistro ='$dataRegistre', Username = '$username',
Contrasenya ='$password', Email ='$email'
WHERE users.idUser = '$idUsuari'; ";

$sql= mysqli_query($connect, $sentenciasql);        
header('Location: veureUsuari.php');
}
?>