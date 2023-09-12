
<?php
// Conectar a la base de datos (Asegúrate de usar tus propias credenciales de conexión)

include('conexion.php');


// Recibir los datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") 
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE idUsuario = '$username " and password = '$password'";
    $resu = $conn->prepare($sql);
    $resu->bind_param("", $username);
    $resu->execute();
    $result = $resu->get_result();

    if ($result->num_rows === 1) {
        // Usuario encontrado, verificar la contraseña
        $row = $result->fetch_assoc();
        $password_hash = $row["password_hash"];
        if (password_verify($password, $password_hash)) {
            // Contraseña válida, inicia sesión
            session_start();
            $_SESSION["user_id"] = $row["id"];
            header("Location: administrador.php");
            exit();
        }
    }

    // Los datos son inválidos, redireccionar de nuevo al formulario de inicio de sesión
    header("Location: index.html");
    exit();
}

$conn->close();
?>
