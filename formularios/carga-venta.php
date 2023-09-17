<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\proyecto_5to\config\estilos.css">
    <title>Cargar Venta</title>
</head>

<body>
    <?php include("nav.php");
    require("..\db\conexion.php"); ?>

    <button class="botonVolver" ondblclick="volverAtras()">Volver atrás</button>

    <div class="caja-form venta">

        <form action="confirmar-venta.php" method="POST" id="confirmar-venta">
            <select class="select-venta" name="cliente" id="cliente" onfocus="foco(this)" required>
                <option value="" disabled selected>Seleccione un Cliente</option>
                <?php
                // imprimo en una lista los clientes
                $clientes = "SELECT * FROM clientes ORDER BY apellido ASC";
                $resultado = mysqli_query($conn, $clientes);
                while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <option value="<?php echo $row['id_cliente']; ?>">
                        <?php echo $row['apellido'];
                        echo " ";
                        echo $row['nombre']; ?>
                    </option>
                <?php } ?>
            </select>
            <select class="select-venta" name="peluquero" onfocus="foco(this)" required>
                <option value="" disabled selected>Seleccione un Peluquero</option>
                <?php
                // imprimo en una lista los peluqueros
                $clientes = "SELECT * FROM peluqueros ORDER BY apellido ASC";
                $resultado = mysqli_query($conn, $clientes);
                while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <option value="<?php echo $row['id_peluquero']; ?>">
                        <?php echo $row['apellido'];
                        echo " ";
                        echo $row['nombre']; ?>
                    </option>
                <?php } ?>
            </select>
            <br>
            <select class="select-venta" name="medio_pago" onfocus="foco(this)" required>
                <option value="" disabled selected>Seleccione un Metodo de Pago</option>
                <?php
                // imprimo en una lista los metodos pagos
                $med_pag = "SELECT * FROM medios_pagos ORDER BY nombre_medio_pago ASC";
                $resultado = mysqli_query($conn, $med_pag);
                while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <option value="<?php echo $row['id_medio_pago']; ?>">
                        <?php echo $row['nombre_medio_pago']; ?>
                    </option>
                <?php } ?>
            </select>
            <br>

            <h2 align="center">Seleccione el servicio</h2>
            <br>
            <div class='checkbox'>
                <?php
                // imprimo en una lista los servicios
                $servicios = "SELECT * FROM servicios";
                $resultado = mysqli_query($conn, $servicios);
                while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <label>
                        <?php
                        $nombre_servicio = $row['nombre_servicio'];
                        echo $nombre_servicio;
                        echo " ";
                        $precio = $row['precio'];
                        echo "$";
                        echo $precio;
                        ?>


                        <input type="checkbox" name="servicio[]" value="<?php echo $row['id_servicio']; ?>">
                    </label>
                <?php } ?>
            </div>
            <br>
            <br>
            <input type="submit" name="enviar" value="Cargar Venta" onclick="comprobarChecks(event);">
            <br>
        </form>
    </div>
    <script src="\proyecto_5to\config\js.js"></script>
</body>

</html>