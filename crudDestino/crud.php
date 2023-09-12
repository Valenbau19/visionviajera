<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destino</title>
    <!-- Agrega enlaces a los archivos de Bootstrap CSS y JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2> Destino</h2>
    <form method="POST" action="insertar.php" enctype="multipart/form-data">
        <div class="form-group">
             <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" class="form-control-file" id="foto" name="foto" accept=".png, .jpeg, .jpg, .webp" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="municipio">Municipio:</label>
            <input type="text" class="form-control" id="municipio" name="municipio" required>
        </div>
        <a href="insertar.php" type="submit" name="enviarBD" id='enviarDB' class="btn btn-primary" role="button">Subir</a>
    </form>
</div>

<!-- Agrega el enlace al archivo de Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min>
</body>
</html>

