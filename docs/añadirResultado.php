<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Alta de Resultado</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/altaResultado.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>

<header>
    <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
    <?php include("includes/nav.php"); ?>
</header>

<body>
    <main>
        <form id="resultado-form">
            <h2>Alta de Resultado</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required><br>

            <label for="combates_realizados">Combates Realizados:</label>
            <input type="number" id="combates_realizados" name="combates_realizados" required><br>

            <label for="combates_ganados">Combates Ganados:</label>
            <input type="number" id="combates_ganados" name="combates_ganados" required><br>

            <label for="fecha_combate">Fecha Combate:</label>
            <input type="date" id="fecha_combate" name="fecha_combate" required><br>

            <button type="submit">Crear Resultado</button>
        </form>
    </main>

    <script>
        const form = document.getElementById('resultado-form');
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const nombre = document.getElementById('nombre').value;
            const apellidos = document.getElementById('apellidos').value;
            const combates_realizados = document.getElementById('combates_realizados').value;
            const combates_ganados = document.getElementById('combates_ganados').value;
            const fecha_combate = document.getElementById('fecha_combate').value;

            const data = {
                Nombre: nombre,
                Apellidos: apellidos,
                Combates_Realizados: combates_realizados,
                Combates_Ganados: combates_ganados,
                Fecha_Combate: fecha_combate
            };

            fetch('../api/verResultadosTorneo.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        form.reset();
                        alert('Resultado creado exitosamente');
                    } else {
                        alert('Ha ocurrido un error al crear el resultado');
                    }
                })
                .catch(error => {
                    alert('Ha ocurrido un error al crear el resultado');
                    console.error('Error:', error);
                });
        });
    </script>

    <?php include("includes/footer.php"); ?>
</body>

</html>

