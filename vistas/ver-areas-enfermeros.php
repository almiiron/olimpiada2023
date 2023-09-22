<?php
include("../php/conexion.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Áreas-Enfermeros</title>
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



    <div class="contenedor-general contenedor-areas-enfermeros">
        <div class="titulo-general titulo-areas-enfermeros">Áreas-Enfermeros</div>
        <div class="header-general">ID Área</div>
        <div class="header-general">Nombre del Área</div>
        <div class="header-general">ID del Enfermero</div>
        <div class="header-general">Nombre del Enfermero</div>
        <div class="header-general">Apellido del Enfermero</div>
        <div class="header-general">DNI del Enfermero</div>
        <!-- <div class="header-general">Modificar</div> -->

        <?php
        $id = $_GET['id'];
        $areas = "SELECT
        ae.id_area,
        a.nombre_area AS nombreArea,
        ae.id_enfermero,
        p.nombre,
        p.apellido,
        p.dni
    FROM
        areas_enfermeros ae
    INNER JOIN
        areas a ON ae.id_area = a.id_area
    INNER JOIN
        enfermeros en ON ae.id_enfermero = en.id_enfermero
    INNER JOIN
        personas p ON en.id_persona = p.id_persona
    WHERE ae.id_area = '$id'

         ";
        $resultado = mysqli_query($conn, $areas);
        while ($row = mysqli_fetch_assoc($resultado)) { ?>

            <div class="item-tabla">
                <?php echo $row['id_area'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['nombreArea'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['id_enfermero'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['nombre'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['apellido'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['dni'] ?>
            </div>

            <!-- <div class="item-tabla">
                <a style="color:blue;" href="actualizar-paciente.php?id=<?php echo $row['idEnfermero'] ?>">Modificar</a>
            </div> -->


        <?php } ?>
    </div>
    <script src="\olimpiadas2023\config\js.js"> </script>

</body>

</html>