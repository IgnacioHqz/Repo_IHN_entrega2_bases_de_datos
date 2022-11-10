<!--Ignacio Henríquez Novoa--> 
<?php include ('../templatesihn/header.html');  ?>

<body>
    <?php
    require("../config/conexion.php");
    $var = $_POST["artista"];
    $query = "SELECT tabla3IHN.nombre, tabla3IHN.fecha_inicio, tabla3IHN.fecha_termino FROM(SELECT * FROM artistas, (SELECT * FROM (SELECT eventos.eid, eventos.aid FROM eventos) AS eventosIHN, (SELECT * FROM tours, eventos_del_tour WHERE tours.tid=eventos_del_tour.tid) AS tabla1IHN WHERE eventos.eid=tabla1IHN.eid) AS tabla2IHN WHERE artistas.aid=tabla2IHN.aid) AS tabla3IHN WHERE tabla3IHN.nombre_artistico='Duki' AND tabla3IHN.fecha_termino=(SELECT MAX(SELECT * FROM tabla3IHN WHERE fecha_termino <= (SELECT current_date)) AS maximo FROM tabla3IHN);";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    ?>

    <table>
        <tr>
            <th>Nombre del tour</th>
            <th>Fecha de inicio del tour</th>
            <th>Fecha de término del tour</th>
        </tr>
    <?php
    foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[13]</td><td>$p[14]</td><td>$p[15]</td> </tr>";
    }
    ?>
    </table>

    <?php include('../templatesihn/footer.html'); ?>