<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $plan = $data['plan'];
    $duracion = $data['duracion'];
    $precio = $data['precio'];
    

    $result = mysqli_query($conn, "INSERT INTO Tarifa (plan, duracion, precio) VALUES ('$plan', '$duracion', '$precio')");
    if ($result) {
        header('Location: ../confirmacionPago.php');
        exit();
    } else {
        $response = array('status' => 'error');
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>
