<?php

echo '
            
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
    <title>Barris</title>
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
                            <a class="dropdown-item" href="Usuaris/veureUsuari.php">Veure Usuaris</a>
                            <a class="dropdown-item" href="#">Veure Pacients</a>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Afegir
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="Usuaris/formUsuaris/afegirUsuariForm.html">Afegir Usuaris</a>
                            <a class="dropdown-item" href="Pacients/formularisPacients/afegirPacientForm.php">Afegir Pacients</a>

                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

<div class="row">
';

    totselsbarris();
    
    
    function totselsbarris()
    {
       
        // Variables connexió MySQL
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "projectefinal";
    $error = "";
    // Realitzem la connexió amb la base de dades
    $conn = mysqli_connect ($host, $user, $pass, $db) or die ("Error de Connexió");
            
    // Sentencia SQL a executar
    /*$sentenciasql = "SELECT * FROM barris";
    $sql= mysqli_query($connect, $sentenciasql);

    $rowCount = mysqli_num_rows($sql);*/
   
    $sql = "SELECT * FROM barris"; // SQL with parameters
    $stmt = $conn->prepare($sql); 

    $stmt->execute();
    $result = $stmt->get_result(); 
    $rowCount = mysqli_num_rows($result);
    
    if($rowCount>0){

    while($mostrar = $result->fetch_assoc()){
           
            echo '
            
            <div class="col-sm-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">'.$mostrar['nomBarri'].'</h5>
                    <p class="card-text">'.$mostrar['codiPostal'].' - '.$mostrar['Poblacio'].' </p>
                    
                    <a href="Pacients/veurePacients.php?CodiPostalBarri='.$mostrar['codiPostal'].'" class="btn btn-primary">Veure llistat</a>
                </div>
            </div>
            </div>
            
            ';

        }

    }

    else{

        echo "No s'ha trobat cap registre";
    }
    
    }
    echo '
            
        </body>
        </html>
        ';

?>