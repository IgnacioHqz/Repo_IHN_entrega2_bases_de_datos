#Ignacio Henriquez Novoa 07-11-2022 cita: video ayudantia semestres pasado
<?php include('../templatesihn/header.html');   ?>

<body>
<?php   
    require("../config/conexion.php");
    $query = "SELECT nombre, n_contacto FROM productoras;";
    $result = $db -> prepare($query);
    $result -> execute();
    $productoras = $result -> fetchAll();

    #print_r($productora);


?>
<table>
    <tr>
        <th>Nombre Productora</th>
        <th>Número de teléfono</th>
    </tr>

    <?php
    foreach($productoras as $productora){
        echo "<tr><td>$productora[0]</td><td>$productora[1]</td></tr>";
    }
    ?>
</table>

<?php include("../templatesihn/footer.html"); ?>
