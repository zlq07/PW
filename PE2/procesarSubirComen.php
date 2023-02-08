<?php
session_start();
require_once("conexion.php");
require_once("configuracion.php");

$comentario = $_POST['comentario'];
$usuario = $_SESSION['usuario'];
$nombre_exp = $_POST["nombre_exp"];

try {
    $sql = "SELECT titulo FROM " . EXPOSICIONES . " WHERE titulo = :nombre_exp";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(":nombre_exp", $nombre_exp);
    $sentencia->execute();
} catch (PDOException $e) {
    echo $e;
    $conexion = null;
    die();
}

$resultado = $sentencia->fetchAll();
if (count($resultado) == 0) {
    try {
        $sql2 = "INSERT INTO " . COMENTARIOS . " (usuario,comentario,nombre_exp) VALUES(:usuario,:comentario,:nombre_exp)";
        $sentencia2 = $conexion->prepare($sql2);
        $sentencia2->bindValue(":usuario", $usuario);
        $sentencia2->bindValue(":comentario", $comentario);
        $sentencia2->bindValue(":nombre_exp", $nombre_exp);
        $sentencia2->execute();

        $conexion = null;
    } catch (PDOException $e) {
        echo $e;
        $conexion = null;
        die();
    }
    header("Location: subirComentario.php?correcto=1");
} else {
    $conexion = null;
    header("Location: subirComentario.php?error=6");
}


?>