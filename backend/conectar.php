<?php
$HOST = "containers-us-west-201.railway.app";
$USER = "root";
$PASSWORD = "2xAtJTFNe6dvsYWuPmDh";
$DB = "railway";
$PORT = 6895;
$conexion = mysqli_connect($HOST,$USER,$PASSWORD,$DB,$PORT);
if(!$conexion){
    die('Error de conexión: '.mysqli_connect_errno());
}


?>
