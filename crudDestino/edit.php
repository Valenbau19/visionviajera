<?php
    include('../php/conexion.php');
 


    $id = "";
    $foto = "";
    $descripcion ="";
    $municipio = "";

    $errorMessage = "";
    $successMessage = "";


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Método GET: Mostrar los datos del destino

        if (!isset($_GET["id"])) {
            header("location:crud.php");
            exit;
        }

        

        $id= $_GET["id"];
        // Leer la fila del destino seleccionado de la tabla de la base de datos
        $sql = "SELECT * FROM destino WHERE idDestino=$id";
        $result = $conexion->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location:crud.php");
            exit;
        }

        

    }
    else {
        // Método POST: Actualizar los datos del destino
        $id=$_POST["id"];
        $foto = $_POST["foto"];
        $descripcion = $_POST["descripcion"];
        $municipio= $_POST["municipio"];

        do {
            if (empty($id) || empty($foto) || empty($descripcion) || empty($municipio)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "UPDATE destino " .
                "SET idDestino = '$idDestino', foto = '$foto', descripcion = '$descripcion', municipio = '$municipio'" . 
                "WHERE idDestino = $id";

            $result = $conexion->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conexion->error;
                break;
            }

            $successMessage = "Destino actualizado correctamente";

            header("location: crud.php");
            exit;

        } while (true);
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

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">foto</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="foto" value="<?php echo $row['foto']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">descripcion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $row['descripcion']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">municipio</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="municipio" value="<?php echo $row ['municipio']; ?>">
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