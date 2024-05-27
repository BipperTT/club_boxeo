<?php
session_start();
include("connexio.php");

// Verificar si el usuario está logueado
if (!isset($_SESSION['email'])) {
    header("Location: iniciarSesion.html");
    exit();
}

$email = $_SESSION['email'];
$plan = $_POST['plan'];

// Aquí se debería implementar la lógica de procesamiento del pago.
// Por simplicidad, se asume que el pago fue exitoso.

$ha_pagado = 1; // Suponiendo que el pago se realizó con éxito

// Actualizar la base de datos para reflejar el pago
$update_query = "UPDATE Persona SET ha_pagado = ? WHERE email = ?";
$stmt = $conn->prepare($update_query);
$stmt->bind_param("is", $ha_pagado, $email);
$stmt->execute();

// Notificar al entrenador
$entrenador_email = "entrenador@example.com"; // Reemplaza con el email del entrenador
$subject = "Nuevo pago realizado";
$message = "El usuario con email $email ha contratado el plan $plan.";
$headers = "From: no-reply@sogache.com";

// Enviar el email
mail($entrenador_email, $subject, $message, $headers);

// Redirigir a una página de confirmación
header("Location: confirmacionPago.html");
exit();
?>
