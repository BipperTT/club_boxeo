<?php
include('connexio.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $idEntrenador = $data['ID_entrenador'];
    $diaSemana = $data['dia_semana'];
    $horaInicio = $data['hora_inicio'];
    $horaFinal = $data['hora_final'];
    $id_usuario = $data['id_usuario'];

    $query = "INSERT INTO Grupal (ID_entrenador, dia_semana, hora_inicio, hora_final, ID_usuario) VALUES ('$idEntrenador', '$diaSemana', '$horaInicio', '$horaFinal', '$id_usuario')";
    
    if (mysqli_query($conn, $query)) {
        $response = array('status' => 'success');
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'error' => mysqli_error($conn));
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    mysqli_close($conn);
}
?>
