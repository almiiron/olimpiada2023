<div class="menu_nav">
    <nav>
        <ul class="menu-horizontal">

            <li><a href="/olimpiadas2023/index.php">Inicio</a></li>
            <li onmouseover="visibleSubmenu(i=1)" onmouseout="invisibleSubmenu(i=1)"><a href="#">Pacientes</a>
                <ul class="menu-vertical">
                    <li> <a href="/olimpiadas2023/formularios/carga-paciente.php">Cargar Paciente </a></li>
                    <li><a href="#">Ver Paciente</a></li>
                </ul>
            </li>

            <li onmouseover="visibleSubmenu(i=2)" onmouseout="invisibleSubmenu(i=2)"><a href="#">Áreas</a>
                <ul class="menu-vertical">
                    <li> <a href="/olimpiadas2023/formularios/carga-area.php">Cargar Área</a></li>
                    <li><a href="/olimpiadas2023/formularios/ver-areas.php">Ver Áreas</a></li>
                </ul>
            </li>

            <li onmouseover="visibleSubmenu(i=3)" onmouseout="invisibleSubmenu(i=3)"><a href="#">Enfermeros</a>
                <ul class="menu-vertical">
                    <li><a href="/olimpiadas2023/formularios/carga-enfermero.php">Cargar Enfermero</a></li>
                    <li><a href="#">Ver Enfermeros</a></li>
                </ul>
            </li>

            <li onmouseover="visibleSubmenu(i=4)" onmouseout="invisibleSubmenu(i=4)"><a href="#">Código Azul</a>
                <ul class="menu-vertical">
                    <li>
                        <button class="boton" id="miBoton">Codigo azul en Cardiologia</button>
                        <audio id="miSonido" src="/olimpiadas2023/Alerta-Codigo-Azul-en-cardiolo.mp3"></audio>
                    </li>
                  
                </ul>
            </li>
        </ul>
    </nav>
</div>