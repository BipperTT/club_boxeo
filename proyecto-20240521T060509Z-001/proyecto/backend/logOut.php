<?php
session_start();
session_destroy();
header("Location: ../docs/iniciarSesion.html");
exit();
?>
