<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body style="background-color: #F8F0E5;">
    <div class="contenido" style="margin: 30px;">
        <center>
            <h2>Lista de Hoteles</h2>
            <br>
            <br>           
            <div class="card" style="width: 80%;">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Destino</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('conexion.php');
                            // Obtener el municipio seleccionado
                            $hotel = $_POST['hotel2'];
                            // Leer todas las filas de la base de datos
                            $sql = "SELECT * FROM hotel WHERE idDestino = '$hotel'";
                            $result = $conexion->query($sql);

                            if (!$result) {
                                die("Consulta invalida: " . $conexion->error);
                            }
                            // Leer datos de cada fila
                            while ($row = $result->fetch_assoc()) {
                                echo "
                        <tr>
                            <td>$row[idHotel]</td>
                            <td>$row[nomHotel]</td>
                            <td>$row[valor]</td>
                            <td>$row[idDestino]</td>
                           
                        </tr>
                        ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </center>

    </div>
</body>

</html>