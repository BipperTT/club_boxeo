<?php
include("connexio.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['ID'];
    if ($id) {
        $stmt = $conn->prepare("SELECT * FROM Resultados WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $resultado = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($resultado);
    } else {
        $result = mysqli_query($conn, "SELECT * FROM Resultados");
        $resultados = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $resultados[] = $row;
        }
        echo json_encode($resultados);
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $id = $_GET['ID'];
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['Nombre'];
    $apellidos = $data['Apellidos'];
    $combates_realizados = $data['Combates_Realizados'];
    $combates_ganados = $data['Combates_Ganados'];
    $fecha_combate = $data['Fecha_Combate'];
    $porcentaje_ganados = $data['Porcentaje_Ganados'];

    if ($id) {
        $stmt = $conn->prepare("UPDATE Resultados SET Nombre = ?, Apellidos = ?, Combates_Realizados = ?, Combates_Ganados = ?, Fecha_Combate = ?, Porcentaje_Ganados = ? WHERE id = ?");
        $stmt->bind_param("ssiisdi", $nombre, $apellidos, $combates_realizados, $combates_ganados, $fecha_combate, $porcentaje_ganados, $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }
    } else {
        echo json_encode(["status" => "error"]);
    }
}
?>
