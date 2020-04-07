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
    <form action="Rutas_disponibles.php" method="get">
        <input type="submit" name="enviar" value="Buscar Rutas disponibles">
    </form>
    <br>

    <h1>Buscar modelo de bicicleta por estación</h1>
    <form action="resultado.php" method="get">
        <label>Busqueda: <input type="text" name="buscar"> </label>
        <input type="submit" name="enviar" value="Encontrar">
    </form>

    <H2>lista de modelos</H2>

    <?php

    require "connection_bdd.php";

    if (mysqli_connect_errno()) {
        echo "falló al conectar con la Base de Datos";
        exit();
    }

    mysqli_select_db($connection, $db_nombre) or die("No se encuentra la base de datos");
    mysqli_set_charset($connection, "utf8");



    $consulta = "SELECT DISTINCT Modelo FROM bicicletas_estacion ";
    $resultado = mysqli_query($connection, $consulta);

    
    while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {

        echo $fila["Modelo"] . " ";
        echo "<br>";
    }

    mysqli_close($connection);

    ?>


    <h1>Buscar bicicletas por estación</h1>
    <form action="resultado_1.php" method="get">
        <label>Busqueda: <input type="text" name="buscar"> </label>
        <input type="submit" name="enviar" value="Encontrar">
    </form>

    <H2>lista de Estaciones</H2>

    <?php

    require "connection_bdd.php";

    if (mysqli_connect_errno()) {
        echo "falló al conectar con la Base de Datos";
        exit();
    }

    mysqli_select_db($connection, $db_nombre) or die("No se encuentra la base de datos");
    mysqli_set_charset($connection, "utf8");



    $consulta = "SELECT DISTINCT Estacion_actual FROM bicicletas_estacion ORDER BY Estacion_actual ASC ";
    $resultado = mysqli_query($connection, $consulta);

    
    while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {

        echo $fila["Estacion_actual"] . " ";
        echo "<br>";
    }

    mysqli_close($connection);

    ?>


</body>

</html>