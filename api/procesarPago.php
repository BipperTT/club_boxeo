<?php
session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'usuario') {
    header('Location: tarifa.php');
    exit();
}

$plan = $_POST['plan'];
$duracion = $_POST['duracion'];
$precio = $_POST['precio'];
$id_usuario = $_SESSION['ID_usuario'];

$fecha_alta = date('Y-m-d');

require 'connexio.php'; // Incluye la conexión a la base de datos

$sql = "INSERT INTO Tarifa (Duracion, fecha_alta, Precio, ID_usuario) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isdi", $duracion, $fecha_alta, $precio, $id_usuario);

if ($stmt->execute()) {
    header('Location: ../docs/confirmacionPago.php');
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
