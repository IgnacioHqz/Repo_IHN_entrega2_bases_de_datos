<!--Ignacio Henríquez Novoa-->
<?php include('../templatesihn/header.html');   ?>

<body>
    <?php
    require("../config/conexion.php");

    $var = $_POST["artista"]
    $query = "SELECT COUNT(DISTINCT *) FROM entradas_cortesia WHERE aid = (SELECT artistas.aid FROM artistas WHERE nombre_artistico='$var');";
    $result = $db -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetchAll();
    ?>

    <table>
        <tr>
            <th>Número de entradas de cortesía que se ha entregado</th>
        </tr>
    <?php
    foreach ($dataCollected as $p) {
        echo "<tr> <td>$p[0]</td> </tr>";
    }
    ?>

<?php include('../templatesihn/footer.html'); ?>