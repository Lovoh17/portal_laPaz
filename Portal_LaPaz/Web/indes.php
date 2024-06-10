<?php
    $nombre = $_POST['name'];
    $contra = $_POST['pass'];

    session_start();
    $connection = pg_connect("host=localhost dbname=db_cLapaz user=postgres password=Ally.2203");

    if (!$connection) {
        echo "Error: No se pudo conectar a la base de datos.\n";
        exit;
    }
    // Convertir $contra a un entero
    $contra = (int)$contra;

    // Consulta segura usando pg_query_params
    $query = "SELECT * FROM tbl_alumnos WHERE nombre = $1 AND nie = $2";
    $login = pg_query_params($connection, $query, array($nombre, $contra));

    $cantidad = pg_num_rows($login);
    if ($cantidad > 0) {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['pass'] = $contra; // Guarda el NIE como un entero en la sesión
        header('Location: Principal.php');
        exit;
    } else {
        echo "Nombre o NIE incorrectos.";
    }

    pg_close($connection);
?>
