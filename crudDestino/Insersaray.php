<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saray</title>
</head>
<body>
      <form name="saray" action="crudsaray.php" method="post" enctype="multipart/form-data">
           Identificación <input type="text" name="id"><br>
           Descripción: <input type="text" name="descri"><br>
           Foto: <input type="file" name="foto"><br>
           Municipio: <input type="text" name="muni"><br>
            <input type="submit" name="enviar">


      </form>
</body>
</html>