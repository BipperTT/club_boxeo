<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Box Sogache</title>
    <link rel="stylesheet" href="styles/contacto.css">
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>
<body>
    <header>
        <div class="logo"> <a href="index.html"><img src="img/title.png"></a></div>
        <?php
    include("includes/nav.php");
?>
    </header>
    
    <h1>FORMULARIO DE CONTACTO</h1>
    <main>
        <section class="form-section">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2991.6040342440974!2d2.1471940292695937!3d41.426113420573465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4bd2ab067e4a3%3A0xa18e3e2dfcc9aa8a!2sPlaza%20de%20la%20Clota!5e0!3m2!1ses!2ses!4v1716452595481!5m2!1ses!2ses"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="form-container">
                <form action="#" method="post">
                    <input type="text" name="nom" placeholder="Nombre">
                    <input type="email" name="email" placeholder="Correo Electrónico"> 
                    <input type="tel" name="telefono" placeholder="Teléfono">
                    <textarea name="message" placeholder="Mensaje"></textarea>
                    <button type="submit">Enviar</button>
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
