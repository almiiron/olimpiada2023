    <?php
    include("../php/conexion.php");
    ?>
    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ver Enfermeros</title>
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
                <input class="buscador" type="search" placeholder="Busca un enfermero" name="busqueda">
                <button class="boton_buscar" type="submit" name="enviar">Buscar</button>
                <button class="boton_reset" type="submit" name="reset_busqueda">Reiniciar Busqueda</button>
            </form>
        </div>

        <?php
        $where = "";
        if (isset($_GET['enviar'])) {
            $busqueda = $_GET['busqueda'];


            if (isset($_GET['busqueda'])) {
                $where = "WHERE p.nombre LIKE '%$busqueda%' OR p.apellido LIKE '%$busqueda%' OR p.dni LIKE '%$busqueda%' OR p.grupo_etario LIKE '%$busqueda%' 
        OR p.sexo LIKE '%$busqueda%' OR d.descripcion_direccion LIKE '%$busqueda%' OR c.descripcion_contacto LIKE '%$busqueda%' 
        OR e.especialidad LIKE '%$busqueda%' OR a.nombre_area LIKE '%$busqueda%' ";
            }

        }
        if (isset($_GET['reset_busqueda'])) {
            $where = "";
        }
         ?>



        <div class="contenedor-general contenedor-enfermeros">
            <div class="titulo-general titulo-enfermeros">Enfermeros</div>
            <div class="header-general">ID Enfermero</div>
            <div class="header-general">Nombre</div>
            <div class="header-general">Apellido</div>
            <div class="header-general">DNI</div>
            <div class="header-general">Edad</div>
            <div class="header-general">Sexo</div>
            <div class="header-general">Direccion</div>
            <div class="header-general">Contacto</div>
            <div class="header-general">Especialidad</div>
            <div class="header-general">Área</div>
            <div class="header-general">Nombre de Usuario</div>
            <div class="header-general">Contraseña</div>
            <div class="header-general">Modificar</div>

            <?php
            $enfermeros = "SELECT
            e.id_enfermero AS idEnfermero,
            p.nombre AS nombre,
            p.apellido AS apellido,
            p.dni AS dni,
            p.grupo_etario AS edad,
            p.sexo AS sexo,
            d.descripcion_direccion AS direccion,
            c.descripcion_contacto AS contacto,
            e.especialidad AS especialidad,
            u.nombre_usuario AS nombreUsuario,
            u.contraseña AS contraseña,
            -- ae.id_area AS idArea,
            -- a.nombre_area AS nombreArea  -- Agregamos el nombre del área
            GROUP_CONCAT(a.nombre_area ORDER BY a.nombre_area ASC SEPARATOR ', ') AS areas -- Utilizamos GROUP_CONCAT para agrupar todas las áreas de un enfermero
        
        FROM
            enfermeros e
            INNER JOIN personas p ON e.id_persona = p.id_persona
            INNER JOIN direcciones d ON p.id_direccion = d.id_direccion
            INNER JOIN contactos c ON p.id_contacto = c.id_contacto
            INNER JOIN usuario u ON e.id_usuario = u.id_usuario
            INNER JOIN areas_enfermeros ae ON e.id_enfermero = ae.id_enfermero  -- Unimos con la tabla areas_enfermeros
            INNER JOIN areas a ON ae.id_area = a.id_area  -- Unimos con la tabla areas para obtener el nombre del área
            $where GROUP BY e.id_enfermero  ";
            $resultado = mysqli_query($conn, $enfermeros);
            while ($row = mysqli_fetch_assoc($resultado)) { ?>

                <div class="item-tabla">
                    <?php echo $row['idEnfermero'] ?>
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
                    <?php echo $row['especialidad'] ?>
                </div>
                <div class="item-tabla">
                    <?php
                    // echo $row['areas']
                    $areas = explode(', ', $row['areas']);
                    foreach ($areas as $key => $area) {
                        echo ($key + 1) . ') ' . $area . '<br>';
                    }
                    ?>
                </div>
                <div class="item-tabla">
                    <?php echo $row['nombreUsuario'] ?>
                </div>
                <div class="item-tabla">
                    <?php echo $row['contraseña'] ?>
                </div>

                <div class="item-tabla">
                    <a style="color:blue;" href="#.php?id=<?php echo $row['idEnfermero'] ?>">Modificar</a>
                </div>


            <?php } ?>
        </div>
        <script src="\olimpiadas2023\config\js.js"> </script>

    </body>

    </html>