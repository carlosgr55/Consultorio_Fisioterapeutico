<?php
session_start();






?>



<!DOCTYPE html>
<html lang="en">

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
          <input type="text" name="curp" id="curp-registro" />
          <input type="submit" value="Enviar" />
        </form>
      </div>
      <div class="campo-curp-primera">
        <label for="curp">Ingresa tu CURP</label>
        <input type="text" name="curp" id="curp-registro" />
      </div>
      <br />
    </div>
    <br />
    <div class="formulario">
      <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre-input" />
      </div>
      <div class="campo">
        <label for="sexo">Sexo</label>
        <select name="sexo" id="sexo-select">
          <option value="F">Femenino</option>
          <option value="M">Masculino</option>
          <option value="N">Prefiero no decir</option>
        </select>
      </div>
      <div class="campo">
        <label for="fecha-nac">Fecha de nacimiento</label>
        <input type="date" name="fecha-nac" id="fecha-nac" />
      </div>
      <div class="campo">
        <label for="edad">Edad</label>
        <input type="text" name="edad" id="edad" disabled />
      </div>
      <div class="campo">
        <label for="correo">Correo electronico</label>
        <input type="email" name="correo" id="correo-input" />
      </div>
      <div class="campo">
        <label for="numero">Numero telefonico</label>
        <input type="text" name="numero" id="numero" />
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
        <button type="button">Enviar</button>
      </div>
      <br />
      <div class="boton">
        <button type="button">Cancelar</button>
      </div>
    </div>
  </main>

  <script src="..\js\crear-consulta.js"></script>
</body>

</html>