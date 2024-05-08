<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
<body>
    <table>
    <tr>
        <th>tarea_uno</th>
        <th>tarea_dos</th>
        <th>tarea_tres</th>
        <th>tarea_cuatro</th>
        <th>Actividades</th>
        <th>nota_examen</th>
        <th>Porcentaje_Examen</th>
        <th>autoEvalucion</th>
        <th>Promedio_Final</th>
    </tr>

    <?php
    session_start();
    $connection = pg_connect("host=localhost dbname=db_cLapaz user=postgres password=Ally.2203");
    if (!$connection) {
        die("<h3>Error en la conexión a la base de datos</h3>");
    }

    $nie = "1002";
    $notas= "SELECT tarea_uno, tarea_dos, tarea_tres, tarea_cuatro, 'Actividades', nota_examen, 'Porcentaje_Examen', 'autoEvalucion', 'Promedio_Final'
                    FROM tbl_notas WHERE  nie =  $nie; "  ; 
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
</table>
</body>
</html>