<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Box Sogache - Crear Cuenta</title>
    <link rel="stylesheet" href="styles/registro.css">
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>
<body>
    <header>
        <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
        <?php
    include("includes/nav.php");
?>
    </header>
    
    <main>
        <section class="register-section">
            <div class="register-box">
                <h2>Club Boxa Sogache</h2>
                <form action="../api/signUp.proc.php" method="POST">
                    <div class="name-fields">
                        <input type="text" name="first_name" placeholder="Nombre">
                        <input type="text" name="last_name" placeholder="Apellido">
                    </div>
                    <input type="email" name="email" placeholder="Correo Electrónico">
                    <input type="tel" name="phone" placeholder="Teléfono">
                    <input type="password" name="password" placeholder="Contraseña">
                    <input type="password" name="confirm_password" placeholder="Confirmar Contraseña">
                    <div class="login-link">
                        <a href="iniciarSesion.php">¿Tienes cuenta? Inicia sesión</a>
                    </div>
                    <button type="submit">Crear Cuenta</button>
                </form>
                
            </div>
        </section>
    </main>
    <?php
    include("includes/footer.php");
?>
   
    <script src="js/scripts.js"></script>
</body>
</html>

