<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKD´s</title>
</head>

<body>

    <?php
    $Usuario = $_GET["User"];
    // $Email = $_GET["Email"];
    
    if ($Usuario != NULL) {
        require "connection_bdd.php";

        if (mysqli_connect_errno()) {
            echo "falló al conectar con la Base de Datos";
            exit();
        }

        mysqli_select_db($connection, $db_nombre) or die("No se encuentra la base de datos");
        mysqli_set_charset($connection, "utf8");

        $consulta = "SELECT Usuario FROM usuarios WHERE Usuario = '$Usuario'";
        $resultado = mysqli_query($connection, $consulta);

        $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        $U = $row['Usuario'];
        if($Usuario == $U)
        {
            $extra = "Olvide2.php";
            header("Location: $extra");
            
            
        }else{
            $mi_pag = $_SERVER["PHP_SELF"];
            $Ref = '../vista/Index.html';
            $Ref1 = "../modelo/Registrarse.php";
    
    
            echo ("<form action='" . $Ref . "' method='get'>
            <input type='submit' name='enviar' value='Inicio'>
        </form>");
    
            echo ("<h1>Bike Doors ®</h1>
    
        <h2>Comodidad y rapidez al alcance de tus manos</h2>
    
        <br>
        <br>
    
        <h4>Recuperación de contraseña<h4>");
            echo ("<form action='" . $mi_pag . "' method='get'>
        
        <label>Nombre de Usuario: <input type='text' name='User' minlength='5' maxlength='25'></label> Nombre de usuario no encontrado<br><br>
        <input type='submit' name='enviar' value='Recuperar contraseña'>
        </form>
    
        <form action='" . $Ref1 . "' method='get'>
    
            
        <br>
            <h5>No tienes Usuario? Registrate ahora<h5>
            
            <input type='submit' name='Registro' value='Registrate ahora'>
        </form>
        ");  
        }
    }else{

        $mi_pag = $_SERVER["PHP_SELF"];
        $Ref = '../vista/Index.html';
        $Ref1 = "../modelo/Registrarse.php";


        echo ("<form action='" . $Ref . "' method='get'>
        <input type='submit' name='enviar' value='Inicio'>
    </form>");

        echo ("<h1>Bike Doors ®</h1>

    <h2>Comodidad y rapidez al alcance de tus manos</h2>

    <br>
    <br>

    <h4>Recuperación de contraseña<h4>");
        echo ("<form action='" . $mi_pag . "' method='get'>
    
    <label>Nombre de Usuario: <input type='text' name='User' minlength='5' maxlength='25'></label><br><br>
    <input type='submit' name='enviar' value='Recuperar contraseña'>
    </form>

    <form action='" . $Ref1 . "' method='get'>

        
    <br>
        <h5>No tienes Usuario? Registrate ahora<h5>
        
        <input type='submit' name='Registro' value='Registrate ahora'>
    </form>
    ");
    }
    ?>
</body>

</html>