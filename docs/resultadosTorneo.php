<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensajes</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/gestionUsuaris.css">
</head>
<body>
<header>
    <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
    <?php include("includes/nav.php"); ?>
</header>
<main>
    <h1>ULTIMOS RESULTADOS</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Combates Realizados</th>
                <th>Combates ganados</th>
                <th>Fecha Combate</th>
                <th>Porcentaje Ganados</th>
            </tr>
        </thead>
        <tbody id="resultados-table">
        </tbody>
    </table>
</main>
<script>
  window.onload = function() {
    fetch('../api/verResultadosTorneos.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const resultadosTable = document.getElementById('resultados-table');
            data.forEach(resultados => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${resultados.Nombre}</td>
                    <td>${resultados.Apellidos}</td>
                    <td>${resultados.Combates_Realizados}</td>
                    <td>${resultados.Combates_Ganados}</td>
                    <td>${resultados.Fecha_Combate}</td>
                    <td>${resultados.Porcentaje_Ganados}</td>
                    <td><a href='añadirResultado.php?ID=${resultados.id}'>Añadir Nuevo Ganador</a></td>
                    <td><a href='modificarResultado.php?ID=${resultados.id}'>Modificar Resultados</a></td>
                `;
                resultadosTable.appendChild(row);
            });
        });
};


</script>
<script src="js/scripts.js"></script>
<?php include("includes/footer.php"); ?>
</body>
</html>
