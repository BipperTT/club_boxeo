<?php

include("connexio.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($conn, "SELECT * FROM Persona");
    $personas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $personas[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($personas);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['nombre'];
    $apellido1 = $data['apellido1'];
    $telefono = $data['telefono'];
    $email = $data['email'];
    $contraseña = $data['contraseña'];
    $tipo = $data['tipo'];
    $ha_pagado = $data['ha_pagado'];

    $result = mysqli_query($conn, "UPDATE Persona SET nombre='$nombre', apellido1='$apellido1', telefono='$telefono', email='$email', contraseña='$contraseña', tipo='$tipo', ha_pagado='$ha_pagado' WHERE ID=$id");
    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $result = mysqli_query($conn, "DELETE FROM Persona WHERE ID=$id");
    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['nombre'];
    $apellido1 = $data['apellido1'];
    $telefono = $data['telefono'];
    $email = $data['email'];
    $contraseña = $data['contraseña'];
    $tipo = $data['tipo'];
    $ha_pagado = isset($data['ha_pagado']) ? $data['ha_pagado'] : '0'; // Asegurarse de que ha_pagado está definido

    $result = mysqli_query($conn, "INSERT INTO Persona (nombre, apellido1, telefono, email, contraseña, tipo, ha_pagado) VALUES ('$nombre', '$apellido1', '$telefono', '$email', '$contraseña', '$tipo', '$ha_pagado')");
    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>
