<html lang="es">
<head>
    <title>HOME</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../index.css">
    <script type="text/javascript" scr="../R_Usuario.js"></script>
</head>
<body>
<?php
session_start();
?>
<header>
    <section class="site-logo">
        <a href="../index.php">
            <img src="../imagenes/logo.png">
        </a>
    </section>

    <section class="site-name">
        <h1>SERENDIPITY</h1>
    </section>

    <section class="site-login">
        <?php
        require_once("../formularioLogin.php");
        formularioLogin();
        if (isset($_SESSION['usuario'])) {
            echo '  
                    <section class="site-login">
                    <br><h2> ' . $_SESSION['tipo'] . ' : ' . $_SESSION['usuario'] . '</h2>';
            if ($_SESSION['tipo'] == "Comisario") {
                echo '<a href="../editarCom.php" class="enlace2">Editar</a>
                    <a href="../logout.php" class="enlace2"> Cerrar Sesion </a></section>';
            } else {
                echo '<a href="../editarUsu.php" class="enlace2">Editar</a>
                    <a href="../logout.php" class="enlace2"> Cerrar Sesion </a></section>';
            }
        }
        ?>
    </section>

    <section class="barra-menu">
        <a href="../fotografia.php">Fotografia</a>
        <a href="../pintura.php">Pintura </a>
        <a href="../escultura.php">Escultura</a>
    </section>
</header>

<nav>
    <a href="../index.php">Inicio </a>
    << <a href="noticia1.php">Noticia 1</a>
</nav>


<article class="n1">
    <header>
        <h1>INSTRUCCIONES SOBRE USO DE LA MASCARILLA</h1>
    </header>
    <p>La Consejería de Salud de la Junta de Andalucía seguirá recomendando el empleo de mascarillas en los
        interiores a partir del 19 de abril después de que la ministra de Sanidad, Carolina Darias, haya propuesto a las
        comunidades autónomas el fin de su obligatoriedad desde esa fecha.
    </p>
    <p>
        A partir del dia 19 no será obligatorio el uso de mascarilla en las salas de exposiciones.
    </p>
    <p>
        18 de Abril de 2020, Granada
    </p>
</article>


<footer style="clear: both; background-color: #CCCC00; text-align: center;word-spacing: 100px;">
    <a href="contacto.php" style="text-decoration: none;">Contacto</a>
    <a href="como_se_hizo.pdf" style="text-decoration: none;">Cómo_se_hizo.pdf</a>
</footer>
</body>
</html>