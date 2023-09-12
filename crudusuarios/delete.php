<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "visionviajera";
    
    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM usuario WHERE idUsuario=$id";
    $connection->query($sql);
    }

    header("location:index.php");
    exit;
?>