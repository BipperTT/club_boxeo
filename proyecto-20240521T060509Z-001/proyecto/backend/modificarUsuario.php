<?php
session_start();
include("connexio.php");

$email = '';
$fila = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];
    $email = $conn->real_escape_string($email);

    $sql = "SELECT * FROM Persona WHERE email='$email'";
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

    $sql = "UPDATE Persona SET email='$nuevo_email', tipo='$nuevo_tipo' WHERE email='$email'";

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
    <link rel="stylesheet" href="../frontend/styles/comun.css">
</head>
<body>
<header>
    <div class="logo">CLUB BOX SOGACHE</div>
    <nav>
        <ul>
            <li><a href="../frontend/index.html">Inicio</a></li>
            <li><a href="../frontend/horarios.html">Horarios</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Precios</a>
                <div class="dropdown-content">
                    <a href="../frontend/tarifa.html">Tarifas</a>
                    <a href="../frontend/entrenoPrivado.html">Entreno Privado</a>
                </div>
            </li>
            <li><a href="../frontend/entrenadores.html">Entrenadores</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Blog</a>
                <div class="dropdown-content">
                    <a href="../frontend/nutricional.html">Información Nutricional</a>
                    <a href="../frontend/noticias.html">Noticias</a>
                </div>
            </li>
            <li><a href="../frontend/sobreNosotros.html">Sobre Nosotros</a></li>
            <li><a href="../frontend/contacto.html">Contacto</a></li>
            <li><a href="../frontend/iniciarSesion.html">Iniciar Sesión</a></li>
            <li><a href="../frontend/registro.html">Crear Cuenta</a></li>
        </ul>
    </nav>
</header>
<main>
    <?php if ($fila): ?>
        <form method="POST" action="">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($fila['email']); ?>">
            <label for="nuevo_email">Nuevo Email:</label>
            <input type="email" name="nuevo_email" value="<?php echo htmlspecialchars($fila['email']); ?>" required>
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
<footer>
    <div class="footer-content">
        <div class="footer-left">
            <img src="img/ico_nbg.png" alt="Logo">
            <p>C/ de Joaquín Costa, 22, Ciutat Vella, 08001 Barcelona</p>
        </div>
        <div class="footer-center">
            <p>&copy; 2024 Sogache S.L. Todos los derechos reservados.</p>
            <p>This website and its content are the property of Sogache S.L. Reproduction in whole or in part, copying, distribution, and any unauthorized use of this content is prohibited without the express written permission of Nombre de la Empresa.</p>
            <p><a href="politica-de-privacidad.html">Política de Privacidad</a> | <a href="terminos-y-condiciones.html">Términos y Condiciones</a></p>
            <p><a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-and-conditions.html">Terms and Conditions</a></p>
        </div>
        <div class="footer-right">
            <div class="social-icons">
                <img src="img/instagram.png" alt="Instagram" class="social-icon">
                <img src="img/facebook.png" alt="Facebook" class="social-icon">
                <img src="img/twitter.png" alt="Twitter" class="social-icon">
            </div>
        </div>
    </div>
</footer>
</body>
</html>
