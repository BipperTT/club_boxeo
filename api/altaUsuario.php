<?php
include("../api/connexio.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $nombre = $data['nombre'];
    $apellido1 = $data['apellido1'];
    $telefono = $data['telefono'];
    $email = $data['email'];
    $contrasena = $data['contraseña'];
    $tipo = $data['tipo'];

    $query = "INSERT INTO Persona (nombre, apellido1, telefono, email, contraseña, tipo) VALUES ('$nombre', '$apellido1', '$telefono', '$email', '$contrasena', '$tipo')";
    
    if(mysqli_query($conn, $query)) {
        echo json_encode(["message" => "Usuario dado de alta correctamente."]);
    } else {
        echo json_encode(["error" => "Error al dar de alta usuario: " . mysqli_error($conn)]);
    }
}
mysqli_close($conn);
?>
