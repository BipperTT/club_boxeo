<?php
session_start();


include("connexio.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $email = $conn->real_escape_string($email);

    $sql = "DELETE FROM PERSONA WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario eliminado con éxito";
    } else {
        echo "Error al eliminar usuario: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar de Baja Usuario</title>
    <link rel="stylesheet" href="styles/comun.css">
</head>
<body>
    <header>
        <h1>Dar de Baja Usuario</h1>
    </header>
    <main>
        <form method="POST" action="">
            <label for="email">Email del usuario a dar de baja:</label>
            <input type="email" name="email" required>
            <button type="submit">Eliminar Usuario</button>
        </form>
    </main>
</body>
</html>
