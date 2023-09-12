<?php
    
    include('../php/conexion.php');

    $id = "";
    $nomTransporte = "";
    $valor="";
    $idDestino = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Método GET: Mostrar los datos del transporte

        if (!isset($_GET["id"])) {
            header("location: index.php");
            exit;
        }

        $id = $_GET["id"];

        // Leer la fila del transporte seleccionado de la tabla de la base de datos
        $sql = "SELECT * FROM transporte WHERE idTransporte=$id";
        $result = $conexion->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: index.php");
            exit;
        }

        

    }
    else {
        // Método POST: Actualizar los datos del transporte
        $id=$_POST["id"];
        $nomTransporte= $_POST["nombre"];
        $valor = $_POST["valor"];
        $idDestino = $_POST["idDestino"];

        do {
            if (empty($id) || empty($nomTransporte) || empty($valor) || empty($idDestino)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "UPDATE transporte " .
                "SET idTransporte = '$id', nomTransporte= '$nomTransporte', valor = '$valor', idDestino = '$idDestino'" . 
                "WHERE idTransporte = $id";

            $result = $conexion->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conexion->error;
                break;
            }

            $successMessage = "Hotel actualizado correctamente";

            header("location: index.php");
            exit;

        } while (true);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My crud transporte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nuevo Transporte</h2>

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
            <input type="hidden" name="id" value="<?php echo $row['idTransporte']; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $row['nomTransporte'];?>">
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