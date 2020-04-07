<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKD´s</title>
</head>

<body>

    <form action="busqueda.php" method="get">
        <input type="submit" name="enviar" value="Volver">
    </form>

    <?php

    $busqueda = $_GET["buscar"];

    require "connection_bdd.php";

    if (mysqli_connect_errno()) {
        echo "falló al conectar con la Base de Datos";
        exit();
    }

    mysqli_select_db($connection, $db_nombre) or die("No se encuentra la base de datos");
    mysqli_set_charset($connection, "utf8");



    $consulta = "SELECT DISTINCT Modelo, Estacion_actual, Estacion_inicial, count(Modelo) as Cantidad FROM bicicletas_estacion WHERE Estacion_actual LIKE '$busqueda%' GROUP BY Estacion_actual ";
    $resultado = mysqli_query($connection, $consulta);

    $registros = 1;
    while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {

        echo $fila["Estacion_actual"] . " ";
        echo $fila["Cantidad"] . " ";
        echo "<br>";
    }

    mysqli_close($connection);

    ?>

</body>

</html>