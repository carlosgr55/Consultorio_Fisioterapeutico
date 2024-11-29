<?php
$server = "localhost";
$user = "root";
$database = "clinica";
$password = "Motomami55";

$conexion = mysqli_connect($server, $user, $password, $database);
if (!$conexion) {
    die("" . mysqli_connect_error());
} else {
    echo "Me pude conectar lol";
    $query = "SELECT curp, nombre FROM paciente";

    if ($sentencia = mysqli_prepare($conexion, $query)) {
        mysqli_stmt_execute($sentencia);
        mysqli_stmt_bind_result($sentencia, $curp, $nombre);
        while (mysqli_stmt_fetch($sentencia)) {
            echo "CURP ".$curp ." <br>Nombre: ".$nombre."";
        }
        mysqli_stmt_close($sentencia);
    }else{
        echo "Error en consulta ".mysqli_error($conexion);
    }

}


?>