<?php
include("../php/conexion.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Pacientes</title>
  <link rel="stylesheet" href="../config/estilos.css">

  <!-- <style>
    .carga-usuario {
      background: #e9d900;
      border: 0;
      padding: 7px 24px;
      color: black;
      transition: 0.4s;
      border-radius: 10px;
      cursor: pointer;
      height: 60px;
      text-decoration: none;
      width: 190px;
      margin-left: 1150px;
      margin-top: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .carga-usuario:hover {
      color: black;
    }
  </style> -->

<body>
  <?php include("nav.php"); ?>


  <div class="contenedor-buscador">
    <form action="" method="GET">
      <input class="buscador" type="search" placeholder="Busca un paciente" name="busqueda">
      <button class="boton_buscar" type="submit" name="enviar">Buscar</button>
      <button class="boton_reset" type="submit" name="reset_busqueda">Reiniciar Busqueda</button>
    </form>
  </div>

  <?php
  $where = "";
  if (isset($_GET['enviar'])) {
    $busqueda = $_GET['busqueda'];


    if (isset($_GET['busqueda'])) {
      $where = "WHERE pe.nombre LIKE '%$busqueda%' OR pe.apellido LIKE '%$busqueda%' OR pe.dni LIKE '%$busqueda%' OR pe.grupo_etario LIKE '%$busqueda%' 
      OR pe.sexo LIKE '%$busqueda%' OR d.descripcion_direccion LIKE '%$busqueda%' OR c.descripcion_contacto LIKE '%$busqueda%' 
      OR obra_social LIKE '%$busqueda%' OR enfermedad_hereditaria LIKE '%$busqueda%' OR pa.id_paciente LIKE '%$busqueda%' ";
    }

  }
  if (isset($_GET['reset_busqueda'])) {
    $where = "";
  } ?>



  <div class="contenedor-general contenedor-pacientes">
    <div class="titulo-general titulo-pacientes">Pacientes</div>
    <div class="header-general">ID Paciente</div>
    <div class="header-general">Nombre</div>
    <div class="header-general">Apellido</div>
    <div class="header-general">DNI</div>
    <div class="header-general">Edad</div>
    <div class="header-general">Sexo</div>
    <div class="header-general">Direccion</div>
    <div class="header-general">Contacto</div>
    <div class="header-general">Obra Social</div>
    <div class="header-general">Enfermedad Hereditaria</div>
    <div class="header-general">Ver Estado Paciente</div>
    <div class="header-general">Modificar</div>

    <?php
    $pacientes = "SELECT
    pa.id_paciente as idPaciente,
    obra_social,
    enfermedad_hereditaria,

    pe.nombre AS nombrePaciente,
    pe.apellido AS apellidoPaciente,
    pe.dni AS dni,
    pe.grupo_etario AS edad,
    pe.sexo AS sexo,

    pe.id_direccion, d.id_direccion,
    d.descripcion_direccion AS direccion,

    pe.id_contacto, c.id_contacto,
    c.descripcion_contacto AS contacto

    FROM pacientes pa
    INNER JOIN personas pe ON pa.id_persona = pe.id_persona
    INNER JOIN direcciones d ON d.id_direccion = pe.id_direccion
    INNER JOIN contactos c ON c.id_contacto = pe.id_contacto $where ";
    $resultado = mysqli_query($conn, $pacientes);
    while ($row = mysqli_fetch_assoc($resultado)) { ?>
      <div class="item-tabla">
        <?php echo $row['idPaciente'] ?>
      </div>
      <div class="item-tabla">
        <?php echo $row['nombrePaciente'] ?>
      </div>
      <div class="item-tabla">
        <?php echo $row['apellidoPaciente'] ?>
      </div>
      <div class="item-tabla">
        <?php echo $row['dni'] ?>
      </div>
      <div class="item-tabla">
        <?php echo $row['edad'] ?>
      </div>
      <div class="item-tabla">
        <?php echo $row['sexo'] ?>
      </div>
      <div class="item-tabla">
        <?php echo $row['direccion'] ?>
      </div>
      <div class="item-tabla">
        <?php echo $row['contacto'] ?>
      </div>
      <div class="item-tabla">
        <?php echo $row['obra_social'] ?>
      </div>
      <div class="item-tabla">
        <?php echo $row['enfermedad_hereditaria'] ?>
      </div>


      <div class="item-tabla">
        <a style="color:blue;" href="ver-estado-paciente.php?id=<?php echo $row['idPaciente'] ?>">Ver Estado Paciente</a>
      </div>
      <div class="item-tabla">
        <a style="color:blue;" href="#.php?id=<?php echo $row['idPaciente'] ?>">Modificar</a>
      </div>


    <?php } ?>
  </div>
  <script src="\olimpiadas2023\config\js.js"> </script>

</body>

</html>