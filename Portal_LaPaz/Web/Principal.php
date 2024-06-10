
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/Portal_LaPaz/Recursos/Css/header.css">
    <link rel="stylesheet" href="/Portal_LaPaz/Recursos/Css/foteer.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Portal_LaPaz/Recursos/Css/stylePrincipal.css">
    <title>Document</title>
</head>
<body>
    <div class="back"></div>
    <div class="container_header">
        <div class="container_logo">
            <img src="/Portal_LaPaz/Recursos/Imagenes/cjnsp-removebg-preview.png" alt="">
        </div>
        <nav>
            <ul>
                <li onclick="aparecer()">Incio</li>
                <li onclick="ocultar()">Ver Notas</li>
                <li onclick="openPerfil()">Perfil</li>
                <li onclick="Salir()">Salir</li>
            </ul>
        </nav>
    </div>
    <div  id="inicio" class="container_informacion">
        <h1>Portal Alumnos</h1>
        <p>Colegio Josefio Nuestra Señora de la Paz</p>
    </div>
    
    <br><br>
    
    <div id="tabla" class="container_notas">
        <div class="container_notas_menu" id="Filter_notas">
            <H2>Buscar Notas</H2>
            <div class="container_notas_buscador">
                <h3>Selecciona Nivel Academico:  </h3>
                <select name="nivel" id="nivel">
                    <option value="">1 grado</option>
                    <option value="">2 grado</option>
                    <option value="">3 grado</option>
                    <option value="">4 grado</option>
                    <option value="">5 grado</option>
                    <option value="">6 grado</option>
                    <option value="">7 grado</option>
                    <option value="">8 grado</option>
                    <option value="">9 grado</option>
                    <option value="bach">1 Bachillerato</option>
                    <option value="bach">2 Bachillerato</option>
                </select>
            </div>
            <div class="container_notas_nivelSelector">
                <h3>Selecciona el Periodo Acedemico:</h3>
                <select name="" id="trimestre">
                    <option value="">1º Trimestre</option>
                    <option value="">2º Trimestre</option>
                    <option value="">3º Trimestre</option>
                </select>
                <select name="" id="periodo">
                    <option value="">1º Periodo</option>
                    <option value="">2º Periodo</option>
                    <option value="">3º Periodo</option>
                    <option value="">4º Periodo</option>
                </select><br><br>
                <button class="btn" onclick="buscarNotas()">Buscar</button>
            </div>
        </div>
        
        <table class="notas" id= "tabla_mostrar">
        <tr>
            <th>Materias</th>
            <th>Tarea uno</th>
            <th>Tarea dos</th>
            <th>Tarea tres</th>
            <th>Tarea cuatro</th>
            <th>Actividades</th>
            <th>Nota_examen</th>
            <th>Promedio_Final</th>
        </tr>

        <?php
            session_start();

            if (isset($_SESSION['pass']) && is_numeric($_SESSION['pass'])) {
                $nie = (int)$_SESSION['pass']; // Asegurarse de que $nie sea un entero

                $connection = pg_connect("host=localhost dbname=db_cLapaz user=postgres password=Ally.2203");

                if (!$connection) {
                    echo "Error: No se pudo conectar a la base de datos.\n";
                    exit;
                }

                // Consulta para obtener los nombres de las materias
                $materia_query = "SELECT nombre FROM tbl_materias";

                // Ejecutar la consulta
                $materia_result = pg_query($connection, $materia_query);

                if ($materia_result) {
                    while ($row = pg_fetch_assoc($materia_result)) {
                        echo "<tr>";
                        foreach ($row as $materia => $nombre) {
                            echo "<td>" . htmlspecialchars($nombre) . "</td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "Error en la consulta de materias.\n";
                }

                // Consulta para obtener las notas de los alumnos
                $nota_query = "SELECT tarea_uno, tarea_dos, tarea_tres, tarea_cuatro, actividades, nota_examen, promedio_final
                            FROM tbl_nota
                            WHERE nie = $1";

                // Ejecutar la consulta segura usando pg_query_params
                $result = pg_query_params($connection, $nota_query, array($nie));

                if ($result) {
                    if (pg_num_rows($result) > 0) {
                        while ($row = pg_fetch_assoc($result)) {
                            echo "<tr>";
                            foreach ($row as $value) {
                                echo "<td>" . htmlspecialchars($value) . "</td>"; // htmlspecialchars para evitar XSS
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No hay datos disponibles</td></tr>";
                    }
                } else {
                    echo "Error en la consulta de notas.\n";
                }

                // Cerrar la conexión a la base de datos
                pg_close($connection);
            } else {
                echo 'El valor de NIE no es válido.';
            }
        ?>


    </div>
    <script src="/Portal_LaPaz/Scrip/principal.js"></script>
</body>

</html>