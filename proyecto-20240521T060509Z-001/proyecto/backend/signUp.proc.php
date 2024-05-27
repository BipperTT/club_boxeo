<?php
session_start();
include("connexio.php");

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Verificar si hay campos vacíos
if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
    echo "Todos los campos son obligatorios.";
    exit();
}

// Verificar si las contraseñas coinciden
if ($password !== $confirm_password) {
    echo "Las contraseñas no coinciden.";
    exit();
}

// Verificar si el correo electrónico ya está registrado
$sql = "SELECT * FROM Persona WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "El correo electrónico ya está registrado.";
    exit();
}

// Insertar nuevo usuario en la base de datos
$sql = "INSERT INTO Persona (nombre, apellido1, email, telefono, contraseña, tipo) VALUES (?, ?, ?, ?, ?, 'usuario')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $password);

if ($stmt->execute()) {
    header("Location: ../docs/index.html");
    exit();
} else {
    echo "Error en el registro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
