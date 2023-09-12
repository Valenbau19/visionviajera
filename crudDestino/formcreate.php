<?php
    
    include('../php/conexion.php');  

    $id = "";
    $foto = "";
    $descripcion = "";
    $municipio = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST["id"];
        $foto= $_POST["foto"];
        $descripcion = $_POST["descripcion"];
        $municipio = $_POST["municipio"];

        do {
            if (empty($id) || empty($foto) || empty($descripcion) || empty($municipio)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            // Agregar un nuevo destino a la base de datos
            $sql = "INSERT INTO destino (idDestino, descripcion, foto, municipio) " . 
                   "VALUES ('$id', '$foto','$descripcion', '$municipio')";
            $result = $conexion->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conexion->error;
                break;
            }

            $id = "";
            $foto = "";
            $descripcion= "";
            $municipio = "";

            $successMessage = "Destino agregado correctamente";

           //| header("location: index.php");
            exit;

        } while (false);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My crud Destino</title>
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

        <form method="post" action="create.php" enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">foto</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="foto" value="<?php echo $foto; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">descripcion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion; ?>">
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
                    <button type="submit" class="btn btn-primary" name="enviarBD">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>