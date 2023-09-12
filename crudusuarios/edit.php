<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "visionviajera";
 
    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $id = "";
    $name = "";
    $apellido="";
    $contraseña = "";
    $username = "";
    $tipo = "";
    $email = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Método GET: Mostrar los datos del usuario

        if (!isset($_GET["id"])) {
            header("location: /visionviajera/mycrud/index.php");
            exit;
        }

        $id = $_GET["id"];

        // Leer la fila del cliente seleccionado de la tabla de la base de datos
        $sql = "SELECT * FROM usuario WHERE idUsuario=$id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: /visionviajera/mycrud/index.php");
            exit;
        }

        

    }
    else {
        // Método POST: Actualizar los datos del usuario
        $id=$_POST["id"];
        $name = $_POST["name"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $tipo = $_POST["tipo"];
        $username =$_POST["usuario"];
        $contraseña =$_POST["password"];

        do {
            if (empty($id) || empty($name) || empty($apellido) || empty($email) || empty($tipo) || empty($username )|| empty($contraseña)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "UPDATE usuario " .
                "SET nomUsuario = '$name', apeUsuario = '$apellido', email = '$email', tipo = '$tipo', contrasena = '$contraseña', 
                username = '$username'" . "WHERE idUsuario = $id";

            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $connection->error;
                break;
            }

            $successMessage = "Usuario actualizado correctamente";

            header("location: /visionviajera/mycrud/index.php");
            exit;

        } while (true);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nuevo Usuario</h2>

        <?php
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Apellido</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="apellido" value="<?php echo $apellido; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Usuario</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="usuario" value="<?php echo $username; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tipo</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tipo" value="<?php echo $tipo; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" value="<?php echo $contraseña; ?>">
                </div>
            </div>


            <?php
                if (!empty($successMessage)) {
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success añert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/visionviajera/mycrud/index.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>