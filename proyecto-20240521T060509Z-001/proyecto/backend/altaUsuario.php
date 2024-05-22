<?php
session_start();

include("connexio.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['ID'];
    $nom = $_POST['nom'];
    $cognom = $_POST['cognom1'];
    $telf = $_POST['telf'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo'];

    $id = $conn->real_escape_string($id);
    $nom = $conn->real_escape_string($nom);
    $cognom = $conn->real_escape_string($cognom);
    $telf = $conn->real_escape_string($telf);
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);
    $tipo = $conn->real_escape_string($tipo);

    $sql = "INSERT INTO PERSONA (ID, nom, cognom1, telf, email, contrasenya, tipo) VALUES ('$id', '$nom', '$cognom', '$telf', '$email', '$password', '$tipo')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario creado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Usuario</title>
    <link rel="stylesheet" href="../frontend/styles/comun.css">
</head>
<body>
<header>
        <div class="logo">CLUB BOX SOGACHE</div>
        <nav>
            <ul>
                <li><a href="paginaPrincipal.html">Inicio</a></li>
                <li><a href="horarios.html">Horarios</a></li>
                <li><a href="resultados.html">Resultados</a></li>
                <li><a href="entrenadores.html">Entrenadores</a></li>
                <li><a href="noticias.html">Noticias</a></li>
                <li><a href="nutricional.html">Información Nutricional</a></li>
                <li><a href="sobreNosotros.html">Sobre Nosotros</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="login.html">Iniciar Sesión</a></li>
                <li><a href="SignUp.html">Crear Cuenta</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form method="POST" action="">
            <label for="ID">ID:</label>
            <input type="text" name="ID" required>
            <br>
            <label for="nom">Nombre:</label>
            <input type="text" name="nom" required>
            <br>
            <label for="cognom1">Apellido:</label>
            <input type="text" name="cognom1" required>
            <br>
            <label for="telf">Teléfono:</label>
            <input type="text" name="telf" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <br>
            <label for="tipo">Tipo de Usuario:</label>
            <select name="tipo">
                <option value="entrenador">Entrenador</option>
                <option value="usuario">Usuario</option>
            </select>
            <br>
            <button type="submit">Crear Usuario</button>
        </form>
    </main>
</body>
</html>
