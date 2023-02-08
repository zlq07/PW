<html lang="es">
<head>
    <title>ESCULTURA</title>
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
    <a href="index.php">Inicio</a> > <a href="escultura.php">Escultura</a>
</nav>

<section class="main">
    <aside class="noticias">
        <h1>Información reciente</h1>
        <section>
            <a href="exposiciones/noticia1.php">INSTRUCCIONES SOBRE USO DE LA MASCARILLA</a>
        </section>

        <section>
            <a href="exposiciones/noticia1.php">COMPRA DE ENDRADAS ONLINE</a>
        </section>

        <section>
            <a href="exposiciones/noticia1.php">INFORMACIÓN SOBRE LA DEVOLUCIÓN Y ANULACIÓN DE LAS RESERVAS</a>
        </section>

        <section>
            <a href="exposiciones/noticia1.php">INSTRUCCIONES SOBRE USO DE LA MASCARILLA</a>
        </section>

        <section>
            <a href="exposiciones/noticia1.php">COMPRA DE ENDRADAS ONLINE</a>
        </section>

        <section>
            <a href="exposiciones/noticia1.php">INFORMACIÓN SOBRE LA DEVOLUCIÓN Y ANULACIÓN DE LAS RESERVAS</a>
        </section>

        <section>
            <a href="exposiciones/noticia1.php">INSTRUCCIONES SOBRE USO DE LA MASCARILLA</a>
        </section>
    </aside>

    <section class="exposiciones">
        <?php
        if ($_SESSION['tipo'] == "Comisario") {
            echo ' <h2><a href="editarExpo.php">Editar Exposiciones</a></h2>';
        } else {
            $_SESSION['tipo'] = "Usuario";
            echo ' <h2>Exposicion</h2>';
        }
        require_once("mostrarExpo.php");
        $resultado = "";
        $resultado = mostrarExp();
        if (count($resultado) != 0) {
            foreach ($resultado as $fila) {
                echo '
                    <section class="exposiciones">
                        <section>
                        <a href="' . $fila["urlExp"] . '">
                            <img src="' . $fila["urlImagen"] . '" title="' . $fila["titulo"] . ', ' . $fila["tipo"] . '">
                        </a>
                        <p>' . $fila["titulo"] . '</p>
                        <p>' . $fila["descripcion"] . '</p>
                        </section>
                    </section>
                    <script>
                        var tituloid = document.getElementById("tituloid").innerHTML;
                        var tipoid = document.getElementById("tipoid").innerHTML;
                        document.getElementById("fotoexpo").onmouseover = function () {
                            alert("Titulo: " + tituloid + "\nTipo: " + tipoid);
                        }
                    </script>
                    ';
            }
        }
        ?>
    </section>
</section>

<footer style="clear: both; background-color: #CCCC00; text-align: center;word-spacing: 100px;">
    <a href="contacto.php" style="text-decoration: none;">Contacto</a>
    <a href="como_se_hizo.pdf" style="text-decoration: none;">Cómo_se_hizo.pdf</a>
</footer>
</body>
</html>