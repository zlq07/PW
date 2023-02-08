<?php

require_once("configuracion.php");
require_once("conexion.php");

$titulo = $_POST["titulo"];

try {
    $sql = "DELETE " . EXPOSICIONES . ".* FROM " . EXPOSICIONES . " WHERE titulo = :titulo";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(":titulo", $titulo);
    $sentencia->execute();
    $conexion = null;


} catch (PDOException $e) {
    echo $e . "nombre de exposicion " . $titulo;
    $conexion = null;
    die();
}

header("Location: editarExpo.php?correcto=2");
?>