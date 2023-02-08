<?php
function mostrarCom()
{
    require_once("conexion.php");
    require_once("configuracion.php");

    try {
        $sql = "SELECT * FROM " . COMENTARIOS;
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();
    } catch (PDOException $e) {
        echo $e;
        $conexion = null;
        die();
    }

    $resultado = $sentencia->fetchAll();
    return $resultado;
}/*
    if(count($resultado) != 0){
        foreach($resultado as $fila){
            if($fila["nombre_exp"] == "Enamórate de la Ciudad Prohibida"){
                echo'
                    <section class="comentarios">
                    <section>
                        <h2>'. $fila["usuario"] .' : <p>'. $fila["comentario"] .'</p></h2>
                    <section>
                    </section>';
            }
        }
    }

}*/
?>