<?php
session_start();
require_once("configuracion.php");
require_once("conexion.php");

$tipo = $_POST["tipo"];
$fechaalta = $_POST["fechaDeAlta"];
$fechabaja = $_POST["fechaFinalizacion"];
$titulo_ = $_POST["titulo"];
$titulo = $_POST["titulo"];

//Realización de la actualización
try {

    $sql = "UPDATE " . EXPOSICIONES . " SET titulo =:titulo, tipo =:tipo, fechaalta =:fechaalta, fechabaja =:fechabaja WHERE titulo = :titulo";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(":titulo", $titulo);
    $sentencia->bindValue(":tipo", $tipo);
    $sentencia->bindValue(":fechaalta", $fechaalta);
    $sentencia->bindValue(":fechabaja", $fechabaja);
    $sentencia->bindValue(":titulo", $titulo_);
    $sentencia->execute();

} catch (PDOException $e) {
    echo $e;
    $conexion = null;
    die();
}
header("Location: editarExpo.php");

?>