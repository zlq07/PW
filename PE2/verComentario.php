<html lang="es">
<head>
    <title>COMENTARIOS</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="index.css">
    <script type="text/javascript" scr="R_Usuario.js"></script>
</head>
<body>
<?php
session_start();
?>
<header>
    <section class="site-logo">
        <a href="index.php">
            <img src="imagenes/logo.png">
        </a>
    </section>

    <section class="site-name">
        <h1>SERENDIPITY</h1>
    </section>

    <section class="site-login">
        <?php
        require_once("formularioLogin.php");
        formularioLogin();
        if (isset($_SESSION['usuario'])) {
            echo '  
                    <section class="site-login">
                    <br><h2> ' . $_SESSION['tipo'] . ' : ' . $_SESSION['usuario'] . '</h2>';
            if ($_SESSION['tipo'] == "Comisario") {
                echo '<a href="editarCom.php" class="enlace2">Editar</a>
                    <a href="logout.php" class="enlace2"> Cerrar Sesion </a></section>';
            } else {
                echo '<a href="editarUsu.php" class="enlace2">Editar</a>
                    <a href="logout.php" class="enlace2"> Cerrar Sesion </a></section>';
            }
        }
        ?>
    </section>
    <section class="barra-menu">
        <a href="fotografia.php">Fotografia</a>
        <a href="pintura.php">Pintura </a>
        <a href="escultura.php">Escultura</a>
    </section>
</header>

<nav>
    <a href="index.php">Inicio</a> > Exposicion >
    <?php
    if (!isset($_SESSION['usuario'])){
        echo '';
    }else if ($_SESSION['tipo'] == "Comisario") {
        echo '<a href="editarPiezas.php">Editar Piezas</a>';
    }
    ?>
    > <a href="verComentario.php">Comentario</a>
</nav>
<section class="Pexposicion">
    <?php
    if (!isset($_SESSION['usuario'])){
        echo '';
    }else if ($_SESSION['tipo'] == "Usuario") {
        echo '<h2><a href="subirComentario.php">Subir Comentario</a></h2>';
    }
    require_once("mostrarComentario.php");
    $resultado = mostrarCom();
    if (count($resultado) != 0) {
        foreach ($resultado as $fila) {
            if ($fila["nombre_exp"] == "Enamórate de la Ciudad Prohibida") {
                echo '
                                <section class="comentarios">
                                <section>
                                    <h2>' . $fila["usuario"] . ' : <p>' . $fila["comentario"] . '</p></h2>
                                <section>
                                </section>';
            }
        }
    }
    ?>
</section>
</section>
<footer style="clear: both; background-color: #CCCC00; text-align: center;word-spacing: 100px;">
    <a href="contacto.php" style="text-decoration: none;">Contacto</a>
    <a href="como_se_hizo.pdf" style="text-decoration: none;">Cómo_se_hizo.pdf</a>
</footer>
</html>