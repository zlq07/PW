<?php

require_once("configuracion.php");
require_once("conexion.php");

$nombre = $_POST["nombre"];

try {
    $sql = "DELETE " . PIEZAS . ".* FROM " . PIEZAS . " WHERE nombre = :nombre";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(":nombre", $nombre);
    $sentencia->execute();
    $conexion = null;

} catch (PDOException $e) {
    echo $e . "nombre de pieza " . $nombre;
    $conexion = null;
    die();
}

header("Location: editarPiezas.php?correcto=2");
?>