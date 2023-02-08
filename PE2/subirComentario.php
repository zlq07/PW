<html lang="es">
<head>
    <title>Configurar Exposiciones</title>
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
    <a href="index.php">Inicio</a>> Exposicion ><a href="verComentario.php">Ver Comentario</a>
</nav>

<section class="editar">
    <h2>Exposiciones</h2>
    <section class="crearExpo">
        <h2>Subir Comentario: </h2>
        <form action="procesarSubirComen.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Comentario</legend>
                <label for="nombre_exp">Nombre de exposicion que pertenece *</label>
                <input type="text" id="nombre_exp" name="nombre_exp"/><br><br>
                <label for="comentario">Comentario *</label> <br><br>
                <textarea name="comentario" id="comentario" rows="8" cols="80"></textarea>
            </fieldset>
            <input type="submit" name="Enviar" class="boton">
            <input type="reset" name="Reset" class="boton">
        </form>
    </section>

</section>

<footer style="clear: both; background-color: #CCCC00; text-align: center;word-spacing: 100px;">
    <a href="contacto.php" style="text-decoration: none;">Contacto</a>
    <a href="como_se_hizo.pdf" style="text-decoration: none;">Cómo_se_hizo.pdf</a>
</footer>
</body>
</html>