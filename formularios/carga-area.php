<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../config/estilos.css">

    <title>Cargar Área</title>
</head>

<body>
    <?php 
    include("../vistas/nav.php");
    include("../php/carga-area.php");
    ?>

    <?php //include("carga-servicio1.php") ?>

    <div class="caja-form ">

        <form method="POST">
            <br>
            <input type="text" name="area" placeholder="Ingrese el área" required onfocus="foco(this)" required minlength="3">
            <br>
            <!-- <input type="number" name="precio" placeholder="Ingrese el precio" required onfocus="foco(this)" min="0"minlength="10"> -->
            <br>
            <input type="submit" name="enviar" value="Cargar Área">
        </form>
    </div>
    <script src="\olimpiadas2023\config\js.js"> </script>

</body>

</html>