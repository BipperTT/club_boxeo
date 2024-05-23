<?php
include("connexio.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    
    $query = "DELETE FROM Persona WHERE email = '$email'";
    
    if(mysqli_query($conn, $query)) {
        echo "Usuario dado de baja correctamente.";
    } else {
        echo "Error al dar de baja usuario: " . mysqli_error($conn);
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
    <link rel="stylesheet" href="../frontend/styles/comun.css">
</head>
<body>
<header>
        <div class="logo">CLUB BOX SOGACHE</div>
        <nav>
            <ul>
                <li><a href="paginaPrincipal.html">Inicio</a></li>
                <li><a href="horarios.html">Horarios</a></li>
                <li><a href="resultados.html">Resultados</a></li>
                <li><a href="entrenadores.html">Entrenadores</a></li>
                <li><a href="noticias.html">Noticias</a></li>
                <li><a href="nutricional.html">Información Nutricional</a></li>
                <li><a href="sobreNosotros.html">Sobre Nosotros</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="login.html">Iniciar Sesión</a></li>
                <li><a href="SignUp.html">Crear Cuenta</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form method="POST" action="">
            <label for="email">Email del usuario a dar de baja:</label>
            <input type="email" name="email" required>
            <button type="submit">Eliminar Usuario</button>
        </form>
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

