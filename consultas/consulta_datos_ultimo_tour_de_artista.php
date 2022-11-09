<!--Ignacio Henríquez Novoa--> 
<?php include ('../templatesihn/header.html');  ?>

<body>
    <?php
    require("../config/conexion.php");
    $var = $_POST["artista"];
    $query = "SELECT tablaIHN3.nombre, tablaIHN3.fecha_inicio, tablaIHN3.fecha_termino FROM 
    (SELECT * FROM artistas, (SELECT * FROM eventos, (SELECT * FROM eventos_del_tour, tours WHERE 
    tours.tid = eventos_del_tour.tid) AS tablaIHN1 WHERE eventos.eid = tablaIHN1.eid) AS tablaIHN2 
    WHERE artistas.aid=tablaIHN2.aid) AS tablaIHN3;";
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
        echo "<tr> <td>$p[13]</td><td>$p[14]</td><td>$p[15]</td> </tr>"
    }
    ?>
    </table>

    <?php include('../templatesihn/footer.html'); ?>