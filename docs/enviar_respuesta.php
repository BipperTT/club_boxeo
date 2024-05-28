<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'entrenador') {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['mensaje_id'], $_POST['respuesta'])) {
        $mensaje_id = $_POST['mensaje_id'];
        $respuesta = $_POST['respuesta'];

        include("connexio.php");

        $query = "UPDATE Mensaje SET respuesta = '$respuesta' WHERE id = $mensaje_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "success";
        } else {
            echo "Error al enviar la respuesta. Por favor, inténtalo de nuevo.";
        }
    } else {
        echo "Faltan campos obligatorios en el formulario.";
    }
} else {
    header("Location: index.php");
    exit;
}
?>
