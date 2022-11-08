<!--Ignacio Henríquez Novoa 08-11-2022-->

<?php include('../templatesihn/header.html');   ?>

<body>
    <?php
    require("../config/conexion.php");
    $var = $_POST["artista"];
    #$query = "SELECT * FROM eventos LEFT JOIN artistas ON eventos.aid=artistas.aid;"; #cita ihn: COLOCAR!

    #-------ihn denuevo-------
    $query = "SELECT DISTINCT segundaTablaIHN.nombre FROM (SELECT * FROM productoras, (SELECT * FROM eventos, #cita: clase SQL AVANZADO online
     artistas WHERE eventos.aid = artistas.aid) as primeraTablaIHN  WHERE productoras.pid = 
     primeraTablaIHN.pid) as segundaTablaIHN WHERE nombre_artistico='$var';";   #ihn: no estoy seguro de quien va primero en el igual para hacer el join

    $result = $db -> prepare($query);
    $result -> execute(); 
    $dataCollected = $result -> fetchAll();
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

<?php include('--templatesihn/footer.html'); ?>

