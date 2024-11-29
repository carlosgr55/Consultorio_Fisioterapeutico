<?php
$servidor = "localhost";
$usuario = "root";
$base = "clinica";
$password = "Motomami55";


    $conexion = mysqli_connect($servidor, $usuario,$password, $base);
    echo "Conexion establecida";

    $sql = "SELECT curp, nombre FROM paciente";
    $resultado = mysqli_query( $conexion, $sql);
    $campos = $resultado -> fetch_fields();

    foreach($campos as $val){
        echo "CURP ".$val -> curp;
        echo "Nombre ".$val -> nombre;

    }

    print_r($resultado);

?>