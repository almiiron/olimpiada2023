<?php
include("../php/conexion.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Áreas</title>
    <link rel="stylesheet" href="../config/estilos.css">

<body>
    <?php include("nav.php"); ?>


    <div class="contenedor-buscador">
        <form action="" method="GET">
            <input class="buscador" type="search" placeholder="Busca un área" name="busqueda">
            <button class="boton_buscar" type="submit" name="enviar">Buscar</button>
            <button class="boton_reset" type="submit" name="reset_busqueda">Reiniciar Busqueda</button>
        </form>
    </div>

    <?php
    $where = "";
    if (isset($_GET['enviar'])) {
        $busqueda = $_GET['busqueda'];


        if (isset($_GET['busqueda'])) {
            $where = "WHERE nombre_area LIKE '%$busqueda%' ";
        }

    }
    if (isset($_GET['reset_busqueda'])) {
        $where = "";
    } ?>



    <div class="contenedor-general contenedor-areas">
        <div class="titulo-general titulo-areas">Áreas</div>
        <div class="header-general">ID Área</div>
        <div class="header-general">Nombre del Área</div>
        <div class="header-general">Área-Pacientes</div>
        <div class="header-general">Área-Enfermeros</div>

        <!-- <div class="header-general">Modificar</div> -->

        <?php
        $areas = "SELECT * FROM areas $where";
        $resultado = mysqli_query($conn, $areas);
        while ($row = mysqli_fetch_assoc($resultado)) { ?>

            <div class="item-tabla">
                <?php echo $row['id_area'] ?>
            </div>
            <div class="item-tabla">
                <?php echo $row['nombre_area'] ?>
            </div>
            <div class="item-tabla">
                <a style="color:blue;" href="ver-areas-pacientes.php?id=<?php echo $row['id_area'] ?>">Ver Área y sus
                    Pacientes</a>
            </div>

            <div class="item-tabla">
                <a style="color:blue;" href="ver-areas-enfermeros.php?id=<?php echo $row['id_area'] ?>">Ver Área y sus
                    enfermeros</a>
            </div>

        <?php } ?>
    </div>
    <script src="\olimpiadas2023\config\js.js"> </script>

</body>

</html>