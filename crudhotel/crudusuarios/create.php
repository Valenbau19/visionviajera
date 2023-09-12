<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "visionviajera";

    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $id = "";
    $name = "";
    $usuario = "";
    $email = "";
    $tipo = "";
    $apellido = "";
    $contrasena= "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $tipo = $_POST["tipo"];
        $apellido = $_POST["apellido"];
        $contrasena = $_POST["contrasena"];

        do {
            if (empty($id) || empty($name) || empty($usuario) || empty($email) || empty($tipo) || empty($apellido) || empty($contrasena)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            // Agregar un nuevo usuario a la base de datos
            $sql = "INSERT INTO usuario (idUsuario, nomUsuario, apeUsuario, username, contrasena, tipo, email) " . 
                   "VALUES ('$id', '$name','$apellido', '$usuario',  '$contrasena', '$tipo', '$email')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $connection->error;
                break;
            }

            $id = "";
            $name = "";
            $usuario = "";
            $email = "";
            $tipo = "";
            $apellido = "";
            $contrasena = "";

            $successMessage = "Usuario agregado correctamente";

            header("location: index.php");
            exit;

        } while (false);
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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">usuario</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="usuario" value="<?php echo $usuario; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">apellido</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="apellido" value="<?php echo $apellido; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">tipo</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tipo" value="<?php echo $tipo; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">contraseña</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="contrasena" value="<?php echo $contrasena; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
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
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>