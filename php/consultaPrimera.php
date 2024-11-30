<?php
include("..\php\conexion.php");

if ($_POST) {

    $curp = $_POST["curpUsuario"];
    $nombre = $_POST["nombre"];
    $fecha_nac = $_POST["fecha-nac"];
    $sexo = $_POST["sexo"];
    $correo = $_POST["correo"];
    $telefono = $_POST["numero"];

    $queryPaciente = "INSERT INTO paciente(curp, nombre, sexo, fecha_nac) value (?,?,?,?) ";
    $sentenciaPaciente = mysqli_prepare($conexion, $queryPaciente);
    mysqli_stmt_bind_param($sentenciaPaciente,"ssss",$curp, $nombre, $sexo, $fecha_nac);
    mysqli_stmt_execute($sentenciaPaciente);

    $queryContacto = "INSERT INTO contactoPaciente(curp, telefono, correo) value (?,?,?)";
    $sentenciaContacto = mysqli_prepare($conexion, $queryContacto);
    mysqli_stmt_bind_param($sentenciaContacto, "sss", $curp,$telefono, $correo);
    mysqli_stmt_execute($sentenciaContacto);

    $mensaje = "";
    $motivo = $_POST["motivo"];
    if($motivo == "T" || $motivo == "TG") {
        $motivo = "Terapia";
    }else{
        $motivo = "Consulta";
    }
    $fecha = $_POST["fecha-con"];
    $fecha = substr($fecha,0,10);

    $query = "INSERT INTO consulta(fecha, tipo, paciente) value (?,?,?)";
    $sentencia = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($sentencia,"sss", $fecha, $motivo, $curp);
    if(mysqli_stmt_execute($sentencia)){
        $mensaje = "CONSULTA CREADA CON EXITO";
    }else{
        $mensaje = "ERROR AL CREAR LA CONSULTA";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="..\css\creada.css" />
    <title>Clinica fit</title>
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
    <br />
    <hr />
    <nav>
      <div class="contenedor-menu">
        <div class="dropdown">
          <button>
            <h2>Sobre nosotros</h2>
          </button>
          <div class="dropdown-content">
            <ul>
              <li>
                <a href="..\htmls\Nosotros.html">Nosotros</a>
              </li>
              <li>
                <a href="..\htmls\Mision-valores-vision.html"
                  >Mision, vision y valores</a
                >
              </li>
              <li>
                <a href="..\htmls\nuestro-equipo.html">Nuestro equipo</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="dropdown">
          <button>
            <h2>Nuestros servicios</h2>
          </button>
          <div class="dropdown-content">
            <ul>
              <li>
                <a href="..\htmls\consulta-servicio.html">Consulta</a>
              </li>
              <li>
                <a href="..\htmls\pendiente.html">Terapia</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="inicio-sesion">
          <a href="..\htmls\iniciar-sesion.html">Iniciar sesion</a>
        </div>
      </div>
    </nav>

    <hr />

    <main>
      <br />
      <div class="contenido">
        
        <p><?php echo $mensaje?></p>
     
      </div>
    </main>
    <hr />
    <footer>
      <div class="politicas">
        <h3>Politicas</h3>
        <ul>
          <li>
            <a href=".\htmls\politicas.html">Politica de privacidad</a>
          </li>
          <li>
            <a href=".\htmls\politicas.html">Terminos de servicio</a>
          </li>
        </ul>
      </div>
      <div class="contactanos">
        <h3>Contactanos</h3>
        <p>redes</p>
      </div>
    </footer>
    <br />

    <script>
      function fecha(){
      var now = new Date();
      var datetime = now.toLocaleString();

      // Insert date and time into HTML
      document.getElementById("fecha-actual").innerHTML = datetime;}
      setInterval(fecha, 1000);
    </script>
  </body>
</html>
