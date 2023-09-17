<?php
include("conexion.php");

if (!empty($_POST['enviar'])) {
    $nombre_usuario = $_POST['nombre-usuario'];
    $sql = "SELECT * FROM usuario where nombre_usuario = '$nombre_usuario'";
    $consulta = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($consulta);
    if ($row == 0) {

        $dni = $_POST['dni'];
        $sql2 = "SELECT * FROM personas where dni = '$dni";
        $consulta2 = mysqli_query($conn, $sql);
        $row2 = mysqli_num_rows($consulta2);

        if ($row2 == 0) {


            $telefono = $_POST['telefono'];
            $sql4 = "INSERT INTO contactos (descripcion_contacto) values ('$telefono')";
            $consulta4 = mysqli_query($conn, $sql4);

            if ($consulta4) {
                $direccion = $_POST['direccion'];
                $sql5 = "INSERT INTO direcciones (descripcion_direccion) values ('$direccion')";
                $consulta5 = mysqli_query($conn, $sql5);

                if ($consulta5) {

                    $sql7 = "SELECT MAX(id_contacto) AS id_contacto FROM contactos";
                    $ejec7 = mysqli_query($conn, $sql7);
                    $fila2 = mysqli_fetch_assoc($ejec7);
                    $id_contacto = $fila2['id_contacto'];

                    $sql8 = "SELECT MAX(id_direccion) AS id_direccion FROM direcciones";
                    $ejec8 = mysqli_query($conn, $sql8);
                    $fila3 = mysqli_fetch_assoc($ejec8);
                    $id_direccion = $fila3['id_direccion'];

                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $dni = $_POST['dni'];
                    $sexo = $_POST['sexo'];
                    $edad = $_POST['edad'];


                    $sql9 = "INSERT INTO personas (id_direccion, id_contacto, nombre, apellido, dni, grupo_etario, sexo)
                         VALUES ('$id_direccion', '$id_contacto', '$nombre', '$apellido', '$dni', '$edad', '$sexo')";
                    $ejec9 = mysqli_query($conn, $sql9);
                    if ($ejec9) {
            
                        $sql10 = "SELECT MAX(id_persona) AS id_persona FROM personas";
                        $ejec10 = mysqli_query($conn, $sql10);
                        $fila4 = mysqli_fetch_assoc($ejec10);
                        $id_persona = $fila4['id_persona'];

                        $especialidad = $_POST['especialidad'];

                        $sqlpersona = "INSERT INTO enfermeros (id_persona,id_usuario,especialidad) VALUES ('$id_persona', '$id_usuario', '$especialidad')";
                        $cargaPersona = mysqli_query($conn, $sqlpersona);

                        if ($cargaPersona) {
                            echo '<div class="alerta exito">Se cargó el enfermero</div>';

                        } else {
                            echo '<div class="alerta error">Error al cargar el enfermero</div>';
                        }
                    } else {
                        echo '<div class="alerta error">Error al cargar la persona</div>';
                    }
                } else {
                    echo '<div class="alerta error">Error al cargar la direccion</div>';

                }
            } else {
                echo '<div class="alerta error">Error al cargar el telefono</div>';
            }
        } else {
            echo '<div class="alerta error">DNI ya cargado</div>';
        }
    } else {
        echo '<div class="alerta error">Usuario ya cargado</div>';
    }
}
?>