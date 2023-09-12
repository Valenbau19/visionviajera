<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "visionviajera";

        // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM Transporte WHERE idTransporte=$id";
    $connection->query($sql);
    }

    header("location:index.php");
    exit;
?>