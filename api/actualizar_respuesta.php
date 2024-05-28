<?php
include("../connexio.php");

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Comprobar que los datos requeridos están presentes
    if (isset($data['mensaje_id'], $data['respuesta'])) {
        $mensaje_id = mysqli_real_escape_string($conn, $data['mensaje_id']);
        $respuesta = mysqli_real_escape_string($conn, $data['respuesta']);

        // Consulta para actualizar la respuesta en la base de datos
        $query = "UPDATE Mensaje SET respuesta = '$respuesta' WHERE id = $mensaje_id";
        $result = mysqli_query($conn, $query);

        // Comprobar si la consulta se ejecutó correctamente
        if ($result) {
            $response = array('status' => 'success');
        } else {
            // Añadir información del error de MySQL
            $response = array('status' => 'error', 'message' => 'Error en la consulta SQL: ' . mysqli_error($conn));
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Faltan campos obligatorios');
    }

    echo json_encode($response);
    exit;
} else {
    // Método de solicitud incorrecto
    $response = array('status' => 'error', 'message' => 'Método de solicitud no permitido');
    echo json_encode($response);
    exit;
}
?>
