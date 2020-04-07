<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKD´s</title>


</head>

<body>
    <form action="../vista/Sesion3.html" method="get">
        <input type="submit" name="enviar" value="Inicio">
    </form>

    <br>
    <br>

    <form action="busqueda.php" method="get">
        <input type="submit" name="enviar" value="Buscar bicicletas disponibles">
    </form>
    <br>
    <br>

    <?php

    
    
        require "connection_bdd.php";

        if (mysqli_connect_errno()) {
            echo "falló al conectar con la Base de Datos";
            exit();
        }

        mysqli_select_db($connection, $db_nombre) or die("No se encuentra la base de datos");
        mysqli_set_charset($connection, "utf8");



        $consulta = "SELECT Nombre_ruta, Numero_ruta, Direccion_ruta FROM rutas";
        $resultado = mysqli_query($connection, $consulta);


        while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {

            echo $fila["Numero_ruta"] . " ";
            echo $fila["Nombre_ruta"] . " ";
            echo $fila["Direccion_ruta"] . " ";
            echo "<br>";
        }

        mysqli_close($connection);
    
    ?>


</body>

</html>