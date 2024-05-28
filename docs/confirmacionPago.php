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
    <?php
    include("includes/footer.php");
?>
</body>
</html>
