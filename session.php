<?php
// session.php

// Iniciar la sesión si aún no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();

    // Configuraciones de seguridad opcionales
    // Asegurar que la cookie de sesión solo se transmita a través de HTTPS
    // ini_set('session.cookie_secure', 1);

    // Evitar que el navegador acceda a la cookie de sesión mediante JavaScript
    // ini_set('session.cookie_httponly', 1);

    // Usar solo cookies para almacenar el identificador de sesión
    // ini_set('session.use_only_cookies', 1);
}
?>
