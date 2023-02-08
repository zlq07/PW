<?php
require_once("configuracion.php");
require_once("conexion.php");

$usuario = $_POST["usuario"];
$email = $_POST["email"];
$password = $_POST["password"];

try {
    $sql2 = "SELECT * FROM " . USUARIOS . " WHERE usuario = :usuario";
    $sentencia2 = $conexion->prepare($sql2);
    $sentencia2->bindvalue(":usuario", $usuario);
    $sentencia2->execute();
    // si no esta
    if (empty($sentencia2->fetch())) {
        //Registramos el usuario
        try {
            $sql = "INSERT INTO " . USUARIOS . "(usuario, email, password,tipo) VALUES(:usuario,:email,:password,:tipo)";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindValue(":usuario", $usuario);
            $sentencia->bindValue(":email", $email);
            $sentencia->bindValue(":password", $password);
            $sentencia->bindValue(":tipo", "Usuario");
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Operración de inserccion : " . $e->getMessage();
            die();
            $conexion = null;
        }
        header("Location: index.php");

    } else {
        //Notificamos que ese usuario ya se encuentra utilizado
        $usado = "utilizado";
        header("Location: RegistrarUsu.php?usuarioOcupado=$usado&email=$email");
    }
} catch (PDOException $e2) {
    echo "Operración de comprobación de usuario : " . $e2->getMessage();
    die();
    $conexion = null;
}
?>