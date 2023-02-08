<?php
require_once("conexion.php");
require_once("configuracion.php");

$dir_subida = 'home/pw06300759/public_html/pe2/imagenes/';
$fichero_subido = $dir_subida . basename($_FILES["foto"]['name']);

/* $file_size=$_FILES['foto']['size'];
 if($file_size>2*1024*1024) {
     echo "imagen demasiado grande, tiene que ser menos de 2M!";
     exit();
 }*/
//$uploaded_file=$_FILES['foto'][$dir_subida];

$nombre = $_POST['nombre'];
$autor = $_POST['autor'];
$nombre_exp = $_POST["nombre_exp"];
$descripcion = $_POST["descripcion"];

try {
    $sql = "SELECT nombre FROM " . PIEZAS . " WHERE nombre = :nombre";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(":nombre", $nombre);
    $sentencia->execute();
} catch (PDOException $e) {
    echo $e;
    $conexion = null;
    die();
}

$resultado = $sentencia->fetchAll();
if (count($resultado) == 0) {
    try {
        $sql = "INSERT INTO " . PIEZAS . " (nombre,autor,urlImagen,descripcion,nombre_exp) VALUES(:nombre,:autor,:imagen,:descripcion,:nombre_exp)";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindValue(":nombre", $nombre);
        $sentencia->bindValue(":autor", $autor);
        $sentencia->bindValue(":imagen", "./imagenes/$nombre.png");
        $sentencia->bindValue(":descripcion", $descripcion);
        $sentencia->bindValue(":nombre_exp", $nombre_exp);
        $sentencia->execute();

        $conexion = null;
    } catch (PDOException $e) {
        echo $e;
        $conexion = null;
        die();
    }
    header("Location: editarPiezas.php?correcto=1");
} else {
    $conexion = null;
    header("Location: editarPiezas.php?error=6");
}


?>