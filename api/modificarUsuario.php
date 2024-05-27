<?php
include("../frontend/connexio.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data['ID'];
    $nombre = $data['nombre'];
    $apellido1 = $data['apellido1'];
    $telefono = $data['telefono'];
    $email = $data['email'];
    $contrasena = $data['contraseña'];
    $tipo = $data['tipo'];

    $query = "UPDATE Persona SET nombre='$nombre', apellido1='$apellido1', telefono='$telefono', email='$email', contraseña=SHA1('$contrasena'), tipo='$tipo' WHERE id='$id'";

    if(mysqli_query($conn, $query)) {
        echo json_encode(["message" => "Usuario modificado correctamente."]);
    } else {
        echo json_encode(["error" => "Error al modificar usuario: " . mysqli_error($conn)]);
    }
}
mysqli_close($conn);
?>
