<?php
session_start();

// Destruir la sesión actual
session_destroy();

// Redirigir a la página de inicio o a otra página
header("Location: inicio.php");
exit();
?>
