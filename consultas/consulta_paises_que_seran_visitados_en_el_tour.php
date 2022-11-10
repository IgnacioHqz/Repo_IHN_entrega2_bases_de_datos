<!--Ignacio Henríquez Novoa 09-11-2022-->
<?php include('../templatesihn/header.html');   ?>

<body>
    <?php
    require("../config/conexion.php");
    $var = $_POST["tour_escogido_ihn'"];
    #print_r($var);
    $query = "SELECT DISTINCT tabla2IHN.nombre, tabla2IHN.pais FROM (SELECT * FROM eventos, (SELECT tours.tid, 
    tours.nombre, eventos_del_tour.tid, eventos_del_tour.eid FROM tours, eventos_del_tour WHERE 
    tours.tid=eventos_del_tour.tid) AS tabla1IHN WHERE eventos.eid=tabla1IHN.eid) AS 
    tabla2IHN WHERE tabla2IHN.nombre='$var';";
    $result =$db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    #print_r($dataCollected);
    ?>

    <table>
        <tr>
            <th>Nombre tour</th>
            <th>Países visitados</th>
        </tr>
    <?php
    foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> <td>$p[1]</td> </tr>";
    }
    ?>
    </table>
<?php include('../templatesihn/footer.html'); ?>