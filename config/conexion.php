#Ignacio Henriquez Novoa 07-11-2022

<?php
    try {
        requiere('data.php');
        $db = new PDO("psgql:dbname=$databaseName;host=localhost;port=5432;$user;password=$password");
    } catch (Exception $e) {
        echo "No se pudo conectar a la base de datos: $e";
    }
?>