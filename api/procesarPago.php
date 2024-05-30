<?php
include('connexio.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $duracion = (int)$data['duracion'];
    $precio = (float)$data['precio'];
    $id_usuario = (int)$data['id_usuario'];
    
    $query = "INSERT INTO Tarifa (Duracion, fecha_alta, Precio, ID_usuario) VALUES ('$duracion', NOW(), '$precio', '$id_usuario')";
    
    // Debugging: print query to error log
    error_log("Query: " . $query);
    
    if (mysqli_query($conn, $query)) {
        $response = array('status' => 'success');
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $error_message = mysqli_error($conn);
        $response = array('status' => 'error', 'error' => $error_message);
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    mysqli_close($conn);
}
?>
