<?php
session_start();

if (isset($id_usuario)) {
    $_SESSION['id_usuario'] = $id_usuario;
}

if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'usuario') {
    $contratable = true;
} else {
    $contratable = false;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLUB BOX SOGACHE - CLASES GRUPALES</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/tarifa.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>
<body>
    <header>
        <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
        <?php include("includes/nav.php"); ?>
    </header>
    <main>
        <section class="pricing">
            <div class="pricing-table">
                <h2>Clase Grupal 1</h2>
                <p>Totalmente Gratuito!!</p>
                <ul>
                    <li>Clase en grupo reducido</li>
                    <li>Duración de 1 hora</li>
                    <li>Entrenador Grupal</li>
                    <li>Lunes</li>
                    <li>9-10h</li>
                    <li>SIN PERMANENCIA</li>
                </ul>
                <?php if ($contratable): ?>
                    <form action="formularioReserva.php" method="POST">
                        <input type="hidden" name="ID_entrenador" value="1">
                        <input type="hidden" name="dia_semana" value="Lunes">
                        <input type="hidden" name="hora_inicio" value="9:00:00">
                        <input type="hidden" name="hora_final" value="11:00:00">
                        <button type="submit">CONTRATAR</button>
                    </form>
                <?php else: ?>
                    <p>Esta tarifa solo está disponible para usuarios.</p>
                <?php endif; ?>
            </div>
            <!-- Clase Grupal 2 -->
            <div class="pricing-table">
                <h2>Clase Grupal 2</h2>
                <p>Totalmente Gratuito!!</p>
                <ul>
                    <li>Clase en grupo reducido</li>
                    <li>Duración de 1 hora</li>
                    <li>Entrenador Grupal</li>
                    <li>Miercoles</li>
                    <li>11-12h</li>
                    <li>SIN PERMANENCIA</li>
                </ul>
                <?php if ($contratable): ?>
                    <form action="formularioReserva.php" method="POST">
                        <input type="hidden" name="ID_entrenador" value="2">
                        <input type="hidden" name="dia_semana" value="Miércoles">
                        <input type="hidden" name="hora_inicio" value="11:00:00">
                        <input type="hidden" name="hora_final" value="12:00:00">
                        <button type="submit">CONTRATAR</button>
                    </form>
                <?php else: ?>
                    <p>Esta tarifa solo está disponible para usuarios.</p>
                <?php endif; ?>
            </div>
            <!-- Clase Grupal 3 -->
            <div class="pricing-table">
                <h2>Clase Grupal 3</h2>
                <p>Totalmente Gratuito!!</p>
                <ul>
                    <li>Clase en grupo reducido</li>
                    <li>Duración de 1 hora</li>
                    <li>Entrenador Grupal</li>
                    <li>Viernes</li>
                    <li>16-17h<li>
                    <li>SIN PERMANENCIA</li>
                </ul>
                <?php if ($contratable): ?>
                    <form action="formularioReserva.php" method="POST">
                        <input type="hidden" name="ID_entrenador" value="3">
                        <input type="hidden" name="dia_semana" value="Viernes">
                        <input type="hidden" name="hora_inicio" value="16:00:00">
                        <input type="hidden" name="hora_final" value="17:00:00">
                        <button type="submit">CONTRATAR</button>
                    </form>
                <?php else: ?>
                    <p>Esta tarifa solo está disponible para usuarios.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <?php include("includes/footer.php"); ?>
    <script src="js/scripts.js"></script>
</body>
</html>
