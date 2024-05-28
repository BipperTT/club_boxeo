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
$id_usuario = $_SESSION['ID_usuario'];
$fecha_alta = date('Y-m-d');

require 'connexio.php'; // Incluye la conexión a la base de datos

$sql = "INSERT INTO Tarifa (Duracion, fecha_alta, Precio, ID_usuario) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isdi", $duracion, $fecha_alta, $precio, $id_usuario);

if ($stmt->execute()) {
    http_response_code(200);
    echo json_encode(["message" => "Payment processed successfully"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
