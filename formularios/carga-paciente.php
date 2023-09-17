<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../config/estilos.css">
    <title>Cargar Cliente</title>
</head>

<body>
    <?php include("../vistas/nav.php") ?>
   <div class="caja-form">
   <select id="opciones" name="año" required onchange="ocultarDiv()">
        <option value="" disabled selected>Estado del Paciente</option>
        <option value="1">Conciente</option>
        <option value="2">Inconsiente</option>
    </select>

    <div id="miDiv1" style="display:none;">

        <input type="text" name="nombre" placeholder="Ingrese su nombre" required onfocus="foco(this)"  onkeypress="return sololetras(event)">
        <input type="text" name="apellido" placeholder="Ingrese apellido" required onfocus="foco(this)" onkeypress="return sololetras(event)">
        <input type="text" name="dni" placeholder="DNI" required onfocus="foco(this)" onkeypress="return solonumeros(event)">
        <input type="text" name="telefono" placeholder="Ingrese su telefono" required onfocus="foco(this)" minlength="10" onkeypress="return solonumeros(event)">
        <input type="text" name="apellido" placeholder="ejemplo de domicilio" required onfocus="foco(this)" onkeypress="return validaambos(event)">

        <select name="edad" id="edad" onfocus="foco(this)" required>
            <option value="" disabled selected>Grupo Etario</option>
            <option value="Niño">Niño</option>
            <option value="adolescencia">Adolescencia</option>
            <option value="joven">Joven</option>
            <option value="adulto">Adulto</option>
            <option value="vejez">vejez</option>
        </select>

        <select name="sexo" id="sexo" onfocus="foco(this)" required>
            <option value="" disabled selected>Seleccione su sexo</option>
            <option value="Masculino">Femenino</option>
            <option value="Femenino">Masculino</option>
        </select>

        <input type="text" name="nombre" placeholder="Primer diagnostico" required onfocus="foco(this)">

        <select name="edad" id="edad" onfocus="foco(this)" required>
            <option value="" disabled selected>Llegada</option>
            <option value="ambulancia">Ambulancia</option>
            <option value="particular">Particular</option>
        </select>

        <select name="edad" id="edad" onfocus="foco(this)" required>
            <option value="" disabled selected>Enfermero que atendió</option>
            <option value="ambulancia">ejemplo 1</option>
            <option value="particular">ejemplo 2</option>
        </select>
        <input type="submit" name="enviar" value="Cargar Paciente">

    </div>

    <div id="miDiv2" style="display:none;">


        <input type="text" name="nombre" placeholder="Primer diagnostico" required onfocus="foco(this)">
        <select name="edad" id="edad" onfocus="foco(this)" required>
            <option value="" disabled selected>Llegada</option>
            <option value="ambulancia">Ambulancia</option>
            <option value="particular">Particular</option>
        </select>

        <select name="edad" id="edad" onfocus="foco(this)" required>
            <option value="" disabled selected>Grupo Etario</option>
            <option value="Niño">Niño</option>
            <option value="adolescencia">Adolescencia</option>
            <option value="joven">Joven</option>
            <option value="adulto">Adulto</option>
            <option value="vejez">vejez</option>
        </select>

        <select name="sexo" id="sexo" onfocus="foco(this)" required>
            <option value="" disabled selected>Seleccione su sexo</option>
            <option value="Masculino">Femenino</option>
            <option value="Femenino">Masculino</option>
        </select>

        <select name="edad" id="edad" onfocus="foco(this)" required>
            <option value="" disabled selected>Enfermero que atendió</option>
            <option value="ambulancia">ejemplo 1</option>
            <option value="particular">ejemplo 2</option>
        </select>

        <input type="submit" name="enviar" value="Cargar Paciente">
    </div>


    <div id="notasDiv1" style="display:none;">
        <label for="notas1">Cargar notas:</label>
        <input type="text" id="notas1" name="notas1">
    </div>

    <div id="notasDiv2" style="display:none;">
        <label for="notas2">Cargar notas:</label>
        <input type="text" id="notas2" name="notas2">
    </div>


   </div>


    <script src="\olimpiadas2023\config\js.js"> </script>


</html>