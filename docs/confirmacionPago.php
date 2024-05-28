<?php
session_start();
header('Content-Type: application/json');

// Verificación de sesión
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'usuario') {
    http_response_code(401);
    echo json_encode(["error" => "Unauthorized"]);
    exit();
}

// Respuesta de confirmación
$response = [
    "message" => "¡Gracias por tu pago! En breve el administrador determinará si se ha realizado correctamente y se pondrá en contacto con usted."
];

echo json_encode($response);
?>
