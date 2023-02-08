<?php
require_once("conexion.php");
require_once("configuracion.php");

$dir_subida = 'home/pw06300759/public_html/pe2/imagenes/';
$fichero_subido = $dir_subida . basename($_FILES["foto"]['name']);

$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];
$fechaAlta = $_POST["fechaDeAlta"];
$fechaBaja = $_POST["fechaFinalizacion"];
$descripcion = $_POST["Descripcion"];

try {
    $sql = "SELECT titulo FROM " . EXPOSICIONES . " WHERE titulo = :titulo";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(":titulo", $titulo);
    $sentencia->execute();
} catch (PDOException $e) {
    echo $e;
    $conexion = null;
    die();
}

$resultado = $sentencia->fetchAll();
if (count($resultado) == 0) {
    try {
        $sql = "INSERT INTO " . EXPOSICIONES . " (titulo,tipo,fechaalta,fechabaja,descripcion,urlImagen,urlExp) VALUES(:titulo,:tipo,:fechaalta,:fechabaja,:descripcion,:imagen,:urlExp)";
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindValue(":titulo", $titulo);
        $sentencia->bindValue(":tipo", $tipo);
        $sentencia->bindValue(":fechaalta", $fechaAlta);
        $sentencia->bindValue(":fechabaja", $fechaBaja);
        $sentencia->bindValue(":imagen", "./imagenes/$titulo.png");
        $sentencia->bindValue(":urlExp", "$titulo.php");
        $sentencia->bindValue(":descripcion", $descripcion);
        $sentencia->execute();

        $conexion = null;
    } catch (PDOException $e) {
        echo $e;
        $conexion = null;
        die();
    }
    header("Location: editarExpo.php?correcto=1");
} else {
    $conexion = null;
    header("Location: editarExpo.php?error=6");
}


?>