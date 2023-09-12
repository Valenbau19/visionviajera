<!DOCTYPE html>
<html>
<?php
// Conectar a la base de datos (Asegúrate de usar tus propias credenciales de conexión)

include('conexion.php');
// Recibir los datos del formulario
$username = $_POST["username"];
$password = $_POST["password"];


// Buscar el usuario en la base de datos
$sql = "SELECT count(*) AS contar FROM usuario WHERE idUsuario = '$username' AND contrasena = '$password'";

$result = $conexion->query($sql);
$row = $result->fetch_assoc();
if ($row['contar'] == 1) {
    header('Location:administrador.php');
} else {
    // Los datos son inválidos, redireccionar de nuevo al formulario de inicio de sesión
    header('Location:inicio.php');
    echo "<script>
    alert('credenciales incorrectas');
    </script>";
}



$conexion->close();
?>