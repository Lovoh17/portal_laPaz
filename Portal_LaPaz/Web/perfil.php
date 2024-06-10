<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Portal_LaPaz/Recursos/Css/header.css">
    <link rel="stylesheet" href="/Portal_LaPaz/Recursos/Css/profilr.css">
    <link rel="stylesheet" href="/Portal_LaPaz/Recursos/Css/foteer.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container_header">
        <div class="container_logo">
            <img src="/Portal_LaPaz/Recursos/Imagenes/cjnsp-removebg-preview.png" alt="">
        </div>
        <nav>
            <ul>
                <li onclick="principal()">Incio</li>
                <li onclick="ocultar()">Ver Notas</li>
                <li onclick="openPerfil()">Perfil</li>
                <li onclick="Salir()">Salir</li>
            </ul>
        </nav>
    </div>
    <div class="profile">
    <div class="profile_imagen">
            <img id="selectedImage" alt="">
            <br>
            <!-- Agregamos un formulario -->
            <form id="uploadForm" enctype="multipart/form-data">
                <input type="file" id="fileInput" name="foto" accept="image/*">
                <button type="submit" id="btnApply" class="foto">Aplicar cambios</button>
            </form>
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
    <script src="/Portal_LaPaz/Scrip/perfil.js" ></script>
    <script src="/Portal_LaPaz/Scrip/principal.js" ></script>
<footer>
    <div class="cell-footer ">
      <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="Fother-box">
                <figure>
                <a href="#">
                    <img src="/Portal_LaPaz/Recursos/Imagenes/cjnsp.jpg" alt="Logo de cjnsp.css">
                </a>
                <p>Colegio Josefino Nuestra Señora de la Paz</p>
                </figure>
            </div>
          <div class="Fother-box">
            <h2>Universidad de el Salvador</h2>
            <p>Departamento de Ingenieria y Arquitectura</p>
            <p>Ingenieria de Sistemas Informaticos</p>
          </div>
          <div class="Fother-box">
            <h2>SIGUENOS</h2>
            <div class="red-social">
                <a class="h-facebook" href="https://www.facebook.com/"><i class='bx bxl-facebook-circle'></i></a>
                <a class="h-instagram" href="https://www.instagram.com/"><i class='bx bxl-instagram-alt'></i></a>
                <a class="h-twitter" href="https://www.twitter.com/"><i class='bx bxl-twitter'></i></a>
            </div>
          </div>
        </div>
    </div>
</footer>
</body>
</html>