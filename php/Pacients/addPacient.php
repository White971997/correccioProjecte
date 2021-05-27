<?php
addPacient();
    
    
function addPacient()
{
    //seguretat de scripts
    require_once("../class.inputfilter.php");
    $ifilter = new InputFilter();
    
// Variables amb els camps del formulari
    $idPacient = NULL;
    $idVacuna = $_POST['idVacunaP'];
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
    
$sentenciasql = "INSERT INTO `pacients` (`idPacient`, `NomPacient`, `CognomsPacient`, `DNI`, `DataNaixament`, `Direccio`, `CodiPostal`, `DataPrimeraDosi`, `DataSegonaDosi`, `idVacuna`, `Observacions`)
VALUES (?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?);";

$stmt = $connect->prepare($sentenciasql); 
$stmt->bind_param("sssssssssss", $idPacient, $nom, $cognoms, $dni, $dataNaixament, $direccio, $codiPostal, $dataPrimeraDosi, $dataSegonaDosi, $idVacuna, $observacions );
$stmt->execute();
$result = $stmt->get_result();      

echo $stmt->error;
header('Location: ../menuprincipal.php');

}
?>