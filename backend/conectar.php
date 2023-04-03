<?php
$HOST = "localhost";
$USER = "root";
$PASSWORD = "root";
$DB = "ajax";
$PORT = 3306;
$conexion = mysqli_connect($HOST,$USER,$PASSWORD,$DB,$PORT);
if(!$conexion){
    die('Error de conexión: '.mysqli_connect_errno());
}
$conexion -> set_charset("utf8");

?>
