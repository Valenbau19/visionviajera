<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "visionviajera";
    
    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM Hotel WHERE idHotel=$id";
    $connection->query($sql);
    }

    header("location:index.php");
    exit;
?>