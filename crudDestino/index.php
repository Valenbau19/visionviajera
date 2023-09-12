<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destino</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Lista de Destino</h2>
        <a class="btn btn-success" href="formcreate.php" role="button">Nuevo Destino</a>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Foto</th>
                    <th>Municipio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "visionviajera";

                    // Crear conexion
                    $conexion = new mysqli($servername, $username, $password, $database);

                    // Verificar conexion
                    if ($conexion->connect_error) {
                        die("Conexion fallida: " . $conexion->connect_error);
                    } 

                    // Leer todas las filas de la base de datos
                    $sql = "SELECT * FROM destino";
                    $result = $conexion->query($sql);

                    if (!$result) {
                        die("Consulta invalida: " . $conexion->error);
                    }

                    // Leer datos de cada fila
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[idDestino]</td>
                            <td>$row[descripcion]</td>
                            <td>$row[foto]</td>
                            <td>$row[municipio]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='edit.php?id=$row[idDestino]'>Editar</a>
                                <a class='btn btn-danger btn-sm' href='delete.php?id=$row[idDestino]'>Eliminar</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>