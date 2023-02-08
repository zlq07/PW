<?php
require_once("configuracion.php");
require_once("conexion.php");

$usuario = $_POST["usuario"];
$email = $_POST["email"];
$password = $_POST["password"];
$dni = $_POST["DNI"];
$telefono = $_POST["telefono"];

try {
    $sql2 = "SELECT * FROM " . COMISARIOS . " WHERE usuario = :usuario";
    $sentencia2 = $conexion->prepare($sql2);
    $sentencia2->bindvalue(":usuario", $usuario);
    $sentencia2->execute();
    // si no esta
    if (empty($sentencia2->fetch())) {
        //Registramos el comisarios
        try {
            $sql = "INSERT INTO " . COMISARIOS . "(dni,usuario, email, password,telefono,tipo) VALUES(:dni,:usuario,:email,:password,:telefono,:tipo)";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindValue(":dni", $dni);
            $sentencia->bindValue(":usuario", $usuario);
            $sentencia->bindValue(":email", $email);
            $sentencia->bindValue(":password", $password);
            $sentencia->bindValue(":telefono", $telefono);
            $sentencia->bindValue(":tipo", "Comisario");
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
        header("Location: RegistrarCom.php?usuarioOcupado=$usado&DNI=$dni&telefono=$telf&email=$email");
    }
} catch (PDOException $e2) {
    echo "Operración de comprobación de usuario : " . $e2->getMessage();
    die();
    $conexion = null;
}
?>