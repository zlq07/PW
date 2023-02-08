<?php
//sesión iniciada
session_start();

//la conexión
require_once('configuracion.php');
require_once('conexion.php');

//las variables del formulario
$usuario = $_POST['usuario'];
$contrasenia = $_POST['password'];

$usuario2 = $_POST['usuario'];
//realizar la consulta.
try {
    $sql = "SELECT usuario,email,password  FROM " . USUARIOS . " WHERE usuario = :usuario AND password = :password";
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue(":usuario", $usuario);
    $sentencia->bindValue(":password", $contrasenia);
    $sentencia->execute();
    $resultado = $sentencia->fetch();

    $sql2 = "SELECT dni,usuario,email,telefono,password  FROM " . COMISARIOS . " WHERE usuario = :usuario AND password = :password";
    $sentencia2 = $conexion->prepare($sql2);
    $sentencia2->bindValue(":usuario", $usuario2);
    $sentencia2->bindValue(":password", $contrasenia);
    $sentencia2->execute();
    $resultado2 = $sentencia2->fetch();
    //Comprobamos si el usuario esta registrado

    if (!empty($resultado)) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['email'] = $resultado['email'];
        $_SESSION['password'] = $contrasenia;
        $_SESSION['tipo'] = "Usuario";
        header("Location: index.php");
    }
    if (!empty($resultado2)) {
        $_SESSION['usuario'] = $usuario2;
        $_SESSION['password'] = $contrasenia;
        $_SESSION['dni'] = $resultado2['dni'];
        $_SESSION['email'] = $resultado2['email'];
        $_SESSION['telefono'] = $resultado2['telefono'];
        $_SESSION['tipo'] = "Comisario";
        header("Location: index.php");
    }else{
        $_SESSION['tipo'] = "Usuario";
        header("Location: index.php");
    }
} catch (PDOException $e) {
    echo "Operración incorrecta : " . $e->getMessage();
    die();
    $conexion = null;
}

?>