<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Veure categories</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/gestionUsuaris.css">

</head>
<header>
    <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
    <?php
    include("includes/nav.php");
?>
</header>
<body>
    <main>
    <h1>Personas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Mensaje</th>
                <th>Fecha Envio</th>
                <th>Respuesta</th>
            </tr>
        </thead>
        <tbody id="mensaje-table">
        </tbody>
        <tfoot>
            <tr>
                <th colspan="10"><a href="enviar_respuesta.php">RESPUESTA</a></th>
            </tr>
        </tfoot>
    </table>
</main>
    <script>
        fetch('../api/guardar_mensaje.php')
            .then(response => response.json())
            .then(data => {
                const personasTable = document.getElementById('mensaje-table');
                data.forEach(mensaje => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${mensaje.ID}</td>
                        <td>${mensaje.nombre}</td>
                        <td>${mensaje.email}</td>
                        <td>${mensaje.telefono}</td>
                        <td>${mensaje.mensaje}</td>
                        <td>${mensaje.fecha_envio}</td>
                        <td>${mensaje.respuesta}</td>
                    `;
                    personasTable.appendChild(row);
                });
            });
    </script>
       <?php
    include("includes/footer.php");
?>
</body>
</html>