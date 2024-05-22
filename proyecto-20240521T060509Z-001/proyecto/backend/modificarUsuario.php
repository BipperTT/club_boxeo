<?php
session_start();


include("connexio.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar'])) {
    $email = $_POST['email'];
    $email = $conn->real_escape_string($email);
    
    $sql = "SELECT * FROM PERSONA WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $fila = $result->fetch_assoc();
    } else {
        echo "Usuario no encontrado";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modificar'])) {
    $email = $_POST['email'];
    $nuevo_email = $_POST['nuevo_email'];
    $nuevo_tipo = $_POST['nuevo_tipo'];

    $nuevo_email = $conn->real_escape_string($nuevo_email);
    $nuevo_tipo = $conn->real_escape_string($nuevo_tipo);

    $sql = "UPDATE PERSONA SET email='$nuevo_email', tipo='$nuevo_tipo' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        echo "Datos de usuario modificados con éxito";
    } else {
        echo "Error al modificar datos: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="styles/comun.css">
</head>
<body>
    <header>
        <h1>Modificar Usuario</h1>
    </header>
    <main>
        <form method="POST" action="">
            <label for="email">Buscar usuario por email:</label>
            <input type="email" name="email" required>
            <button type="submit" name="buscar">Buscar</button>
        </form>

        <?php if (isset($fila)): ?>
        <form method="POST" action="">
            <input type="hidden" name="email" value="<?php echo $fila['email']; ?>">
            <label for="nuevo_email">Nuevo Email:</label>
            <input type="email" name="nuevo_email" value="<?php echo $fila['email']; ?>" required>
            <br>
            <label for="nuevo_tipo">Nuevo Tipo de Usuario:</label>
            <select name="nuevo_tipo">
                <option value="entrenador" <?php if ($fila['tipo'] == 'entrenador') echo 'selected'; ?>>Entrenador</option>
                <option value="usuario" <?php if ($fila['tipo'] == 'usuario') echo 'selected'; ?>>Usuario</option>
            </select>
            <br>
            <button type="submit" name="modificar">Modificar Usuario</button>
        </form>
        <?php endif; ?>
    </main>
</body>
</html>
