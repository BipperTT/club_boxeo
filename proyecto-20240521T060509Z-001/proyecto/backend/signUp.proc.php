<?php
session_start();
include("connexio.php");
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$id = $_POST['id'];

if(empty($id) || empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
    echo "Todos los campos son obligatorios.";
    exit();
}

if($password !== $confirm_password) {
    echo "Las contraseñas no coinciden.";
    exit();
}

$hashed_password = md5($password);

$sql = "SELECT * FROM Persona WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "El correo electrónico ya está registrado.";
    exit();
}

$sql = "INSERT INTO Persona (ID, nombre, apellido1, email, contraseña, tipo) VALUES (?, ?, ?, ?, ?, 'usuario')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $id, $first_name, $last_name, $email, $hashed_password);

if ($stmt->execute()) {
    header("Location: ../frontend/index.html");
    exit();
} else {
    echo "Error en el registro: " . $stmt->error;
}

$stmt->close();
$conn->close();
