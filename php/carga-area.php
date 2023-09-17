<?php
include("conexion.php");

if (!empty($_POST['enviar'])) {
    $area = $_POST['area'];
    $sql1 = "SELECT * FROM areas WHERE nombre_area = '$area'";
    $ejec1 = mysqli_query($conn, $sql1);

    $row1 = mysqli_num_rows($ejec1);
    if ($row1 == 0) {

        $sql2 = "INSERT INTO areas (nombre_area) VALUES ('$area')";
        $ejec2 = mysqli_query($conn, $sql2);

        if ($ejec2) {
            echo '<div class="alerta exito">Área Cargada con éxito</div>';
        }
    } else {
        echo '<div class="alerta error">Área ya cargada</div>';
    }
}
?>