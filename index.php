<!--Ignacio Henriquez Novoa 07-11-2022-->

<?php include('templatesihn/header.html'); ?>
<body>
    <h1 align="center"> Entrega 2 Bases de datos </h1>
    <h3 align="center"> Verónica Baeza - Ignacio Henríquez Novoa </h3>
    <br>
    <br>



    <h3 align="center"> Entregar un listado del nombre y teléfono de contacto de todos los artistas </h3>
    <form align="center" action="consultas/consulta_entregar_nombre_telefono_artistas.php" method="post">
        <input type="submit" value="Buscar">
    </form>

    <br>


    <h3 align="center"> Para conocer el número de entradas de cortesía que ha entregado un artista, 
        seleccione el nombre abajo </h3>
    <?php
    require("config/conexion.php");
    $result = $db -> prepare("SELECT DISTINCT nombre_artistico FROM artistas;");  
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    ?>
    <form align="center" action="consultas/cantidad_de_entradas_de_cortesia.php" method="post">
        Seleccione un artista:
        <select name="nombre_artistico">
            <?php 
            foreach ($dataCollected as $d) {
                echo "<option value=$d[0]>$d[0]</option>";
            }
            ?>
        </select>
        <br></br>
        <input type="submit" value="Buscar por artista">
    </form>



    <!-- consulta 3 ih-->
    <h3 align="center"> Para conocer los datos del último tour (el más reciente) de un artista, 
        introduzca el nombre abajo </h3>
    <?php
    require("config/conexion.php");
    $query = "SELECT DISTINCT nombre_artistico FROM artistas;";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    ?>

    <form align="center" action="consultas/consulta_datos_ultimo_tour_de_artista.php" method="post">
        Seleccionar un artista:
        <select name="artista">
            <?php
            foreach ($dataCollected as $d) {
                echo "<option value=$d[0]>$d[0]</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Buscar por artista">
    </form>


    <!---consulta 4 ih-->
    <h3 align="center"> Para conocer los países que serán visitados en un tour, introduzca el 
        nombre del tour abajo </h3>
    
    <?php
    require("config/conexion.php");
    $query= "SELECT DISTINCT tour FROM tours;";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    ?>

    <form align="center" action="consultas/consulta_paises_que_seran_visitados_en_el_tour.php" method="post">
        Seleccionar un tour:
        <select name="tour">
            <?php
            foreach ($dataCollected as $d) {
                echo "<option value=$d[0]>$d[0]</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Buscar por tour">
    </form>

    <!--Consulta 5 i-->
    <h3 align="center"> Para conocer todas las productoras con las que ha trabajado un artista, 
        seleccione el nombre del artista abajo </h3>
    <?php 
    require("config/conexion.php");
    $query = "SELECT DISTINCT nombre_artistico FROM artistas;";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    ?>
    <form align="center" action="consultas/consulta_productoras_que_ha_trabajado_artista.php" method="post">
        Seleccionar artista:
        <select name="artista">
            <?php
            foreach ($dataCollected as $d) {
                echo "<option value=$d[0]>$d[0]</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Buscar por artista">
    </form>      

    <!--consulta 2 ig-->
    <!-- h3 align="center"> Para conocer todos los hoteles en los que se ha quedado un artista, y 
        cuántas veces se ha hospedado en cada uno, introduzca el nombre del artista abajo </h3--> 
    <h3 align="center">Si quiere conocer el número de entradas que ha entregado un artista, seleccione un artista abajo</h3>
    <?php
    require("config/conexion.php");
    $query = "SELECT DISTINCT nombre_artistico FROM artistas;";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    ?>
    <form align="center" action="consultas/consulta_entregar_numero_entradas_cortesia.php" method="post">
        seleccionar artista:
        <select name="artista">
            <?php
            foreach ($dataCollected as $d) {
                echo "<option value=$d[0]>$d[0]</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Buscar por artista">
    </form>


    <h3 align="center">Para mostrar al artista que ha entregado la mayor cantidad de entradas de 
        contesía, haga clic en el boton de abajo </h3>
    <!-- form align="center" action="consultas/"-->

    <p style ="text-align:center;"> Hola xd </p>
</body>
</html>
