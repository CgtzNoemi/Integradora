<?php
include 'conectar.php';

$id = $_POST['id'];
$op = $_POST['opcion'];
if($op == 'editar' || $op == 'insertar'){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
}
$info = [];
function insertar($nombre, $apellido, $edad, $conexion){
    $sql = "INSERT INTO usuarios VALUES(0,'$nombre','$apellido','$edad')";
    $res = mysqli_query($conexion,$sql);
    $idUser = mysqli_insert_id($conexion);
    if(!$res)
    $info['respuesta'] = 'ERROR';
    else
    $info['respuesta'] = 'INSERTADO';
    $info += ['idUser' => $idUser];
    echo json_encode($info);
    cerrar($conexion);
}

function editar($id, $nombre, $apellido, $edad, $conexion){
    $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', edad='$edad' WHERE id='$id'";
    $res = mysqli_query($conexion,$sql);
    if(!$res)
    $info['respuesta'] = 'ERROR';
    else
    $info['respuesta'] = 'EDITADO';
    echo json_encode($info);
    cerrar($conexion);
}

function borrar($id,$conexion){
    
    $sql = "DELETE FROM usuarios WHERE usuarios.id='$id'";
    $res = mysqli_query($conexion,$sql);
    if(!$res)
    $info['respuesta'] = 'ERROR';
    else
    $info['respuesta'] = 'BORRADO';
    echo json_encode($info);
    cerrar($conexion);
}

function verificar($res){
    if(!$res)
        $info['respuesta'] = 'ERROR';
    else
        $info['respuesta'] = 'OK';
    echo json_encode($info);
}
function cerrar($conexion){
    mysqli_close($conexion);
}

switch($op){
    case 'editar':
        editar($id, $nombre, $apellido, $edad, $conexion);
    break;
    case 'borrar':
        borrar($id,$conexion);
    break;
    case 'insertar':
        insertar($nombre, $apellido, $edad, $conexion);
    break;
}

?>