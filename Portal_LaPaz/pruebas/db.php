<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $connection = pg_connect("host=localhost dbname=db_cLapaz user=postgres password=Ally.2203");
    if (!$connection) {
        echo "LA CAGASTE EN: " . pg_last_error();
    } else {
        echo "Conexión BIEN DE AVERGA";
    }

    $result = pg_query($connection, "SELECT * FROM tbl_alumnos");
    ?>
    <table>
        <tr>
            <th>nie</th>
            <th>nombre</th>
            <th>apellido</th>
        </tr>
        <?php
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                echo "
                <tr>
                    <td>" . $row["nie"] . "</td>
                    <td>" . $row["nombre"] . "</td>
                    <td>" . $row["apellido"] . "</td>
                </tr>
                ";
            }
        } else {
            echo "<tr><td colspan='3'>No hay datos disponibles</td></tr>";
        }
        ?>
    </table>
</body>
</html>
