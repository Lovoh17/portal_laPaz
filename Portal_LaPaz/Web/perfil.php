<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Recursos/Css/profilr.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <div class="profile">
        <div class="profile_imagen">
            <img src="/Recursos/Imagenes/cjnsp-removebg-preview.png" alt="">
            <br><input type="file" id="foto" name="foto" accept="image/*">
            <button type="submit" class="foto"> Aplicar cambios</button>
        </div>
        <div class="info_personal">
        <i class='bx bx-data'><a style="font-weight: bold;"> Datos Personales</a></i>
        <?php
            session_start();
            $name = $_SESSION['nombre'];
            echo "<h5>Nombre: " . "<a>" . $name . "</a>" . "</h5>";

            $connection = pg_connect("host=localhost dbname=db_cLapaz user=postgres password=Ally.2203");
            $result = pg_query($connection, "SELECT apellido, grado
                                    FROM tbl_alumnos where nombre = '$name' ;");
            $cantidad = pg_num_rows($result);
            if ($cantidad > 0) {
                $row = pg_fetch_assoc($result);
                $apellido = $row['apellido'];
                echo "<h5>Apellido: <a> $apellido  </a>","</h5>";
                $grado = $row['grado'];
                echo "<h5>Grado: " . "<a>" . $grado . "</a>" . "</h5>";
            }
        ?>

        </div>
        <div class="profile_info">
            <i class='bx bx-key'><a style="font-weight: bold;"> Datos de sesión</a></i>
            <?php
                $name = $_SESSION['nombre'];
                echo "<h5>Usuario: " . "<a>" . $name . "</a>" . "</h5>";
            ?>
            <button>Ver contraseña</button>
        </div>
    </div>
</body>
</html>