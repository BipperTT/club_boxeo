<?php
session_start();
session_destroy();
header("Location: ../frontend/iniciarSesion.html");
exit();
?>
