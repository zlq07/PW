<?php
session_start();
require_once("configuracion.php");
require_once("conexion.php");

$email = $_POST["email"];
$dni = $_POST["dni"];
$telefono = $_POST["telefono"];
$contrasenia = $_POST["password"];
$usuario_n = $_POST["usuario"];
$usuario = $_SESSION['usuario'];

//Realización de la actualización
try {

    $sql = "UPDATE " . COMISARIOS . " SET dni =:dni, telefono =:telefono ,email =:email, usuario =:usuario, password =:password WHERE usuario = :usuario";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(":email", $email);
    $sentencia->bindValue(":usuario", $usuario_n);
    $sentencia->bindValue(":password", $contrasenia);
    $sentencia->bindValue(":usuario", $usuario);
    $sentencia->bindValue(":dni", $dni);
    $sentencia->bindValue(":telefono", $telefono);
    $sentencia->execute();

    $_SESSION['usuario'] = $usuario;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $contrasenia;
    $_SESSION['dni'] = $dni;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['tipo'] = "Comisario";

} catch (PDOException $e) {
    echo $e;
    $conexion = null;
    die();
}
header("Location: editarCom.php");
?>