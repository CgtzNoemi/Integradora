<?php

$conexion = mysqli_connect($HOST,$USER,$PASSWORD,$DB,$PORT);
if(!$conexion){
    die('Error de conexión: '.mysqli_connect_errno());
}


?>
