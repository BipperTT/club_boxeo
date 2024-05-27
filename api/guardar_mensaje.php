<?php
include("connexio.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar que todos los campos requeridos estén presentes
    if (isset($_POST['nom'], $_POST['email'], $_POST['telefono'], $_POST['message'])) {
        $nombre = mysqli_real_escape_string($conn, $_POST['nom']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
        $mensaje = mysqli_real_escape_string($conn, $_POST['message']);

        // Insertar el mensaje en la base de datos
        $query = "INSERT INTO Mensaje (nombre, email, telefono, mensaje) VALUES ('$nombre', '$email', '$telefono', '$mensaje')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Aquí puedes implementar la lógica para notificar a los entrenadores
            // Por ejemplo, enviando un correo electrónico a los entrenadores
            // o registrando una notificación en el sistema
            echo "success";
        } else {
            echo "Error al enviar el mensaje. Por favor, inténtalo de nuevo. Detalles del error: " . mysqli_error($conn);
        }
    } else {
        echo "Faltan campos obligatorios en el formulario.";
    }
}
?>
