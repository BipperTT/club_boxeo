<?php
// Iniciar sesión si aún no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ha iniciado sesión y si es un entrenador
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'entrenador') {
    // Redirigir al usuario a otra página, por ejemplo, la página de inicio
    header("Location: index.html");
    exit; // ¡Importante! Asegúrate de detener la ejecución del script después de redirigir
}

// Incluir el archivo de conexión a la base de datos
include("connexio.php");

// Consultar la base de datos para obtener los mensajes
$query = "SELECT * FROM Mensaje";
$result = mysqli_query($conn, $query);

// Mostrar los mensajes en una tabla HTML
echo "<table>";
echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Mensaje</th><th>Fecha de Envío</th><th>Responder</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['nombre']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['telefono']."</td>";
    echo "<td>".$row['mensaje']."</td>";
    echo "<td>".$row['fecha_envio']."</td>";
    // Botón para responder al mensaje
    echo "<td>";
    echo "<button onclick='toggleForm(\"form_".$row['id']."\")'>Responder</button>";
    echo "</td>";
    echo "</tr>";
    // Formulario de respuesta (oculto por defecto)
    echo "<tr id='form_".$row['id']."' style='display: none;'>";
    echo "<td colspan='6'>";
    echo "<form method='POST' action='enviar_respuesta.php'>";
    echo "<input type='hidden' name='mensaje_id' value='".$row['id']."'>";
    echo "<textarea name='respuesta' placeholder='Escribe tu respuesta' required></textarea>";
    echo "<button type='submit'>Enviar respuesta</button>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
?>

<script>
// Función para mostrar/ocultar el formulario de respuesta
function toggleForm(formId) {
    var form = document.getElementById(formId);
    if (form.style.display === 'none') {
        form.style.display = 'table-row';
    } else {
        form.style.display = 'none';
    }
}
</script>
