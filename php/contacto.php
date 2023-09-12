<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">

    <style>
        body {
            background-color: #F8F0E5;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            text-align: center;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    <center>
        <div class="card" style="width: 40%;">
            <div class="card-body" style="background-image: url('../imagenes/contacto.jpg');">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="contact-form">
                            <h2 class="mb-4">Contacto</h2>
                            <form method="post" action="correo.php">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="nombre" name="apellido" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="mensaje" class="form-label">Mensaje</label>
                                    <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-custom" onclick="mensaje()">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>
<script>
    function mensaje() {
        alert('hola mundo');
    }
</script>

</html>