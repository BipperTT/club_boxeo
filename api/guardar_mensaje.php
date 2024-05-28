<?php
include("connexio.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' & !isset($_GET['email'])) {
        $result = mysqli_query($conn, "SELECT * FROM Mensaje");
        $mensajes = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($mensajes);
    }
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $nom = $data['nom'];
        $email = $data['email'];
        $telefono = $data['telefono'];
        $mensaje = $data['mensaje'];
        $result = mysqli_query($conn, "INSERT INTO Mensaje nombre, email, telefono, mensaje VALUES ('$nom'),('$email'),('$telefono'),('$mensaje')");
        if ($result) {
            $response = array('status' => 'success');
        } else {
            $response = array('status' => 'error');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['mensaje_id'], $_POST['respuesta'])) {
        $mensaje_id = $_POST['mensaje_id'];
        $respuesta = $_POST['respuesta'];
    }
}
?>