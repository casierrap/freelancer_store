<?php
include '../session.php'; // Iniciar la sesión

// Destruir todas las variables de sesión
$_SESSION = [];

// Destruir la sesión
session_destroy();

session_unset();

// Redirigir al usuario a la página principal
header("Location: index.php");
exit;
?>
