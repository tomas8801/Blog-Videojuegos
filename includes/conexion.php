<?php
//CONEXION A LA BASE DE DATOS
$db_host     = 'localhost';
$db_user     = 'root';
$db_password = '';
$db_name     = 'videogames';

$conexion    = mysqli_connect($db_host, $db_user, $db_password, $db_name);

mysqli_query($conexion, "SET NAMES 'utf8'");
/*if (mysqli_connect_errno()) {
    echo    "Hubo un error al conectarse a la base de datos: " . mysqli_connect_error();
} else {
    echo    "Se conecto correctamente a la base de datos!";
}*/

//iniciar session
if (!isset($_SESSION)) {
    session_start();
    
}

