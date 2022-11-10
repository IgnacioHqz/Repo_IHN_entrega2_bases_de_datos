<!--Ignacio Henríquez Novoa 09-11-2022-->
<?php include('../templatesihn/header.html');   ?>

<body>
    <?php
    require("../config/conexion.php");
    $var = $_POST["artista"];
    $query = "$SELECT DISTINCT hospedaje_traslado.nombre_hotel, COUNT(hospedaje_traslado.cod_reserva)
     AS numero_hospedajes FROM hospedaje_traslado, artistas WHERE artista.nombre_artistico='$var' AND 
     hospedaje_traslado.aid=artistas.aid GROUP BY nombre_hotel";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    ?>

    <table>
        <tr>
            <th>Hotel</th>
            <th>Cantidad de veces que alojó en el hotel</th>
        </tr>
    <?php
    foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td> </tr>";
    }
    ?>
    </table>
<?php include('../templatesihn/footer.html'); ?>