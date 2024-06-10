
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
                <h3>Ver tu record de notas:  </h3>
                <p name="nivel" id="nivel">
                "El éxito no es la clave de la felicidad. 
                La felicidad es la clave del éxito. 
                Si amas lo que haces, tendrás éxito." 
                - Albert Schweitzer
                </p>
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
        
        <?php
            session_start();

            if (isset($_SESSION['pass']) && is_numeric($_SESSION['pass'])) {
                $nie = (int)$_SESSION['pass']; 

                $connection = pg_connect("host=localhost dbname=db_cLapaz user=postgres password=Ally.2203");

                if (!$connection) {
                    echo "Error: No se pudo conectar a la base de datos.\n";
                    exit;
                }

                $nota_query = "SELECT tarea_uno, tarea_dos, tarea_tres, tarea_cuatro, actividades, nota_examen, promedio_final
                            FROM tbl_nota
                            WHERE nie = $nie";

                $materia_query = "SELECT nombre FROM tbl_materias";

                $nota_result = pg_query($connection, $nota_query);
                $materia_result = pg_query($connection, $materia_query);

                $notas = [];
                $materias = [];
                if (pg_num_rows($nota_result) > 0 && pg_num_rows($materia_result) > 0) {
                    while ($row = pg_fetch_assoc($nota_result)) {
                        $notas[] = $row;
                    }
                    while ($row = pg_fetch_assoc($materia_result)) {
                        $materias[] = $row["nombre"];
                    }
                } else {
                    echo "No se encontraron resultados.";
                    exit;
                }

                pg_close($connection);


                if (!empty($notas) && !empty($materias)) {
                    echo "<table id='tabla_mostrar'>";
                    echo "<thead><tr><th>Materia</th><th>Tarea 1</th><th>Tarea 2</th><th>Tarea 3</th><th>Tarea 4</th><th>Actividades</th><th>Nota Examen</th><th>Promedio Final</th></tr></thead>";
                    echo "<tbody>";
                    for ($i = 0; $i < count($materias); $i++) {
                        echo "<tr><td class='materia'>" . htmlspecialchars($materias[$i]) . "</td>";
                        foreach ($notas[$i] as $nota) {
                            echo "<td class='nota'>" . htmlspecialchars($nota) . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "No hay datos disponibles.";
                }
            } else {
                echo 'El valor de NIE no es válido.';
                exit;
            }
        ?>

    </div>
    <script src="/Portal_LaPaz/Scrip/principal.js"></script>
</body>

</html>