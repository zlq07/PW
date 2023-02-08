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
    <a href="index.php">Inicio</a> > <a href="editarExpo.php">Editar Exposicion</a>
</nav>

<section class="editar">
    <h2>Exposiciones</h2>
    <section class="crearExpo">
        <h2>Crear Exposicion: </h2>
        <form action="procesarSubirExpo.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Datos de Exposicion.</legend>
                <input type="file" name="foto" class="boton" id="foto"><br><br>

                <label for="titulo">Titulo *</label>
                <input type="text" id="titulo" name="titulo"/><br><br>

                <label for="Tipo de Exposicion">Tipo de exposicion: *</label>
                <input type="text" id="tipo" name="tipo"/><br><br>

                <label for="fechaDeAlta">Fecha de Inicio *</label>
                <input type="date" id="fechaDeAlta" name="fechaDeAlta"/><br><br>

                <label for="fechaFinalizacion">Fecha de finalizacion *</label>
                <input type="date" id="fechaFinalizacion" name="fechaFinalizacion"/><br><br>

                <label for="Descripcion">Descripcion *</label> <br><br>
                <textarea name="Descripcion" id="Descripcion" rows="8" cols="80"></textarea>
            </fieldset>
            <input type="submit" name="Enviar" class="boton">
            <input type="reset" name="Reset" class="boton">
        </form>
    </section>

    <section>
        <h2>Borrar Exposicion: </h2>
        <form action="procesarBorradoExp.php" method="post">
            <!-- Para saber que exposicion existentes -->
            <?php
                require_once("mostrarExpo.php");
                $resultado = "";
                $resultado = mostrarExp();
                if (count($resultado) != 0) {
                    foreach ($resultado as $fila) {
                        echo '
                            <input type="checkbox" id="titulo" name="titulo" value="' . $fila["titulo"] . '">
                            <label for="titulo">' . $fila["titulo"] . '</label><br>
                            ';
                    }
                }
            ?>
            <br><input type="submit" name="Enviar" class="boton">
        </form>
    </section>

    <section>
        <h2>Editar Exposicion: </h2>
            <!-- Para saber que exposicion existentes -->
            <?php
                //require_once("mostrarExpo.php");
                //$resultado = "";
                //$resultado = mostrarExp();
                if (count($resultado) != 0) {
                    foreach ($resultado as $fila) {
                        echo '
                            <form action="procesarEditarExp.php" method="post">
                                <fieldset>
                                <legend>Datos de Exposicion.</legend>
            
                                <label for="titulo">Titulo *</label>
                                <input type="text" id="titulo" name="titulo" value="' . $fila["titulo"] . '"/><br><br>
            
                                <label for="Tipo de Exposicion">Tipo de exposicion: *</label>
                                <input type="text" id="tipo" name="tipo" value="' . $fila["tipo"] . '"/><br><br>
            
                                <label for="fechaDeAlta">Fecha de Inicio *</label>
                                <input type="date" id="fechaDeAlta" name="fechaDeAlta" value="' . $fila["fechaalta"] . '"/><br><br>
            
                                <label for="fechaFinalizacion">Fecha de finalizacion *</label>
                                <input type="date" id="fechaFinalizacion" name="fechaFinalizacion" value="' . $fila["fechabaja"] . '"/><br><br>
                                </fieldset>
                                <br><button type="submit" name="Enviar" class="boton"> Actualizar datos exposicion </button>
                                <button type="reset" name="Borrar" class="boton">Reset</button>
                            </form>
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