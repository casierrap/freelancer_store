<?php
session_start();
session_unset(); // Elimina todas las variables de la sesión
session_destroy(); // Destruye la sesión

// Redirigir al usuario a la página principal
header('Location: index.php');
exit;
?> 
