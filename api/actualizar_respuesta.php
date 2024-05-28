<?php
include("../connexio.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['mensaje_id'], $data['respuesta'])) {
        $mensaje_id = mysqli_real_escape_string($conn, $data['mensaje_id']);
        $respuesta = mysqli_real_escape_string($conn, $data['respuesta']);

        $query = "UPDATE Mensaje SET respuesta = '$respuesta' WHERE id = $mensaje_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $response = array('status' => 'success');
        } else {
            $response = array('status' => 'error', 'message' => mysqli_error($conn));
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Faltan campos obligatorios');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
