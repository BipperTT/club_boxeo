<?php
session_start();
include("connexio.php");

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'entrenador') {
    header("Location: ../frontend/iniciarSesion.html");
    exit();
}

$query = "SELECT * FROM Persona";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="../frontend/styles/comun.css">
    <style>
        h1 {
            display: flex;
        }

        .boton {
            display: flex;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        .centered-title {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .centered-button {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
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
            <li><a href="../frontend/iniciarSesion.html">Iniciar Sesión</a></li>
            <li><a href="../frontend/registro.html">Crear Cuenta</a></li>
            <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'entrenador'): ?>
                <li><a href="gestioUsuaris.php">Gestión de Usuarios</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main>
    <h1>Gestión de Usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['ID']); ?></td>
                    <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($row['apellido1']); ?></td>
                    <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['tipo']); ?></td>
                    <td>
    <form style="display:inline;" method="POST" action="modificarUsuario.php">
        <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
        <button type="submit">Modificar</button>
    </form>
    <form style="display:inline;" method="POST" action="bajaUsuario.php">
        <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</button>
    </form>
    </td>
    </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <div class="boton">
    <button onclick="location.href='altaUsuario.php'">Dar de alta un nuevo usuario</button>
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

<?php
mysqli_close($conn);
?>
