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
    <title>Editar Pacients</title>
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
                            <a class="dropdown-item" href="../veureUsuari.php">Veure Usuaris</a>
                            <a class="dropdown-item" href="../../menuprincipal.php">Veure Pacients</a>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Afegir
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../formUsuaris/afegirUsuariForm.html">Afegir Usuaris</a>
                            <a class="dropdown-item" href="../../Pacients/formularisPacients/afegirPacientForm.php">Afegir Pacients</a>

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
    $idUser = $_GET['idUser'];

    
// Variables connexió MySQL
$host = "localhost";
$user = "root";
$pass = "";
$db = "projectefinal";
$error = "";
// Realitzem la connexió amb la base de dades
$connect = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
        
// Sentencia SQL a executar
$sentenciasql = "SELECT * FROM users WHERE idUser = '$idUser'; ";

$sql= mysqli_query($connect, $sentenciasql);

$rowCount = mysqli_num_rows($sql);
while($mostrar=mysqli_fetch_array($sql)){
    echo '
    <div class="container">
    <form action="../editUsuari.php" method="POST" name="editusuari">
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">ID Usuari</label>
                <input type="text" readonly="readonly" class="form-control" name="idU" value = '.$mostrar['idUser'].' style="width: 30%" >
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Nom Usuari</label>
                <input type="text" class="form-control" name="nomU" value = '.$mostrar['Nom'].'>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Cognoms Usuari</label>
                <input type="text" class="form-control" name="cognomsU" value = '.$mostrar['Cognoms'].'>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">DNI/NIE</label>
                <input type="text" class="form-control" name="dniU" value = '.$mostrar['DNI'].'>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Data de naixament</label>
                <input type="date" class="form-control" name="dataNaixamentU" style="width: 60%;" value = '.$mostrar['DataNaixament'].'>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Data de Registre</label>
                <input type="date" class="form-control" name="dataRegistreU" style="width: 60%;" value = '.$mostrar['DataRegistro'].'>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="emailU" value = '.$mostrar['Email'].'>
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Nom usuari</label>
                <input type="text" class="form-control" name="usernameU" value = '.$mostrar['Username'].' >
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Contrasenya Usuari</label>
                <input type="password" class="form-control" name="contrasenyaU" value = '.$mostrar['Contrasenya'].' >
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-success">Modifica</button>
    </form>
    </div>
    
    ';


}
}
echo '
</div>
</body>
</html>
';

?>