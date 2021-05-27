<?php
editPacient();
    
    
function editPacient()
{
    //seguretat de scripts
    require_once("../class.inputfilter.php");
    $ifilter = new InputFilter();
    
// Variables amb els camps del formulari
    $idPacient = $ifilter->process($_POST['idP']);
    $nom = $ifilter->process($_POST['nomP']);
    $cognoms = $ifilter->process($_POST['cognomsP']);
    $dni = $ifilter->process($_POST['dniP']);
    $direccio = $ifilter->process($_POST['direccioP']);
    $codiPostal = $ifilter->process($_POST['codiPostalP']);
    $dataNaixament = $_POST['dataNaixamentP'];
    $dataPrimeraDosi = $_POST['dPrimeraDosiP'];
    $dataSegonaDosi= $_POST['dSegonaDosiP'];
    $observacions = $ifilter->process($_POST['obsP']);

// Variables connexió MySQL
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "projectefinal";
    $error = "";
// Realitzem la connexió amb la base de dades
    $connect = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
    
$sentenciasql = "UPDATE pacients SET NomPacient= ?, CognomsPacient = ?, DNI = ?, DataNaixament =?, Direccio =?,
DataPrimeraDosi =?, DataSegonaDosi =?, Observacions = ?
WHERE pacients.idPacient = ?; ";

$stmt = $connect->prepare($sentenciasql); 
$stmt->bind_param("ssssssssi", $nom, $cognoms, $dni, $direccio, $dataNaixament, $dataPrimeraDosi, $dataSegonaDosi, $observacions, $idPacient );
$stmt->execute();
$result = $stmt->get_result(); 
//echo $sentenciasql;
//echo $stmt->error;

//$sql= mysqli_query($connect, $sentenciasql);        
header('Location: ../menuprincipal.php');
}
?>