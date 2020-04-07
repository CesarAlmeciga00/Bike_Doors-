<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKD´s</title>

    <?php

    function registro($Nombre, $Usuario, $contraseña, $email, $sexo, $telefono)
    {


        require "connection_bdd.php";

        if (mysqli_connect_errno()) {
            echo "falló al conectar con la Base de Datos";
            exit();
        }

        mysqli_select_db($connection, $db_nombre) or die("No se encuentra la base de datos");
        mysqli_set_charset($connection, "utf8");



        $consulta = "INSERT INTO usuarios (Nombre_completo, Sexo, Usuario, Contraseña, Email, Telefono, Rol_usuario) VALUES ('$Nombre', '$sexo', '$Usuario', '$contraseña', '$email', '$telefono', '3')";
        $resultado = mysqli_query($connection, $consulta);

        mysqli_close($connection);
    }
    ?>


</head>

<body>
    <?php

    $Nombre = $_GET["Nombre"];
    $Usuario = $_GET["User"];
    $contraseña = $_GET["Pass"];
    $email = $_GET["Email"];
    $sexo = $_GET["Sexo"];
    $telefono = $_GET["Tel"];
    $Confirmar = $_GET["Pass_C"];

    if ($Nombre != NULL && $Usuario != NULL && $contraseña != NULL && $email != NULL && $sexo != NULL && $telefono != NULL) {
        if ($contraseña == $Confirmar) {
            require "connection_bdd.php";
            $consulta = "SELECT * FROM usuarios WHERE Usuario = '$Usuario'";
            $resultado = mysqli_query($connection, $consulta);
            $rowcount = mysqli_num_rows($resultado);
            if ($rowcount > 0) {
                $mi_pag = $_SERVER["PHP_SELF"];
                $Ref = "../vista/index.html";

                echo ("<form action='" . $Ref . "' method='get'>
        <input type='submit' name='enviar' value='Inicio'>
    </form>");

                echo ("<h1>Bike Doors ®</h1>

    <h2>Comodidad y rapidez al alcance de tus manos</h2>

    <br>
    <br>

    <h1>Registrarse </h1>");
                echo ("<form action='" . $mi_pag . "' method='get'>
    <label>Nombre completo: <input type='text' name='Nombre' title='Solo Letras (Iniciales en mayuscula)'> </label><br><br>
    <label>Nombre de Usuario: <input type='text' name='User' minlength='5' maxlength='25' title='Entre 5 y 25 caracteres alfanúmericos'>El nombre de usuario ingresado no está disponible </label><br><br>
    <label>Contraseña: <input type='password' name='Pass' minlength='6' title='minimo 6 caracteres'> </label><br><br>
    <label>Confirmar Contraseña: <input type='password' name='Pass_C' minlength='6' title='minimo 6 caracteres'> </label><br><br>
    <label>Correo electronico: <input type='text' name='Email' title='debe contener arroba (@)'> </label><br><br>
    <label>Sexo: <input type='radio' name='Sexo' value='Masculino'>M <input type='radio' name='Sexo' value='Femenino'>F </label><br><br>
    <label>Telefono: <input type='text' name='Tel' minlength='10' maxlength='10' title='Solo números'> </label><br><br>
    <input type='submit' name='enviar' value='Registrarse'>
    </form>");
            } else {
                registro($Nombre, $Usuario, $contraseña, $email, $sexo, $telefono);

                $Ref = "../vista/index.html";

                echo ("<form action='" . $Ref . "' method='get'>
        <input type='submit' name='enviar' value='Inicio'>
    </form>");

                echo ("<h1>Bike Doors ®</h1>

    <h2>Comodidad y rapidez al alcance de tus manos</h2>

    <br>
    <br>

    <h1>Registro exitoso</h1>");
            }
        } else {
            $mi_pag = $_SERVER["PHP_SELF"];
            $Ref = "../vista/index.html";

            echo ("<form action='" . $Ref . "' method='get'>
        <input type='submit' name='enviar' value='Inicio'>
    </form>");

            echo ("<h1>Bike Doors ®</h1>

    <h2>Comodidad y rapidez al alcance de tus manos</h2>

    <br>
    <br>

    <h1>Registrarse </h1>");
            echo ("<form action='" . $mi_pag . "' method='get'>
    <label>Nombre completo: <input type='text' name='Nombre' title='Solo Letras (Iniciales en mayuscula)'> </label><br><br>
    <label>Nombre de Usuario: <input type='text' name='User' minlength='5' maxlength='25' title='Entre 5 y 25 caracteres alfanúmericos'> </label><br><br>
    <label>Contraseña: <input type='password' name='Pass' minlength='6' title='minimo 6 caracteres'> </label><br><br>
    <label>Confirmar Contraseña: <input type='password' name='Pass_C' minlength='6' title='minimo 6 caracteres'> </label> Las Contraseñas no coinciden<br><br>
    <label>Correo electronico: <input type='text' name='Email' title='debe contener arroba (@)'> </label><br><br>
    <label>Sexo: <input type='radio' name='Sexo' value='Masculino'>M <input type='radio' name='Sexo' value='Femenino'>F </label><br><br>
    <label>Telefono: <input type='text' name='Tel' minlength='10' maxlength='10' title='Solo números'> </label><br><br>
    <input type='submit' name='enviar' value='Registrarse'>
    </form>");
        }
    } else {

        if ($Nombre == NULL && $Usuario == NULL && $contraseña == NULL && $email == NULL && $sexo == NULL && $telefono == NULL) {
            $mi_pag = $_SERVER["PHP_SELF"];
            $Ref = "../vista/index.html";

            echo ("<form action='" . $Ref . "' method='get'>
        <input type='submit' name='enviar' value='Inicio'>
    </form>");

            echo ("<h1>Bike Doors ®</h1>

    <h2>Comodidad y rapidez al alcance de tus manos</h2>

    <br>
    <br>

    <h1>Registrarse </h1>");
            echo ("<form action='" . $mi_pag . "' method='get'>
    <label>Nombre completo: <input type='text' name='Nombre' title='Solo Letras (Iniciales en mayuscula)'> </label><br><br>
    <label>Nombre de Usuario: <input type='text' name='User' minlength='5' maxlength='25' title='Entre 5 y 25 caracteres alfanúmericos'> </label><br><br>
    <label>Contraseña: <input type='password' name='Pass' minlength='6' title='minimo 6 caracteres'> </label><br><br>
    <label>Confirmar Contraseña: <input type='password' name='Pass_C' minlength='6' title='minimo 6 caracteres'> </label><br><br>
    <label>Correo electronico: <input type='text' name='Email' title='debe contener arroba (@)'> </label><br><br>
    <label>Sexo: <input type='radio' name='Sexo' value='Masculino'>M <input type='radio' name='Sexo' value='Femenino'>F </label><br><br>
    <label>Telefono: <input type='text' name='Tel' minlength='10' maxlength='10' title='Solo números'> </label><br><br>
    <input type='submit' name='enviar' value='Registrarse'>
    </form>");
        } else {
            $mi_pag = $_SERVER["PHP_SELF"];
            $Ref = "../vista/index.html";

            echo ("<form action='" . $Ref . "' method='get'>
        <input type='submit' name='enviar' value='Inicio'>
    </form>");

            echo ("<h1>Bike Doors ®</h1>

    <h2>Comodidad y rapidez al alcance de tus manos</h2>

    <br>
    <br>

    <h1>Registrarse (Todos los campos son Obligatorios)</h1>");
            echo ("<form action='" . $mi_pag . "' method='get'>
    <label>Nombre completo: <input type='text' name='Nombre' title='Solo Letras (Iniciales en mayuscula)'> </label><br><br>
    <label>Nombre de Usuario: <input type='text' name='User' minlength='5' maxlength='25' title='Entre 5 y 25 caracteres alfanúmericos'> </label><br><br>
    <label>Contraseña: <input type='password' name='Pass' minlength='6' title='minimo 6 caracteres'> </label><br><br>
    <label>Confirmar Contraseña: <input type='password' name='Pass_C' minlength='6' title='minimo 6 caracteres'> </label><br><br>
    <label>Correo electronico: <input type='text' name='Email' title='debe contener arroba (@)'> </label><br><br>
    <label>Sexo: <input type='radio' name='Sexo' value='Masculino'>M <input type='radio' name='Sexo' value='Femenino'>F </label><br><br>
    <label>Telefono: <input type='text' name='Tel' minlength='10' maxlength='10' title='Solo números'> </label><br><br>
    <input type='submit' name='enviar' value='Registrarse'>
    </form>");
        }
    }


    ?>
</body>

</html>