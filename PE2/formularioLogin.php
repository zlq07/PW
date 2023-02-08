<?php
//los php que necesita utilice un session_start();
function formularioLogin()
{
    //Usuario no logueado
    if (!isset($_SESSION['usuario'])) {
        echo '<br>
                <section class="site-login">
                <form class="flogin" method="post" action="login.php">
                    <input name="usuario" id="usuario" type="text" placeholder="Usuario"><br><br>
                    <input name="password" id="password" type="password" placeholder="Contraseña"><br><br>
                    <input type="submit" class="boton" value="Login" /><br>
                </form>
                <a href="RegistroUsu.php">Registrar Usuario</a>
                <a href="RegistroCom.php">Registrar Comidario</a>
                </section>
            ';
        if (isset($_SESSION['incorrecto'])) {
            echo '<script>
                        window.onload=function() {
                            alert("Usuario No Registrado");
                        }
                      </script>';
        }
    }
}

/* }else{ //Usuario logueado

     echo '  <section class="site-Login">
             <h2>
             '. $_SESSION['usuario'] . '</h2>
             <a href="editarUsu.php" class="enlace2">Editar</a>
             <a href="logout.php" class="enlace2"> Cerrar Sesion </a>
             <style>
             .site-Login a {
                 border: 1px solid black;
                 color: black;
                 background-color: antiquewhite;
                 text-decoration: none;
             }
             </style>
             </section>
             ';

 }
}*/
?>