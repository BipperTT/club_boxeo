<?php
session_start();
include("connexio.php");


if (!isset($_SESSION['email'])) {
    header("Location: iniciarSesion.html");
    exit();
}

$email = $_SESSION['email'];
$plan = $_POST['plan'];

$ha_pagado = 1; 

$update_query = "UPDATE Persona SET ha_pagado = ? WHERE email = ?";
$stmt = $conn->prepare($update_query);
$stmt->bind_param("is", $ha_pagado, $email);
$stmt->execute();


$entrenador_email = "entrenador@example.com"; 
$subject = "Nuevo pago realizado";
$message = "El usuario con email $email ha contratado el plan $plan.";
$headers = "From: no-reply@sogache.com";

mail($entrenador_email, $subject, $message, $headers);


header("Location: confirmacionPago.html");
exit();
?>
