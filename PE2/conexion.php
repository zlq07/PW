<?php
$dsn = "mysql:host=localhost;dbname=db06300759_pw2122";
$usuario = "pw06300759";
$password = "06300759";

try {
    $conexion = new PDO($dsn, $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
}
?>