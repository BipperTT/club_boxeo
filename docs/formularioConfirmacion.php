<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plan = $_POST['plan'];
    $duracion = $_POST['duracion'];
    $precio = $_POST['precio'];
    
    $data = array(
        'plan' => $plan,
        'duracion' => $duracion,
        'precio' => $precio
    );
    
    $ch = curl_init('../api/procesarPago.php');
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen(json_encode($data))
    ));
    
    $response = curl_exec($ch);
    
    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        die('Error en la solicitud: ' . $error);
    }
    
    curl_close($ch);
    
    $responseData = json_decode($response, true);
    
    if ($responseData['status'] === 'success') {
        echo 'Tarifa contratada con éxito';
    } else {
        echo 'Hubo un error al contratar la tarifa';
    }
}
?>
