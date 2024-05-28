<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Box Sogache</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/noticia.css">
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
        <section class="noticias">
            <h1>Información nutricional</h1>
            <article class="noticia">
                <h1>¿Qué comer antes del entreno?</h1>
                <img src="img/preentreno.jpg">
                <p>Junto a la rutina habitual en la dieta se pueden incluir algunas modificaciones. Así, antes de ir a entrenar lo mejor es tomar carbohidratos que insuflen de energía al organismo, acompañados de frutas, verduras o cereales, para mejorar el nivel de hidratación. Este punto es importante, para no perder exceso de líquido en el entreno.</p>
            </article>
            <article class="noticia">
                <h1>¿Cómo recuperar fuerzas tras el entrenamiento?</h1>
                <img src="img/postentreno.jpg">
                <p>Después de entrenar lo mejor es que pase un tiempo antes de volver a comer algo, incluso líquido, especialmente si se está en un proceso de pérdida de peso. Pasado este tiempo, hay que rehidratar el organismo y tomar alimentos ricos en proteínas: carnes, huevo, pescado, leche…, todo acompañado de verduras, que refuercen las fibras musculares.</p>
            </article>
            <article class="noticia">
                <h1>¿Cuándo debe comer un boxeador?</h1>
                <img src="img/cuatrocomidas.png">
                <p>La rutina alimenticia de un boxeador incluye al menos cuatro comidas: desayuno, almuerzo, comida y cena.</p>
            </article>
        </section>
    </main>
    <?php
    include("includes/footer.php");
?>
    
    <script src="js/scripts.js"></script>
</body>
</html>
