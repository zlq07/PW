<?php
function mostrarPieza()
{
    require_once("conexion.php");
    require_once("configuracion.php");

    try {
        $sql = "SELECT * FROM " . PIEZAS;
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();
    } catch (PDOException $e) {
        echo $e;
        $conexion = null;
        die();
    }

    $resultado = $sentencia->fetchAll();
    return $resultado;
    /*if(count($resultado) != 0){
        foreach($resultado as $fila){
            echo'
            <section class="exposiciones">
                <section>
                <a href="'. $fila["urlExp"] .'">
                    <img src="'. $fila["urlImagen"] .'" title="'. $fila["titulo"] .', '. $fila["tipo"] .'">
                </a>
                <p>'. $fila["titulo"] .'</p>
                <p>'. $fila["descripcion"] .'</p>
                </section>
            </section>
            ';
        }
    }*/
}

?>