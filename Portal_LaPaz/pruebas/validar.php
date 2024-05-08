<?php
    $usuario=$_POST['name'];
    $contra=$_POST['pass'];

    session_start();
    $_SESSION["nombre"] =$usuario;
    
?>