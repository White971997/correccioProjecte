<?php

echo '
<html>            
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- implementacio de css amb bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    <!-- el meu css -->
    <link rel="stylesheet" type="text/css" href="../css/stylepopup.css">
    <!--el meu js
    <script src="../js/popup.js"></script>-->
    <title>Afegir Pacients</title>
</head>
<body>
<div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../../menuprincipal.php">Inici</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Veure
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../../Usuaris/veureUsuari.php">Veure Usuaris</a>
                            <a class="dropdown-item" href="../../menuprincipal.php">Veure Pacients</a>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Afegir
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../../Usuaris/formUsuaris/afegirUsuariForm.html">Afegir Usuaris</a>
                            <a class="dropdown-item" href="../formularisPacients/afegirPacientForm.php">Afegir Pacients</a>

                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<div>
<br>
';

recollirDades();
    
function recollirDades()
{
    

    
// Variables connexió MySQL
$host = "localhost";
$user = "root";
$pass = "";
$db = "projectefinal";
$error = "";
// Realitzem la connexió amb la base de dades
$connect = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
        
// Sentencia SQL a executar
$sentenciasql = "SELECT * FROM vacunes; ";

$stmt = $connect->prepare($sentenciasql); 
    $stmt->execute();
    $result = $stmt->get_result(); 
     
    $rowCount = mysqli_num_rows($result);

    echo '
    <div class="container">
    <form action="../addPacient.php" method="POST" name="editpacient">
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">ID Pacient</label>
                <input type="text" readonly="readonly" class="form-control" name= "idP" style="width: 30%";>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Nom del Pacient</label>
                <input type="text" class="form-control" name="nomP" style="width: 70%";>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Cognoms del pacient</label>
                <input type="text" class="form-control" name = "cognomsP" >
            </div>
            <div class="col">
                <label for="exampleInputEmail1">DNI/NIE</label>
                <input type="text" class="form-control" name = "dniP" >
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">Data de naixament</label>
                <input type="date" class="form-control" name = "dataNaixamentP"  style="width: 60%;">
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Direcció</label>
                <input type="text" class="form-control" name = "direccioP" >
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Codi Postal</label>
                <input type="text" class="form-control" name = " codiPostalP">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">Vacuna</label>
                <select class="form-select" name = "idVacunaP" aria-label="Default select example">
                    <option selected>Selecciona una vacuna...</option>';
                    
                    while($mostrar = $result->fetch_assoc()){
                        echo '<option name = "idVacunaPa" value="'.$mostrar['idVacuna'].'">'.$mostrar['NomVacuna'].'</option>';
                    }
                echo '  
                </select>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Data 1ª dosis</label>
                <input type="date" class="form-control" name = "dPrimeraDosiP" style="width: 60%;">
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Data 2ª Dosis</label>
                <input type="date" class="form-control" name = "dSegonaDosiP"  style="width: 60%;">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="exampleFormControlTextarea1">Observacions</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name = "obsP"  rows="3"></textarea>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Afegeix</button>
    </form>
    </div>
    
    ';


}
echo '
</div>
</body>
</html>
';

?>