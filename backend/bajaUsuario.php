<?php
include("connexio.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $email = $conn->real_escape_string($email);

    $query = "DELETE FROM Persona WHERE email = '$email'";

    if (mysqli_query($conn, $query)) {
        $mensaje = "Usuario eliminado correctamente. ¡Hasta pronto!";
    } else {
        $mensaje = "Error al eliminar usuario: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar de Baja Usuario</title>
    <link rel="stylesheet" href="../docs/styles/comun.css">
</head>
<body>
<header>
    <div class="logo">CLUB BOX SOGACHE</div>
    <nav>
        <ul>
            <li><a href="../docs/index.html">Inicio</a></li>
            <li><a href="../docs/horarios.html">Horarios</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Precios</a>
                <div class="dropdown-content">
                    <a href="../docs/tarifa.html">Tarifas</a>
                    <a href="../docs/entrenoPrivado.html">Entreno Privado</a>
                </div>
            </li>
            <li><a href="../docs/entrenadores.html">Entrenadores</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Blog</a>
                <div class="dropdown-content">
                    <a href="../docs/nutricional.html">Información Nutricional</a>
                    <a href="../docs/noticias.html">Noticias</a>
                </div>
            </li>
            <li><a href="../docs/sobreNosotros.html">Sobre Nosotros</a></li>
            <li><a href="../docs/contacto.html">Contacto</a></li>
            <li><a href="../docs/iniciarSesion.html">Iniciar Sesión</a></li>
            <li><a href="../docs/registro.html">Crear Cuenta</a></li>
        </ul>
    </nav>
</header>
<main>
    <p><?php echo isset($mensaje) ? $mensaje : ''; ?></p>
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