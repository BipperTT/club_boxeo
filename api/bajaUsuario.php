<?php
include("../frontend/connexio.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $email = $conn->real_escape_string($email);

    $query = "DELETE FROM Persona WHERE email = '$email'";

    if (mysqli_query($conn, $query)) {
        $mensaje = "Usuario eliminado correctamente. ¡Hasta pronto!";
    } else {
        $mensaje = "Error al eliminar usuario: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
