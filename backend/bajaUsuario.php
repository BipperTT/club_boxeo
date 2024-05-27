<?php
include("connexio.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data['id'];

    $query = "DELETE FROM Persona WHERE ID='$id'";

    if(mysqli_query($conn, $query)) {
        echo json_encode(["message" => "Usuario eliminado correctamente."]);
    } else {
        echo json_encode(["error" => "Error al eliminar usuario: " . mysqli_error($conn)]);
    }
}

mysqli_close($conn);
?>
