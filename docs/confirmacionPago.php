<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Confirmado</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/confirmacionPago.css">
</head>
<body>
    <header>
        <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
        <?php
    include("includes/nav.php");
?>
    </header>
    <main>
        <section class="confirmation">
            <h1>¡Gracias por tu pago!</h1>
            <p>Muchas gracias por tu pago, en breve el administrador determinará si se ha realizado correctamente y se pondra en contacto con usted, muchas gracias.</p>
            <button onclick="location.href='index.php'">Volver al Inicio</button>
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
    <?php
    include("includes/footer.php");
?>
</body>
</html>
