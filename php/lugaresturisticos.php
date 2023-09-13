<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Lugares Turisticos</title>

</head>

<body style="background-color: #F8F0E5;">
    <?php
    include('conexion.php');
    $sql = "SELECT * FROM `destino`";
    $result = $conexion->query($sql);

    ?>
    <div id="carouselExampleDark" class="carousel  slide" data-bs-ride="carousel" height="700px">
        <div class="carousel-inner" height="700px">
            <?php while ($row = $result->fetch_assoc()) {
                $municipio = $row['municipio'];
                $descripcion = $row['descripcion'];
                $foto = $row['foto']; ?>

                <div class="carousel-item  active" data-bs-interval="3000" height="700px">
                    <img src="../imagenes/<?= $foto ?>" class="d-block w-100" alt="..." height="700px">
                    <div class="carousel-caption d-none d-md-block">
                        <strong>
                            <h5 style="color:white"> <?= $municipio ?></h5>
                        </strong>
                        <strong>
                            <p style="color:white"><?= $descripcion ?></p>
                        </strong>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>