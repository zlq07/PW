<html lang="es">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="index.css">
    <script type="text/javascript" src="R_Usuario.js"></script>
    <title>Registro de Usuarios</title>
</head>

<body>
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

    </section>

</header>

<nav>
    <a href="index.php">Inicio</a>
</nav>


<section>
    <?php
    if (isset($_GET["usuarioOcupado"]) && $_GET["usuarioOcupado"] == "utilizado") {
        echo '<script>
                        window.onload=function() {
                            alert("Nombre de usuario ya utilizado");
                        }
                     </script>';
    }
    ?>
    <form action="altaUsu.php" method="post" name="formularioAltaUsuario" onsubmit="return registerUsuario();">
        <fieldset>
            <legend>Datos Personales</legend>

            <label for="usuario">Nombre de Usuario *</label>
            <input type="text" id="usuario" name="usuario" onblur="validateName()"/>
            <br><span id="nameMsg">Puedes utilizar letras o numeros.</span><br/>

            <label for="email">Email *</label>
            <input type="email" id="email" name="email" onblur="validateEmail()"/>
            <br><span id="emailMsg"></span><br/>

            <label for="password">Contraseña *</label>
            <input type="password" id="password" name="password" onblur="validatePwd()"/>
            <br><span
                    id="pwdMsg1">Utiliza ocho caracteres como mínimo con una combinación de letras, números y símbolos</span><br/>

            <label for="password2">Repetir la Contraseña *</label>
            <input type="password" id="password2" name="password2" onblur="confirmPwd()"/>
            <span id="pwdMsg2"></span><br/>

        </fieldset>
        <br>
        <input type="submit" name="Enviar" class="boton">
        <input type="reset" name="Reset" class="boton">
    </form>
</section>


<footer style="clear: both; background-color: #CCCC00; text-align: center;word-spacing: 100px;">
    <a href="contacto.php" style="text-decoration: none;">Contacto</a>
    <a href="como_se_hizo.pdf" style="text-decoration: none;">Cómo_se_hizo.pdf</a>
</footer>
</body>

</html>