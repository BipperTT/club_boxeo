<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'usuario') {
    http_response_code(401);
    echo json_encode(["error" => "Unauthorized"]);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);
$plan = $data['plan'];
$duracion = $data['duracion'];
$precio = $data['precio'];

// Verificación básica de los datos
if (empty($plan) || empty($duracion) || empty($precio)) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid input"]);
    exit();
}

$response = [
    "plan" => htmlspecialchars($plan),
    "duracion" => htmlspecialchars($duracion),
    "precio" => htmlspecialchars($precio)
];

echo json_encode($response);
?>
