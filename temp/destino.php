<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "visionviajera";

    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $id = "";
    $name = "";
    $descripcion = "";
    $video = "";
    $foto= "";
    $municipio= "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $descripcion = $_POST["descripcion"];
        $video = $_POST["video"];
        $foto = $_POST["foto"];
        $municipio = $_POST["municipio"];

        do {
            if (empty($id) || empty($name) || empty($descripcion) || empty($video) || empty($foto) || empty($municipio)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            // Agregar un nuevo destino a la base de datos
            $sql = "INSERT INTO destino (idDestino, nombre, descripcion, video, foto, municipio)" .
                   "VALUES ('$id', '$name' , '$descripcion' , '$video' , '$foto' , '$municipio') ";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $connection->error;
                break;
            }

            $id = "";
            $name = "";
            $descripcion = "";
            $video = "";
            $foto = "";
            $municipio = "";

            $successMessage = "Destino agregado correctamente";

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
    <title>Crud destino</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nuevo Destino</h2>

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
                <label class="col-sm-3 col-form-label">descripcion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">video</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="video" value="<?php echo $video; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">foto</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="foto" value="<?php echo $foto; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">municipio</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="municipio" value="<?php echo $municipio; ?>">
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