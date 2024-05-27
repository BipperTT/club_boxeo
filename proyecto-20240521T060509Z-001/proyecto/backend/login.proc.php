<?php
session_start();
include("connexio.php");

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];


echo "Email: " . $email . "<br>";
echo "Password: " . $password . "<br>";

$sql = "SELECT * FROM Persona WHERE email='$email' AND contraseña='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $fila = mysqli_fetch_array($result);
    
    $_SESSION['email'] = $fila['email'];
    $_SESSION['tipo'] = $fila['tipo'];

    if ($_SESSION['tipo'] == 'entrenador') {
        header('Location: ../backend/gestioUsuaris.php');
    } else {
        header('Location: ../docs/iniciarSesion.html');
    }
    exit();
} else {
    echo 'Usuario o Contraseña incorrectas';
}

mysqli_close($conn);
?>
