<?php

    $nombre = $_POST['name'];
    $contra = $_POST['pass'];

    session_start();
        $connection = pg_connect("host=localhost dbname=db_cLapaz user=postgres password=Ally.2203");
        $consulta = ("SELECT * FROM tbl_alumnos
                    WHERE nombre='$nombre' AND nie = '$contra'");

        $login = pg_query($connection,$consulta);
        $cantidad = pg_num_rows($login);
        if ($cantidad > 0)
        {
            $_SESSION['nombre'] = $nombre;
            $_SESSION['pass'] = $nie;
            header('location: Principal.php');
        }
    ?>