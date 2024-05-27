<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="../frontend/styles/comun.css">
    <style>
        .centered {
            text-align: center;
        }
        .table-container {
            margin: 0 auto;
            width: fit-content;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">CLUB BOX SOGACHE</div>
    <nav>
        <ul>
            <li><a href="../frontend/index.html">Inicio</a></li>
            <li><a href="../frontend/horarios.html">Horarios</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Precios</a>
                <div class="dropdown-content">
                    <a href="../frontend/tarifa.html">Tarifas</a>
                    <a href="../frontend/entrenoPrivado.html">Entreno Privado</a>
                </div>
            </li>
            <li><a href="../frontend/entrenadores.html">Entrenadores</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Blog</a>
                <div class="dropdown-content">
                    <a href="../frontend/nutricional.html">Información Nutricional</a>
                    <a href="../frontend/noticias.html">Noticias</a>
                </div>
            </li>
            <li><a href="../frontend/sobreNosotros.html">Sobre Nosotros</a></li>
            <li><a href="../frontend/contacto.html">Contacto</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="../frontend/iniciarSesion.html">Iniciar Sesión</a></li>
                <li><a href="../frontend/registro.html">Crear Cuenta</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main>
    <div class="centered">
        <h1>Gestión de Usuarios</h1>
    </div>
    <div class="table-container">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
            <?php
            // Aquí deberías realizar la consulta a la base de datos y poblar la tabla
            include("connexio.php");
            $sql = "SELECT * FROM Persona";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['apellido']}</td>
                            <td>{$row['telefono']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['tipo']}</td>
                            <td>
                                <form style='display:inline;' method='POST' action='modificar.php'>
                                    <input type='hidden' name='email' value='{$row['email']}'>
                                    <button type='submit'>Modificar</button>
                                </form>
                                <form style='display:inline;' method='POST' action='eliminar.php'>
                                    <input type='hidden' name='email' value='{$row['email']}'>
                                    <button type='submit' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\");'>Eliminar</button>
                                </form>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay usuarios registrados</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
    <div class="button-container">
        <form method="POST" action="altaUsuario.php">
            <button type="submit">Dar de alta un nuevo usuario</button>
        </form>
    </div>
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
