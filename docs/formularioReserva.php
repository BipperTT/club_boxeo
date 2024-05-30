<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $idEntrenador = $_POST['ID_entrenador'];
    $diaSemana = $_POST['dia_semana']; 
    $horaInicio = $_POST['hora_inicio'];
    $horaFinal = $_POST['hora_final'];
    $id_usuario = $_POST['id_usuario'];
    
    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];
        
        $data = array(
            'ID_entrenador' => $idEntrenador,
            'dia_semana' => $diaSemana, 
            'hora_inicio' => $horaInicio,
            'hora_final' => $horaFinal,
            'id_usuario' => $id_usuario 
        );
        
        $ch = curl_init('http://localhost/proyectoFinal/club_boxeo/api/ClaseGrupal.php');
        
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
            echo 'Reserva concertada con éxito';
            header('Location:confirmacionReserva.php');
            exit; 
        } else {
            echo 'Hubo un error al contratar la tarifa: ' . $responseData['error'];
        }
    } else {
        echo 'No se pudo obtener el ID del usuario de la sesión.';
    }
}
?>
