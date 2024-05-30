<?php
session_start();
include("connexio.php");

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$sql_persona = "INSERT INTO Persona (nombre, apellido1, telefono, email, contraseña, tipo) 
                VALUES ('$first_name', '$last_name', '$phone', '$email', '$password', 'usuario')";
$result_persona = mysqli_query($conn, $sql_persona);

if ($result_persona) {
    $persona_id = mysqli_insert_id($conn);
    
    $sql_usuario = "INSERT INTO Usuario (ID_usuario) VALUES ('$persona_id')";
    $result_usuario = mysqli_query($conn, $sql_usuario);
    
    if ($result_usuario) {
        $_SESSION['id_usuario'] = $persona_id;
        $_SESSION['email'] = $email;
        $_SESSION['tipo'] = 'usuario';
        
        header('Location: ../docs/index.php');
        exit();
    } else {
        echo 'Error al insertar en la tabla Usuario: ' . mysqli_error($conn);
    }
} else {
    echo 'Error al insertar en la tabla Persona: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>
