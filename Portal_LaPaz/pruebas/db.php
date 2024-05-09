<?php
    $contarsena = "Ally.2203"; 
    $usuario = "postgres";
    $host_db = "localhost";
    $nombre_db = "db_cLapaz";

    //conexion
    try{
        $miDB = new PDO("pgsql:host=$host_db;dbname=$nombre_db",$usuario, $contarsena);
        
    }catch(PDOException $e){
        echo "<p>Error al conectar a la base de datos: ". $e
        ->getMessage() . "</p>\n";
        die();
    }
?>

