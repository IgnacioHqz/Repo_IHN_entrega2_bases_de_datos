<!--Ignacio Henríquez Novoa 08-11-2022-->

<?php include('../templatesihn/header.html');   ?>

<body>
    <?php
    require("../config/conexion.php");
    $var = $_POST["artista"];
    #$query = "SELECT * FROM eventos LEFT JOIN artistas ON eventos.aid=artistas.aid;"; #cita ihn: COLOCAR!

    #-------ihn denuevo-------
    #$query = "SELECT DISTINCT segundaTablaIHN.nombre FROM (SELECT * FROM productoras JOIN 
    #(SELECT * FROM eventos JOIN artistas ON eventos.aid = artistas.aid) AS primeraTablaIHN  ON 
    #productoras.pid = primeraTablaIHN.pid) AS segundaTablaIHN WHERE segundaTablaIHN.nombre_artistico='$var';"; #WHERE segundaTablaIHN.nombre_artistico='$var';";   #ihn: no estoy seguro de quien va primero en el igual para hacer el join, CITA IHN: clase SQL avanzado online
    #cita ihn: clase SQL Avanzado, diapositiva INNER JOINS.

    #ihn 09-11-2022
    $query = "SELECT DISTINCT tabla2IHN.nombre FROM (SELECT * FROM productoras, (SELECT artistas.aid, artistas.nombre_artistico, eventos.aid, eventos.pid FROM artistas, eventos WHERE artistas.aid=eventos.aid) AS tabla1IHN WHERE productoras.pid=tabla1IHN.pid) AS tabla2IHN WHERE tabla2IHN.nombre_artistico='$var';";

    $result = $db -> prepare($query);
    $result -> execute(); 
    $dataCollected = $result -> fetchAll();
    print_r($dataCollected);
    ?>
    
    <table>
        <tr>
            <th>Nombre de la productora</th>
        </tr>
    <?php
    foreach($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> </tr>";
    }
    ?>
    </table>

<?php include('../templatesihn/footer.html'); ?>

