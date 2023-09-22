<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../config/estilos.css">
    <title>Cargar Paciente</title>
</head>

<body>
    <?php include("../vistas/nav.php");
    include("../php/carga-paciente.php"); ?>
    <div class="caja-form">
        <form method="post">
            <input type="hidden" name="accion" value="carga-paciente">

            <select id="estado" name="estado" onchange="ocultarDiv()">
                <option value="" disabled selected>Estado del Paciente</option>
                <option value="Consciente">Conciente</option>
                <option value="Inconsciente">Inconsciente</option>
            </select>

            <div id="miDiv1" style="display:none;">
                <input type="text" name="nombre" placeholder="Ingrese su nombre" onfocus="foco(this)"
                    onkeypress="return sololetras(event)">
                <input type="text" name="apellido" placeholder="Ingrese apellido" onfocus="foco(this)"
                    onkeypress="return sololetras(event)">
                <input type="text" name="dni" placeholder="DNI" onfocus="foco(this)"
                    onkeypress="return solonumeros(event)">
                <input type="text" name="telefono" placeholder="Ingrese su telefono" minlength="10" onfocus="foco(this)"
                    onkeypress="return solonumeros(event)">

                <input type="text" name="domicilio" placeholder="ejemplo de domicilio" onfocus="foco(this)"
                    onkeypress="return validaambos(event)">

                <select name="edad" id="edad" onfocus="foco(this)">
                    <option value="" disabled selected>Grupo Etario</option>
                    <option value="Niño">Niño</option>
                    <option value="Adolescencia">Adolescencia</option>
                    <option value="Joven">Joven</option>
                    <option value="Adulto">Adulto</option>
                    <option value="Vejez">Vejez</option>
                </select>

                <select name="sexo" id="sexo" onfocus="foco(this)">
                    <option value="" disabled selected>Seleccione su sexo</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>

                <input type="text" name="primer_diagnostico_cons" placeholder="Primer diagnostico" onfocus="foco(this)">

                <select name="tipo-llegada" id="tipo-llegada" onfocus="foco(this)">
                    <option value="" disabled selected>Llegada</option>
                    <option value="Ambulancia">Ambulancia</option>
                    <option value="Particular">Particular</option>
                </select>

                <select name="enfermero-atendio" id="enfermero-atendio" onfocus="foco(this)">
                    <option value="" disabled selected>Seleccione un Enfermero que lo atendió</option>
                    <?php
               
                    $enf = "SELECT e.id_enfermero, p.nombre,p.apellido,p.dni
                             FROM enfermeros e
                             INNER JOIN personas p ON e.id_persona = p.id_persona
                              ;";
                    $resultado1 = mysqli_query($conn, $enf);
                    while ($row1 = mysqli_fetch_assoc($resultado1)) { ?>
                        <option value="<?php echo $row1['id_enfermero']; ?>">
                            <?php  $concatenatedData = "Nombre: " . $row1["nombre"] . ", Apellido: " . $row1["apellido"] . ", DNI: " . $row1["dni"] . "<br>";
                            echo $concatenatedData; ?>
                        </option>
                    <?php } ?>
                </select>

                <select name="area" id="area">
                <option value="" disabled selected>Se le deriva al área</option>
                    <?php
   
                    $ar = "SELECT * FROM areas";
                    $resultado2 = mysqli_query($conn, $ar);
                    while ($row2 = mysqli_fetch_assoc($resultado2)) { ?>
                        <option value="<?php echo $row2['id_area']; ?>">
                            <?php  echo $row2['nombre_area'] ?>
                        </option>
                    <?php } ?>
                </select>
                <select name="obra-social" id="obra-social" onfocus="foco(this)">
                    <option value="" disabled selected>Obra Social</option>
                    <option value="Sin Obra Social">Sin Obra Social</option>
                    <option value="Obra Social de Ejemplo 1">Obra Social de Ejemplo 1</option>
                    <option value="Obra Social de Ejemplo 2">Obra Social de Ejemplo 2</option>
                    <option value="Obra Social de Ejemplo 3">Obra Social de Ejemplo 3</option>
                </select>

                <input type="text" name="enfermedad-hereditaria" placeholder="Enfermedad Hereditaria" onfocus="foco(this)">


                <input type="submit" name="enviar" value="Cargar Paciente">
            </div>

            <div id="miDiv2" style="display:none;">
                <input type="text" name="primer_diagnostico_incons" placeholder="Primer diagnostico" onfocus="foco(this)">

                <select name="tipo-llegada" id="tipo-llegada" onfocus="foco(this)">
                    <option value="" disabled selected>Llegada</option>
                    <option value="ambulancia">Ambulancia</option>
                    <option value="particular">Particular</option>
                </select>

                <select name="edad" id="edad" onfocus="foco(this)">
                    <option value="" disabled selected>Grupo Etario</option>
                    <option value="Niño">Niño</option>
                    <option value="Adolescencia">Adolescencia</option>
                    <option value="Joven">Joven</option>
                    <option value="Adulto">Adulto</option>
                    <option value="Vejez">Vejez</option>
                </select>

                <select name="sexo" id="sexo" onfocus="foco(this)">
                    <option value="" disabled selected>Seleccione su sexo</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>

              
                <select name="enfermero-atendio" id="enfermero-atendio" onfocus="foco(this)">
                    <option value="" disabled selected>Seleccione un Enfermero que lo atendió</option>
                    <?php
              
                    $enf = "SELECT e.id_enfermero, p.nombre,p.apellido,p.dni
                             FROM enfermeros e
                             INNER JOIN personas p ON e.id_persona = p.id_persona
                              ;";
                    $resultado1 = mysqli_query($conn, $enf);
                    while ($row1 = mysqli_fetch_assoc($resultado1)) { ?>
                        <option value="<?php echo $row1['id_enfermero']; ?>">
                            <?php  $concatenatedData = "Nombre: " . $row1["nombre"] . ", Apellido: " . $row1["apellido"] . ", DNI: " . $row1["dni"] . "<br>";
                            echo $concatenatedData; ?>
                        </option>
                    <?php } ?>
                </select>
                <select name="area" id="area">
                <option value="" disabled selected>Se le deriva al área</option>
                    <?php
   
                    $ar = "SELECT * FROM areas";
                    $resultado2 = mysqli_query($conn, $ar);
                    while ($row2 = mysqli_fetch_assoc($resultado2)) { ?>
                        <option value="<?php echo $row2['id_area']; ?>">
                            <?php  echo $row2['nombre_area'] ?>
                        </option>
                    <?php } ?>
                </select>

                <input type="submit" name="enviar" value="Cargar Paciente">
            </div>
        </form>


    </div>


    <script src="\olimpiadas2023\config\js.js"> </script>


</html>