<html lang="es">
<head>
    <title>Editar Usuario</title>
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
    <a href="index.php">Inicio</a> > <a href="editarUsu.php">Editar Usuario</a>
</nav>

<section class="editar">
    <article>
        <h2>Datos del usuario: </h2>
        <?php
        echo '<p>Usuario: ' . $_SESSION['usuario'] . '<br>' .
            'Email: ' . $_SESSION['email'] . '<br>' .
            'Contraseña: ' . $_SESSION['password'] . '<br>' .
            '</p>';
        echo '<article>
        <form id="formulario" action="procesarEdiUsu.php" method="post" name="formularioEdicionUsuario">
            <fieldset>
                <legend>Datos personales actual: </legend>

                <label for="usuario">Usuario *</label>
                <input type="text" id="usuario" name="usuario" value="' . $_SESSION['usuario'] . '"/><br><br>

                <label for="email">Email *</label>
                <input type="text" id="email" name="email" value="' . $_SESSION['email'] . '"/><br><br>

                <label for="password">Contraseña *</label>
                <input type="password" id="password" name="password" required value="' . $_SESSION['password'] . '"/><br><br>
            </fieldset>

            <button type="submit" name="Enviar" class="boton"> Actualizar datos personales </button>
            <button type="reset" name="Borrar" class="boton">Reset</button>
        </form>
    </article>';
        ?>
    </article>
</section>

<footer style="clear: both; background-color: #CCCC00; text-align: center;word-spacing: 100px;">
    <a href="contacto.php" style="text-decoration: none;">Contacto</a>
    <a href="como_se_hizo.pdf" style="text-decoration: none;">Cómo_se_hizo.pdf</a>
</footer>
</body>

</html>