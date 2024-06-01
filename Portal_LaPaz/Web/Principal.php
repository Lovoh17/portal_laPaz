
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/Portal_LaPaz/Recursos/Css/header.css">
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
            <th>Tarea uno</th>
            <th>Tarea dos</th>
            <th>Tarea tres</th>
            <th>Tarea cuatro</th>
            <th>Actividades</th>
            <th>Nota_examen</th>
            <th>AutoEvalucion</th>
            <th>Promedio_Final</th>
        </tr>

        <?php
        $nie = "456789";
        session_start();
        //$codigo = $_SESSION['usuario']; 
        $connection = pg_connect("host=localhost dbname=db_cLapaz user=postgres password=Ally.2203");

        $notas= "SELECT tarea_uno, tarea_dos, tarea_tres, tarea_cuatro, 'Actividades', nota_examen, 'autoEvalucion', 'Promedio_Final'
                    FROM tbl_notas where nie = $nie" ;
        $result = pg_query($connection, $notas);

        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_row($result)) {
                echo "<tr>";
                for ($i = 0; $i < count($row); $i++) {
                    echo "<td>" . $row[$i] . "</td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No hay datos disponibles</td></tr>";
        }
        ?>
       
    </div>

    <script src="/Portal_LaPaz/Scrip/principal.js"></script>
</body>
</html>