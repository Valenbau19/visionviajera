<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Lista de Usuarios</h2>
        <a class="btn btn-success" href="create.php" role="button">Nuevo usuario</a>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>apellido</th>
                    <th>usuario</th>
                    <th>contraseña</th>
                    <th>tipo</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "visionviajera";

                    // Crear conexion
                    $connection = new mysqli($servername, $username, $password, $database);

                    // Verificar conexion
                    if ($connection->connect_error) {
                        die("Conexion fallida: " . $connection->connect_error);
                    } 

                    // Leer todas las filas de la base de datos
                    $sql = "SELECT * FROM usuario";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Consulta invalida: " . $connection->error);
                    }

                    // Leer datos de cada fila
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[idUsuario]</td>
                            <td>$row[nomUsuario]</td>
                            <td>$row[apeUsuario]</td>
                            <td>$row[username]</td>
                            <td>$row[contrasena]</td>
                            <td>$row[tipo]</td>
                            <td>$row[email]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='edit.php?id=$row[idUsuario]'>Editar</a>
                                <a class='btn btn-danger btn-sm' href='delete.php?id=$row[idUsuario]'>Eliminar</a>
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