<?php
include("..\php\conexion.php");
$curpLeida = "";
$curpQ = "";
$nombre = "";
$apellido = "";
$sexo = "F";
$edad = "";
$correo = "";
$telefono = "";
if (isset($_POST["curp"])) {
  $query = "SELECT a.*, b.correo, b.telefono FROM paciente a inner join contactopaciente b on a.curp = b.curp where a.curp = ?";
  $curpLeida = $_POST["curp"];
  if ($sentencia = mysqli_prepare($conexion, $query)) {
    mysqli_stmt_bind_param($sentencia, "s", $curpLeida);
    mysqli_stmt_execute($sentencia);
    mysqli_stmt_bind_result($sentencia, $curpQ, $nombre, $apellido, $edad, $sexo, $fecha, $correo, $telefono);
    mysqli_stmt_fetch($sentencia);
  }
  mysqli_stmt_close($sentencia);
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="..\css\crear-consulta.css" />
  <title>Crear consulta</title>
</head>

<body>
  <header>
    <div class="titulo">
      <h1>Consultorio fisioterapeutico</h1>
    </div>
    <div class="fecha">
      <p id="fecha-actual">fecha-actual</p>
    </div>
  </header>
  <hr />
  <div class="crear-titulo">
    <h2>Crear consulta</h2>
    <hr />
  </div>
  <main>
    <div class="registro">
      <h2>Ya has venido con nosotros?</h2>
      <div class="item">
        <label for="registro-existente">Ya he asistido</label>
        <input type="radio" name="asistencia" id="registro-existente" onclick="checarRegistro()" />
        <label for="asistencia">Es mi primera vez</label>
        <input type="radio" name="asistencia" id="nuevo" onclick="checarRegistro()" />
      </div>
      <br />
      <div class="campo-curp-registro">
        <form action="crear-consulta.php" method="post">
          <label for="curp">Ingresa tu CURP</label>
          <input value="<?php echo $curpLeida ?>" type="text" name="curp" id="curp-registro" />
          <input type="submit" value="Enviar" />
        </form>
      </div>
      
      <br />
    </div>
    <br />
    <form action="..\php\enviar-consulta.php" method="POST" id="enviar-info">
      <div class="formulario">
      <div class="campo" id="campoUsuarioDiv">
        <label for="curpUsuario">Curp</label>
        <input value="<?php echo $curpQ ?>" name="curpUsuario" id="curp-input" />
        </div>
        <div class="campo">
          <label for="nombre">Nombre</label>
          <input value="<?php echo $nombre ?>" name="nombre" id="nombre-input" />
        </div>
        <div class="campo">
          <label for="sexo">Sexo</label>
          <select name="sexo" id="sexo-select" value="<?php echo $sexo ?>">
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
            <option value="NR">Prefiero no decir</option>
          </select>
        </div>
        <div class="campo">
          <label for="fecha-nac">Fecha de nacimiento</label>
          <input type="date" name="fecha-nac" id="fecha-nac" value="<?php echo $fecha ?>" />
        </div>
        <div class="campo">
          <label for="edad">Edad</label>
          <input type="text" name="edad" id="edad" disabled value="<?php echo $edad ?>" />
        </div>
        <div class="campo">
          <label for="correo">Correo electronico</label>
          <input type="email" name="correo" id="correo-input" value="<?php echo $correo ?>" />
        </div>
        <div class="campo">
          <label for="numero">Numero telefonico</label>
          <input type="text" name="numero" id="numero" value="<?php echo $telefono ?>" />
        </div>
        <div class="campo">
          <label for="motivo">Motivo</label>
          <select name="motivo" id="motivo-select">
            <option value="C">Consulta</option>
            <option value="T">Terapia</option>
            <option value="TG">Terapia grupal</option>
          </select>
        </div>
        <div class="campo">
          <label for="fecha-con">Fecha de consulta</label>
          <input type="datetime-local" name="fecha-con" id="fecha-con" />
        </div>
      </div>
      <br />
      <div class="botones">
        <div class="boton">
          <input type="submit" value="Enviar">
        </div>
        <br />
        <div class="boton" >
          <button type="button" onclick="location.href = '../index.html';">Cancelar</button>
        </div>
      </div>
    </form>

  </main>

  <script src="..\js\crear-consulta.js"></script>
</body>

</html>