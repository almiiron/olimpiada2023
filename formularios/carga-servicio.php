<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\proyecto_5to\config\estilos.css">
    <title>Cargar Servicio</title>
</head>

<body>
    <?php include("nav.php") ?>
    <?php include("carga-servicio1.php") ?>

    <button class="botonVolver" ondblclick="volverAtras()">Volver atrás</button>

    <div class="caja-form servicio">

        <form method="POST">
            <br>
            <input type="text" name="servicio" placeholder="Ingrese el servicio" required onfocus="foco(this)">
            <br>
            <input type="number" name="precio" placeholder="Ingrese el precio" required onfocus="foco(this)" min="0"
                minlength="10">
                <br>
            <input type="submit" name="enviar" value="Cargar Servicio">
        </form>
    </div>
    <script src="\proyecto_5to\config\js.js"></script>
</body>

</html>