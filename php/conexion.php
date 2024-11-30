<?php
$server = "localhost";
$user = "root";
$database = "clinica";
$password = "Motomami55";

$conexion = mysqli_connect($server, $user, $password, $database);
if (!$conexion) {
    die("" . mysqli_connect_error());
} else {

}


?>