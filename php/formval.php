<!doctype html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<body>
    <div class="container mt5">
        <center>
            <div class="card" style="width: 50%;">
                <div class="card-body" style="background-image: url('../imagenes/administrador.jpg');">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="contact-form">
                                <h1 class="mb-4">ADMINISTRADOR</h1>
                                <div class="" style="width: 50%;">
                                    <form method="POST" action="valida.php" class="text-center">
                                        <div class="mb-3">
                                            <label for="Administrador" class="form-label">Administrador</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                aria-describedby="usernameHelp" required>
                                            <div id="usernameHelp" class="form-text"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="contraseña" class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </form>
        </center>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>