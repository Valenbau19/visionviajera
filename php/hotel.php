<!DOCTYPE html>
<html lang="en">
<?php
include('conexion.php');
$sql = "SELECT * FROM `destino`";
$result = $conexion->query($sql);
?>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Hotel</title>
</head>
<style>
    body {
        background-color: #F8F0E5;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        text-align: center;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
</style>
</head>

<body>
    <h1 class="text-dark">Selecciona un Municipio </h1>

    <form method="POST" action="listahoteles.php">
        <center>
            <select name="hotel2" class="form-select" id="hotel2" style="width: 50%;">
                <?php while ($row = $result->fetch_assoc()) {
                    $municipio = $row['municipio'];
                    $idDestino = $row['idDestino'];
                    echo "<option value=\"$idDestino\">$municipio</option>";
                } ?>
            </select>
        </center> <br>
        <input type="submit" class="btn btn-sm" style="background-color: #0F2C59;color:white" value="Seleccionar">
    </form>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</body>