<?php

include("connexio.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($conn, "SELECT * FROM Resultados");
    $personas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $personas[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($personas);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = mysqli_real_escape_string($conn, $data['Nombre']);
    $apellido = mysqli_real_escape_string($conn, $data['Apellidos']);
    $realizados = intval($data['Combates_Realizados']);
    $ganados = intval($data['Combates_Ganados']);
    $fecha = mysqli_real_escape_string($conn, $data['Fecha_Combate']);
    $porcentaje = floatval($data['Porcentaje_Ganados']);

    $stmt = $conn->prepare("UPDATE Resultados SET Nombre=?, Apellidos=?, Combates_Realizados=?, Combates_Ganados=?, Fecha_Combate=?, Porcentaje_Ganados=? WHERE id=?");
    $stmt->bind_param("ssiisdi", $nombre, $apellido, $realizados, $ganados, $fecha, $porcentaje, $id);
    $result = $stmt->execute();

    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


