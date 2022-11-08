<!--Ignacio Henríquez Novoa 08-11-2022-->

<?php include('../templatesihn/header.html');   ?>

<body>
    <?php
    require("../config/conexion.php");
    $var = $_POST["artista"];
    $query = "SELECT * FROM eventos LEFT JOIN artistas ON eventos.aid=artistas.aid;"; #cita ihn: COLOCAR!

    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    print_r($dataCollected)

#    $query_productoras_que_trabajo_artista = "SELECT DISTINCT pid FROM $dataCollected WHERE $.nombre_artistico='$var';";
#    $result = $db -> prepare($query_productoras_que_trabajo_artista);
#    $result -> execute();
    

#    $query_join_entre_obtenido_y_tabla_productora = "SELECT * FROM $result LEFT JOIN productoras ON $result.pid=productoras.pid;";
#    $result = $db -> prepare($query_join_entre_obtenido_y_tabla_productora);
#    $result -> execute();
    

#    $query_para_obtener_productoras = "SELECT DISTINCT nombre FROM $result;";
#    $result = $db -> prepare($query_para_obtener_productoras);
#    $result -> execute();
#    $dataCollected = $result -> fetchAll();
    ?>

    <table>
        <tr>
            <th>Nombre productora</th>
        </tr>
    <?php 
    foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td></tr>";
    }
    ?>
    </table>

<?php include('--templatesihn/footer.html'); ?>

