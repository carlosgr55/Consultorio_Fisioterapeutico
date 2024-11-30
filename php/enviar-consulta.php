<?php
include("..\php\conexion.php");

if ($_POST) {
    $motivo = $_POST["motivo"];
    if($motivo == "T" || $motivo == "TG") {
        $motivo = "Terapia";
    }else{
        $motivo = "Consulta";
    }
    $curp = $_POST["curpUsuario"];
    $fecha = $_POST["fecha-con"];
    $fecha = substr($fecha,0,10);

    $query = "INSERT INTO consulta(fecha, tipo, paciente) value (?,?,?)";
    $sentencia = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($sentencia,"sss", $fecha, $motivo, $curp);
    mysqli_stmt_execute($sentencia);
}
?>
