<!--Ignacio Henríquez Novoa-->
<?php include('../templatesihn/header.html');   ?>

<body>
    <?php
    require("../config/conexion.php");

    $var = $_POST["artista"];
    #$query = "SELECT COUNT(DISTINCT *) FROM entradas_cortesia WHERE aid = (SELECT artistas.aid FROM artistas WHERE nombre_artistico='$var');"; IHN: no funciono
    $query = "SELECT COUNT(DISTINCT tablaIHN.cid) FROM (SELECT * FROM entradas_cortesia, artistas WHERE entradas_cortesia.aid = artistas.aid) AS tablaIHN WHERE tablaIHN.nombre_artistico='$var';";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();

#    $result -> fetch(); #cita ihn: https://es.stackoverflow.com/questions/304856/c%C3%B3mo-poder-obtener-los-valores-del-count
#    print_r($result);
    #$dataCollected = $result -> fetchAll();
    #print_r($result->fetchColumn());

#    echo "<tr> <td>$result</td </tr>"; #cita ihn:https://es.stackoverflow.com/questions/304856/c%C3%B3mo-poder-obtener-los-valores-del-count


    ?>
    <table>
        <tr>
            <th>Numero entradas de cortesia</th>
        </tr>
            <?php
            foreach ($dataCollected as $i) {
                echo "<tr><td>$i[0]</td></tr>";
            }
            ?>





<?php include('../templatesihn/footer.html'); ?>