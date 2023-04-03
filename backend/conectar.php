<?php
$host = "localhost";
$user = "root";
$password = "root";
$db = "ajax";
$conexion = mysqli_connect($host,$user,$password,$db);
if(!$conexion){
    die('Error de conexión: '.mysqli_connect_errno());
}

?>