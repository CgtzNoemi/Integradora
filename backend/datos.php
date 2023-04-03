<?php
include ('conectar.php');

$sql = "SELECT * FROM usuarios ORDER BY id asc";
$sql_resul = mysqli_query($conexion, $sql);

if(!$sql_resul){
    die("Error");
}else{
    $array["data"] = [];
    while($datos = mysqli_fetch_assoc($sql_resul)){
        $array['data'][] = $datos;
    }
    echo $array;
}

mysqli_free_result($sql_resul);
mysqli_close($conexion);
?>
