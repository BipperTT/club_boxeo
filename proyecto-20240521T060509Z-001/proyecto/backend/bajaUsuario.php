<?php
session_start();

include("connexio.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $email = $conn->real_escape_string($email);

    // Obtener el ID del usuario basado en el email
    $sql = "SELECT ID FROM PERSONA WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $fila = $result->fetch_assoc();
        $id = $fila['ID'];

        // Eliminar registros relacionados en la tabla HORA
        $sql_get_horarios = "SELECT ID FROM HORARIO WHERE ID_entrenador='$id'";
        $result_horarios = $conn->query($sql_get_horarios);

        if ($result_horarios->num_rows > 0) {
            while ($row_horario = $result_horarios->fetch_assoc()) {
                $id_horario = $row_horario['ID'];
                $sql_delete_horas = "DELETE FROM HORA WHERE ID_horario='$id_horario'";
                if (!$conn->query($sql_delete_horas) === TRUE) {
                    echo "Error al eliminar horas relacionadas: " . $conn->error;
                    exit;
                }
            }
        }

        // Eliminar registros relacionados en la tabla HORARIO
        $sql_delete_horarios = "DELETE FROM HORARIO WHERE ID_entrenador='$id'";
        if ($conn->query($sql_delete_horarios) === TRUE) {
            // Eliminar registros relacionados en la tabla COMBATE
            $sql_delete_combates = "DELETE FROM COMBATE WHERE ID_box1='$id' OR ID_box2='$id'";
            if ($conn->query($sql_delete_combates) === TRUE) {
                // Eliminar registros relacionados en la tabla GRUPAL
                $sql_delete_grupales = "DELETE FROM GRUPAL WHERE id_entreno_grupal IN (SELECT ID FROM ENTRENO WHERE ID_Entrenador='$id')";
                if ($conn->query($sql_delete_grupales) === TRUE) {
                    // Eliminar registros relacionados en la tabla PRIVADO
                    $sql_delete_privados = "DELETE FROM PRIVADO WHERE Id_entreno_privado IN (SELECT ID FROM ENTRENO WHERE ID_Entrenador='$id')";
                    if ($conn->query($sql_delete_privados) === TRUE) {
                        // Eliminar registros relacionados en la tabla ENTRENO
                        $sql_delete_entrenos = "DELETE FROM ENTRENO WHERE ID_Entrenador='$id'";
                        if ($conn->query($sql_delete_entrenos) === TRUE) {
                            // Ahora eliminar el usuario de la tabla PERSONA
                            $sql_delete_persona = "DELETE FROM PERSONA WHERE ID='$id'";
                            if ($conn->query($sql_delete_persona) === TRUE) {
                                echo "Usuario eliminado con éxito";
                            } else {
                                echo "Error al eliminar usuario: " . $conn->error;
                            }
                        } else {
                            echo "Error al eliminar entrenos relacionados: " . $conn->error;
                        }
                    } else {
                        echo "Error al eliminar entrenos privados relacionados: " . $conn->error;
                    }
                } else {
                    echo "Error al eliminar entrenos grupales relacionados: " . $conn->error;
                }
            } else {
                echo "Error al eliminar combates relacionados: " . $conn->error;
            }
        } else {
            echo "Error al eliminar horarios relacionados: " . $conn->error;
        }
    } else {
        echo "Usuario no encontrado";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar de Baja Usuario</title>
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
            <label for="email">Email del usuario a dar de baja:</label>
            <input type="email" name="email" required>
            <button type="submit">Eliminar Usuario</button>
        </form>
    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-left">
                <img src="img/ico_nbg.png" alt="Logo">
                <p>C/ de Joaquín Costa, 22, Ciutat Vella, 08001 Barcelona</p>
            </div>
            <div class="footer-center">
                <p>&copy; 2024 Sogache S.L. Todos los derechos reservados.</p>
                <p>This website and its content are the property of Sogache S.L. Reproduction in whole or in part, copying, distribution, and any unauthorized use of this content is prohibited without the express written permission of Nombre de la Empresa.</p>
                <p><a href="politica-de-privacidad.html">Política de Privacidad</a> | <a href="terminos-y-condiciones.html">Términos y Condiciones</a></p>
                <p><a href="privacy-policy.html">Privacy Policy</a> | <a href="terms-and-conditions.html">Terms and Conditions</a></p>
            </div>
            <div class="footer-right">
                <div class="social-icons">
                    <img src="img/instagram.png" alt="Instagram" class="social-icon">
                    <img src="img/facebook.png" alt="Facebook" class="social-icon">
                    <img src="img/twitter.png" alt="Twitter" class="social-icon">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

