<?php
session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'usuario') {
    header('Location: tarifa.php');
    exit();
}

$plan = $_POST['plan'];
$duracion = $_POST['duracion'];
$precio = $_POST['precio'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Tarifa</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/confirmacionPago.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>
<body>
    <header>
        <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
        <?php include("includes/nav.php"); ?>
    </header>
    <main>
        <section class="confirmation">
            <h1>Confirmar Tarifa</h1>
            <form action="../api/procesarPago.php" method="POST">
                <input type="hidden" name="plan" value="<?php echo htmlspecialchars($plan); ?>">
                <input type="hidden" name="duracion" value="<?php echo htmlspecialchars($duracion); ?>">
                <input type="hidden" name="precio" value="<?php echo htmlspecialchars($precio); ?>">
                
                <p>Plan: <?php echo htmlspecialchars($plan); ?></p>
                <p>Duración: <?php echo htmlspecialchars($duracion); ?> meses</p>
                <p>Precio: <?php echo htmlspecialchars($precio); ?>€</p>
                
                <button type="submit">Confirmar y Pagar</button>
            </form>
        </section>
    </main>
    <?php include("includes/footer.php"); ?>
</body>
</html>
