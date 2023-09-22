<?php
include("conexion.php");
date_default_timezone_set('America/Buenos_Aires');
$fecha_hora_actual = date('Y-m-d H:i:s');

if (!empty($_POST['enviar'])) {
    $estado = $_POST['estado'];

    if ($estado == 'Inconsciente') {

        $sql1 = "INSERT INTO direcciones (descripcion_direccion) VALUES ('Sin Dato')";
        $ejec1 = mysqli_query($conn, $sql1);

        if ($ejec1) {
            $sql2 = "INSERT INTO contactos (descripcion_contacto) VALUES ('Sin Dato')";
            $ejec2 = mysqli_query($conn, $sql2);

            if ($ejec2) {
                $sql3 = "SELECT MAX(id_contacto) AS id_contacto FROM contactos";
                $ejec3 = mysqli_query($conn, $sql3);
                $fila1 = mysqli_fetch_assoc($ejec3);
                $id_contacto = $fila1['id_contacto'];

                $sql4 = "SELECT MAX(id_direccion) AS id_direccion FROM direcciones";
                $ejec4 = mysqli_query($conn, $sql4);
                $fila2 = mysqli_fetch_assoc($ejec4);
                $id_direccion = $fila2['id_direccion'];

                $edad = $_POST['edad'];
                $sexo = $_POST['sexo'];


                $sql5 = "INSERT INTO personas (id_direccion, id_contacto, nombre, apellido, dni, grupo_etario, sexo) 
                        VALUES ('$id_direccion','$id_contacto','Sin Dato','Sin Dato','Sin Dato','$edad','$sexo')";
                $ejec5 = mysqli_query($conn, $sql5);

                if ($ejec5) {

                    $sql6 = "SELECT MAX(id_persona) AS id_persona FROM personas";
                    $ejec6 = mysqli_query($conn, $sql6);
                    $fila3 = mysqli_fetch_assoc($ejec6);
                    $id_persona = $fila3['id_persona'];

                    $sql7 = "INSERT INTO pacientes (id_persona, obra_social, enfermedad_hereditaria) 
                            VALUES ('$id_persona', 'Sin Dato', 'Sin Dato')";
                    $ejec7 = mysqli_query($conn, $sql7);
                    if ($ejec7) {
                        $sql8 = "SELECT MAX(id_paciente) AS id_paciente FROM pacientes";
                        $ejec8 = mysqli_query($conn, $sql8);
                        $fila4 = mysqli_fetch_assoc($ejec8);
                        $id_paciente = $fila4['id_paciente'];

                        $id_enfermero = $_POST['enfermero-atendio'];
                        $primer_diagnostico = $_POST['primer_diagnostico_incons'];
                        $tipo_llegada = $_POST['tipo-llegada'];
                        $estado = $_POST['estado'];

                        $sql9 = "INSERT INTO 
                        estado_paciente

                        (id_paciente, id_enfermero, estado_conciencia, primer_diagnostico, diagnostico_final, tipo_llegada, fecha_hora_ingreso, fecha_hora_egreso)
                         VALUES ('$id_paciente','$id_enfermero' ,'$estado', '$primer_diagnostico', 'Sin Dato', '$tipo_llegada', '$fecha_hora_actual', '')";
                        $ejec9 = mysqli_query($conn, $sql9);

                        if ($ejec9) {
                            $area = $_POST['area'];
                            $sql10 = "INSERT INTO areas_pacientes (id_area, id_paciente) VALUES ('$area','$id_paciente')";
                            $ejec10 = mysqli_query($conn, $sql10);
                            if ($ejec10) {
                                echo '<div class="alerta exito">Se cargó al paciente</div>';
                            } else {
                                echo '<div class="alerta error">Error al cargar al paciente</div>';
                            }
                        }
                    }
                }
            }
        }
    } else if ($estado == 'Consciente') {
        
        $domicilio = $_POST['domicilio'];
        $sql1 = "INSERT INTO direcciones (descripcion_direccion) VALUES ('$domicilio')";
        $ejec1 = mysqli_query($conn, $sql1);

        if ($ejec1) {
            $telefono=$_POST['telefono'];
            $sql2 = "INSERT INTO contactos (descripcion_contacto) VALUES ('$telefono')";
            $ejec2 = mysqli_query($conn, $sql2);

            if ($ejec2) {
                $sql3 = "SELECT MAX(id_contacto) AS id_contacto FROM contactos";
                $ejec3 = mysqli_query($conn, $sql3);
                $fila1 = mysqli_fetch_assoc($ejec3);
                $id_contacto = $fila1['id_contacto'];

                $sql4 = "SELECT MAX(id_direccion) AS id_direccion FROM direcciones";
                $ejec4 = mysqli_query($conn, $sql4);
                $fila2 = mysqli_fetch_assoc($ejec4);
                $id_direccion = $fila2['id_direccion'];


                $nombre = $_POST['nombre'];
                $apellido =$_POST['apellido'];
                $dni =$_POST['dni'];
                $edad = $_POST['edad'];
                $sexo = $_POST['sexo'];


                $sql5 = "INSERT INTO personas (id_direccion, id_contacto, nombre, apellido, dni, grupo_etario, sexo) 
                        VALUES ('$id_direccion','$id_contacto','$nombre','$apellido','$dni','$edad','$sexo')";
                $ejec5 = mysqli_query($conn, $sql5);

                if ($ejec5) {

                    $sql6 = "SELECT MAX(id_persona) AS id_persona FROM personas";
                    $ejec6 = mysqli_query($conn, $sql6);
                    $fila3 = mysqli_fetch_assoc($ejec6);
                    $id_persona = $fila3['id_persona'];

                    $obra_social =$_POST['obra-social'];
                    $enfermedad_hereditaria = $_POST['enfermedad-hereditaria'];

                    $sql7 = "INSERT INTO pacientes (id_persona, obra_social, enfermedad_hereditaria) 
                            VALUES ('$id_persona', '$obra_social', '$enfermedad_hereditaria')";
                    $ejec7 = mysqli_query($conn, $sql7);
                    if ($ejec7) {
                        $sql8 = "SELECT MAX(id_paciente) AS id_paciente FROM pacientes";
                        $ejec8 = mysqli_query($conn, $sql8);
                        $fila4 = mysqli_fetch_assoc($ejec8);
                        $id_paciente = $fila4['id_paciente'];

                        $id_enfermero = $_POST['enfermero-atendio'];
                        $primer_diagnostico = $_POST['primer_diagnostico_cons'];
                        
                        $tipo_llegada = $_POST['tipo-llegada'];
                        $estado = $_POST['estado'];

                        $sql9 = "INSERT INTO 
                        estado_paciente

                        (id_paciente, id_enfermero, estado_conciencia, primer_diagnostico, diagnostico_final, tipo_llegada, fecha_hora_ingreso, fecha_hora_egreso)
                         VALUES ('$id_paciente','$id_enfermero' ,'$estado', '$primer_diagnostico', 'Sin Dato', '$tipo_llegada', '$fecha_hora_actual', '')";
                        $ejec9 = mysqli_query($conn, $sql9);

                        if ($ejec9) {
                            $area = $_POST['area'];
                            $sql10 = "INSERT INTO areas_pacientes (id_area, id_paciente) VALUES ('$area','$id_paciente')";
                            $ejec10 = mysqli_query($conn, $sql10);
                            if ($ejec10) {
                                echo '<div class="alerta exito">Se cargó al paciente</div>';
                            } else {
                                echo '<div class="alerta error">Error al cargar al paciente</div>';
                            }
                        }
                    }
                }
            }
        }
    }
}
?>