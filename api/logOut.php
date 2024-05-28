<?php
session_start();
session_unset(); // Eliminar todas las variables de sesión
session_destroy(); // Destruir la sesión
header('Location: ../docs/index.php'); // Redirigir a la página de inicio (puede cambiar a la página de inicio de sesión si prefieres)
exit();
?>
