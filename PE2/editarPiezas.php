<html lang="es">
<head>
    <title>Configurar Piezas</title>
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
    <a href="index.php">Inicio</a> > <a href="editarPiezas.php">Editar Pieza</a>
</nav>

<section class="editar">
    <h2>Datos de Piezas: </h2>
    <section class="crearExpo">
        <h2>Crear Pieza: </h2>
        <!-- Para saber que exposicion existentes -->
        <form action="procesarSubirPieza.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Datos de Pieza</legend>
                <input type="file" name="foto" class="boton" id="foto"><br><br>

                <label for="nombre">Nombre *</label>
                <input type="text" id="nombre" name="nombre"/><br><br>

                <label for="autor">Autor *</label>
                <input type="text" id="autor" name="autor"/><br><br>

                <label for="nombre_exp">Nombre de exposicion que pertenece *</label>
                <input type="text" id="nombre_exp" name="nombre_exp"/><br><br>

                <label for="descripcion">Descripcion *</label> <br><br>
                <textarea name="descripcion" id="descripcion" rows="8" cols="80"></textarea>
            </fieldset>
            <input type="submit" name="Enviar" class="boton">
            <input type="reset" name="Reset" class="boton">
        </form>
    </section>

    <section>
        <h2>Borrar Exposicion:</h2>
        <form action="procesarBorradoPieza.php" method="post">
            <!-- Para saber que exposicion existentes -->
            <?php
                require_once("mostrarPiezas.php");
                $resultado = "";
                $resultado = mostrarPieza();
                if (count($resultado) != 0) {
                    foreach ($resultado as $fila) {
                        echo '
                            <input type="checkbox" id="nombre" name="nombre" value="' . $fila["nombre"] . '">
                            <label for="nombre">' . $fila["nombre"] . '</label><br>
                            ';
                    }
                }
            ?>
            <br><input type="submit" name="Enviar" class="boton">
        </form>
    </section>

</section>

<footer style="clear: both; background-color: #CCCC00; text-align: center;word-spacing: 100px;">
    <a href="contacto.php" style="text-decoration: none;">Contacto</a>
    <a href="como_se_hizo.pdf" style="text-decoration: none;">Cómo_se_hizo.pdf</a>
</footer>
</body>
</html>