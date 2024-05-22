<?php
session_start();
    include("connexio.php");

    $email = $_REQUEST['email'];
    $contrasenya = $_REQUEST['password'];

    $sql = "SELECT * FROM PERSONA WHERE email=$email AND contraseña=$contrasenya";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0 ) {
        $fila = mysqli_fetch_array($result);
        
        $_SESSION['email'] = $fila['email'];
        $_SESSION['tipo'] = $fila['tipo'];

        if ($_SESSION['tipo'] == 'entrenador') {
            header('Location: gestioUsuaris.php');
        } else {
            header('Location: paginaPrincipal.html');
        }
    } else {
        echo 'Usuari o Contrasenya incorrectas';
    }
?>
