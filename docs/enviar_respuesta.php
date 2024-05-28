<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'entrenador') {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Enviar Respuesta</title>
    <link rel="stylesheet" href="styles/comun.css">
</head>
<body>
<header>
    <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
    <?php include("includes/nav.php"); ?>
</header>
<main>
    <h1>Enviar Respuesta</h1>
    <form id="respuesta-form">
        <input type="hidden" id="mensaje_id" name="mensaje_id" value="<?php echo $_GET['id']; ?>">
        <textarea id="respuesta" name="respuesta" placeholder="Escribe tu respuesta aquí" required></textarea>
        <button type="submit">Enviar</button>
    </form>
</main>
<script>
    document.getElementById('respuesta-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const mensaje_id = document.getElementById('mensaje_id').value;
        const respuesta = document.getElementById('respuesta').value;

        const data = {
            mensaje_id: mensaje_id,
            respuesta: respuesta
        };

        fetch('api/actualizar_respuesta.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Respuesta enviada exitosamente');
                window.location.href = 'visualizarMensaje.php';
            } else {
                alert('Hubo un problema al enviar la respuesta: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un problema al enviar la respuesta.');
        });
    });
</script>
<?php include("includes/footer.php"); ?>
</body>
</html>
