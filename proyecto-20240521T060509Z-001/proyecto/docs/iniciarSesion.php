<?php
session_start();
$is_logged_in = isset($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Box Sogache - Iniciar Sesión</title>
    <link rel="stylesheet" href="styles/iniciarSesion.css">
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>
<body>
    <header>
        <div class="logo"> <a href="index.html"><img src="img/title.png" alt="Logo"></a></div>
        <nav>
            <button class="menu-toggle" aria-label="Toggle Menu">
                &#9776;
            </button>
            <ul class="nav-links" id="nav-links">
                <li><a href="index.html">Inicio</a></li>
                <li><a href="horarios.html">Horarios</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Precios</a>
                    <div class="dropdown-content">
                        <a href="tarifa.html">Tarifas</a>
                        <a href="entrenoPrivado.html">Entreno Privado</a>
                    </div>
                </li>
                <li><a href="entrenadores.html">Entrenadores</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Blog</a>
                    <div class="dropdown-content">
                        <a href="nutricional.html">Información Nutricional</a>
                        <a href="noticias.html">Noticias</a>
                    </div>
                </li>
                <li><a href="sobreNosotros.html">Sobre Nosotros</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li id="login-link"><a href="iniciarSesion.html">Iniciar Sesión</a></li>
                <li id="register-link"><a href="registro.html">Crear Cuenta</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="login-section">
            <div class="login-box">
                <h2>Club Boxa Sogache</h2>
                <form action="../backend/login.proc.php" method="POST">
                    <input type="text" id="email" name="email" placeholder="mail" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <div class="register-link">
                        <a href="registro.html">No tienes cuenta? Regístrate</a>
                    </div>
                    <button type="submit">Iniciar Sesión</button>
                </form>
            </div>
        </section>
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
    <script>
        const isLoggedIn = <?php echo json_encode($is_logged_in); ?>;
        if (isLoggedIn) {
            document.getElementById('login-link').innerHTML = '<a href="logout.php">Cerrar Sesión</a>';
            document.getElementById('register-link').style.display = 'none';
        }
    </script>
    <script src="js/scripts.js"></script>
</body>
</html>
