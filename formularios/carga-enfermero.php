<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../config/estilos.css">

    <title>Cargar Enfermero</title>
</head>

<body>

    <?php include("../php/conexion.php") ?>
    <?php include("../vistas/nav.php") ?>
    <?php include("../php/carga-enfermero.php") ?>
    <br>
    <br>
    <br>
    <div class="caja-form peluquero">

        <form method="POST">
            <input type="text" name="nombre" placeholder="Ingrese su nombre" required onfocus="foco(this)"
                onkeypress="return sololetras(event)">
            <input type="text" name="apellido" placeholder="Ingrese apellido" required onfocus="foco(this)"
                onkeypress="return sololetras(event)">
            <input type="text" name="dni" placeholder="DNI" required onfocus="foco(this)"
                onkeypress="return solonumeros(event)">
            <input type="text" name="telefono" placeholder="Ingrese su telefono" required onfocus="foco(this)"
                minlength="10" onkeypress="return solonumeros(event)">
            <input type="text" name="direccion" placeholder="ejemplo de domicilio" required onfocus="foco(this)"
                onkeypress="return validaambos(event)">

            <input type="text" name="nombre-usuario" placeholder="Nombre de Usuario" required onfocus="foco(this)"
                onkeypress="return validaambos(event)">

            <input type="text" name="contrasena" placeholder="Contraseña" required onfocus="foco(this)"
                onkeypress="return validaambos(event)">

            <select name="sexo" id="sexo" onfocus="foco(this)" required>
                <option value="" disabled selected>Seleccione su sexo</option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
            </select>
            <select name="edad" id="edad" onfocus="foco(this)" required>
                <option value="" disabled selected>Grupo Etario</option>
                <option value="Niño">Niño</option>
                <option value="adolescencia">Adolescencia</option>
                <option value="joven">Joven</option>
                <option value="adulto">Adulto</option>
                <option value="vejez">vejez</option>
            </select>

            <select name="especialidad" id="especialidad" onfocus="foco(this)" required>
                <option value="" disabled selected>Seleccione su Especialidad</option>
                <option value="Sin Especificar">Sin Especificar</option>
                <option value="Enfermeria General">Enfermería General</option>
                <option value="Enfermeria Pediatria">Enfermería Pediátrica</option>
                <option value="Enfermeria Obstetricia">Enfermería Obstétrica</option>
                <option value="Enfermeria Psiquiatria">Enfermería Psiquiátrica</option>
                <option value="Enfermeria Gerontologia">Enfermería Gerontológica</option>
                <option value="Enfermeria Cardiologia">Enfermería en Cardiología</option>
                <option value="Enfermeria Oncologia">Enfermería en Oncología</option>
                <option value="Enfermeria Neonatologia">Enfermería en Neonatología</option>
                <option value="Enfermeria Quirurgica">Enfermería Quirúrgica</option>
                <option value="Enfermeria Urgencias">Enfermería de Urgencias</option>
            </select>
            <!-- <select name="area" required>
                <option value="" disabled selected>Área</option>
                <?php
                // imprimo en una lista los clientes
                $areas = "SELECT * FROM areas";
                $resultado1 = mysqli_query($conn, $areas);
                while ($resFila = mysqli_fetch_assoc($resultado1)) { ?>
                    <option value="<?php echo $resFila['id_area']; ?>">
                        <?php echo $resFila['nombre_area']; ?>
                    </option>
                <?php } ?>
            </select> -->

            <div class='checkbox'>
                <?php
                // imprimo en una lista los servicios
                $ars = "SELECT * FROM areas";
                $resultado = mysqli_query($conn, $ars);
                while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <label>
                        <?php
                        $nombre_area = $row['nombre_area'];
                        echo $nombre_area;
                        ?>
                        <input type="checkbox" name="areas[]" value="<?php echo $row['id_area']; ?>">
                    </label>
                <?php } ?>
            </div>
            <input type="submit" name="enviar" value="Cargar Enfermero" onclick="comprobarChecks(event);">
        </form>
    </div>
    <script src="\olimpiadas2023\config\js.js"> </script>

</body>

</html>