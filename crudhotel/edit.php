<?php
    include('../php/conexion.php');
 

    $id = "";
    $nomHotel = "";
    $valor="";
    $idDestino = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Método GET: Mostrar los datos del hotel

        if (!isset($_GET["id"])) {
            header("location: index.php");
            exit;
        }

        $id = $_GET["id"];

        // Leer la fila del hotel seleccionado de la tabla de la base de datos
        $sql = "SELECT * FROM hotel WHERE idHotel=$id";
        $result = $conexion->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: index.php");
            exit;
        }

        

    }
    else {
        // Método POST: Actualizar los datos del hotel
        $id=$_POST["id"];
        $nomHotel = $_POST["nombre"];
        $valor = $_POST["valor"];
        $idDestino = $_POST["idDestino"];

        do {
            if (empty($id) || empty($nomHotel) || empty($valor) || empty($idDestino)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "UPDATE hotel " .
                "SET idHotel = '$id', nomHotel = '$nomHotel', valor = '$valor', idDestino = '$idDestino'" . 
                "WHERE idHotel = $id";

            $result = $conexion->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conexion->error;
                break;
            }

            $successMessage = "Hotel actualizado correctamente";

            header("location:index.php");
            exit;

        } while (true);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My crud hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nuevo Hotel</h2>

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
                    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nomHotel']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">valor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="valor" value="<?php echo $row['valor']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">idDestino</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="idDestino" value="<?php echo $row['idDestino']; ?>">
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