#Ignacio Henríquez Novoa 07-11-2022
<?php include('../templatesihn/header.html');   ?>
<body>
    <?php
        require("../config/conexion.php");
        $var = $_POST("nombre_artistico");
        $query_para_obtener_aid = "SELECT aid FROM Artistas WHERE nombre_artistico = '$var';"; 
        $result = $db -> prepare($query)
        $dataCollected = $result -> fetchAll();
        $aid_de_artista = $dataCollected[0]
         
        $query_para_obtener_cantidad = "SELECT COUNT(aid) FROM entradas_cortesia WHERE aid='$aid_de_artista';";
        $resultado = $db -> prepare($query_para_obtener_cantidad);
        $result -> execute();
        $dataCollected = $result -> fetchAll();
    ?>
    <table>
        <tr>
            <th>Cantidad de entradas de cortesía: </th>
        </tr>
    <?php 
    echo "<tr><td>$dataCollected[0]</td></tr>";

    ?>
    </table>

<?php include('../templatesihn/footer.html'); ?>

