<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $Email = $_GET["Email"];
    if ($Email != NULL) {
        require "connection_bdd.php";

        if (mysqli_connect_errno()) {
            echo "falló al conectar con la Base de Datos";
            exit();
        }

        mysqli_select_db($connection, $db_nombre) or die("No se encuentra la base de datos");
        mysqli_set_charset($connection, "utf16");

        $consulta = "SELECT Email, Contraseña FROM usuarios WHERE Email = '$Email'";
        $resultado = mysqli_query($connection, $consulta);

        $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        $E = $row['Email'];
        $C = $row['Contraseña'];
        if ($Email == $E) {
            $mi_pag = $_SERVER["PHP_SELF"];
            $Ref = '../vista/Index.html';
            echo ("<form action='" . $Ref . "' method='get'>
<input type='submit' name='enviar' value='Inicio'>
</form>");

            echo ("<h1>Bike Doors ®</h1>

<h2>Comodidad y rapidez al alcance de tus manos</h2>

<br>
<br>

<h4>Su contraseña es $C<h4>");
        } else {
            $mi_pag = $_SERVER["PHP_SELF"];
            $Ref = '../vista/Index.html';


            echo ("<form action='" . $Ref . "' method='get'>
<input type='submit' name='enviar' value='Inicio'>
</form>");

            echo ("<h1>Bike Doors ®</h1>

<h2>Comodidad y rapidez al alcance de tus manos</h2>

<br>
<br>

<h4>Por favor ingrese el correo electronico del usuario $U<h4>");
            echo ("<form action='" . $mi_pag . "' method='get'>

<label>Email: <input type='text' name='Email' minlength='5' maxlength='50'></label> El correo ingresado no es correcto<br><br>
<input type='submit' name='enviar' value='Recuperar contraseña'>
</form>

");

        }
    } else {
        $mi_pag = $_SERVER["PHP_SELF"];
        $Ref = '../vista/Index.html';



        echo ("<form action='" . $Ref . "' method='get'>
<input type='submit' name='enviar' value='Inicio'>
</form>");

        echo ("<h1>Bike Doors ®</h1>

<h2>Comodidad y rapidez al alcance de tus manos</h2>

<br>
<br>

<h4>Por favor ingrese el correo electronico del usuario<h4>");
        echo ("<form action='" . $mi_pag . "' method='get'>

<label>Email: <input type='text' name='Email' minlength='5' maxlength='50'></label> <br><br>
<input type='submit' name='enviar' value='Recuperar contraseña'>
</form>

");
    }


    ?>
</body>

</html>