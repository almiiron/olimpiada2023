<?php
include("../php/conexion.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Estado Paciente</title>
    <link rel="stylesheet" href="../config/estilos.css">

<body>
    <?php include("nav.php"); ?>


    <div class="contenedor-buscador">
        <form action="" method="GET">
            <input class="buscador" type="search" placeholder="Busca un usuario" name="busqueda">
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
      OR obra_social LIKE '%$busqueda%' OR enfermedad_hereditaria LIKE '%$busqueda%' OR";
        }

    }
    if (isset($_GET['reset_busqueda'])) {
        $where = "";
    } ?>



    <div class="contenedor-general contenedor-areas-estado-pacientes">
        <div class="titulo-general titulo-areas-estado-pacientes">Ver Estado Paciente</div>
        <div class="header-general">ID del Paciente</div>
        <div class="header-general">Nombre del Paciente</div>
        <div class="header-general">Apellido del Paciente</div>
        <div class="header-general">DNI del Paciente</div>

        <div class="header-general">ID del Enfermero</div>
        <div class="header-general">Nombre del Enfermero</div>
        <div class="header-general">Apellido del Enfermero</div>
        <div class="header-general">DNI del Enfermero</div>

        <div class="header-general">Estado de Consciencia</div>
        <div class="header-general">Primer Diagnostico</div>
        <div class="header-general">Diagnostico Fina</div>
        <div class="header-general">Tipo Llegada</div>
        <div class="header-general">Fecha-Hora Ingreso</div>
        <div class="header-general">Fecha-Hora Egreso</div>

        <?php
        $id = $_GET['id'];
        $areas = "SELECT
        ep.*,
        pp.nombre AS nombre_paciente,
        pp.apellido AS apellido_paciente,
        pp.dni AS dni_paciente,
        
        ep.id_enfermero AS enfermero,
        pe.nombre AS nombre_enfermero,
        pe.apellido AS apellido_enfermero,
        pe.dni AS dni_enfermero
        FROM
        estado_paciente ep
        JOIN pacientes p ON ep.id_paciente = p.id_paciente
        JOIN enfermeros e ON ep.id_enfermero = e.id_enfermero
        JOIN personas pp ON p.id_persona = pp.id_persona
        JOIN personas pe ON e.id_persona = pe.id_persona
        WHERE ep.id_paciente = '$id'

         ";
        $resultado = mysqli_query($conn, $areas);
        while ($row = mysqli_fetch_assoc($resultado)) { ?>

            <div class="item-tabla">
                <?php echo $row['id_paciente'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['nombre_paciente'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['apellido_paciente'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['dni_paciente'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['enfermero'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['nombre_enfermero'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['apellido_enfermero'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['dni_enfermero'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['estado_conciencia'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['primer_diagnostico'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['diagnostico_final'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['tipo_llegada'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['fecha_hora_ingreso'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['fecha_hora_egreso'] ?>
            </div>
        

            <!-- <div class="item-tabla">
                <a style="color:blue;" href="actualizar-paciente.php?id=<?php echo $row['idEnfermero'] ?>">Modificar</a>
            </div> -->


        <?php } ?>
    </div>
    <script src="\olimpiadas2023\config\js.js"> </script>

</body>

</html>