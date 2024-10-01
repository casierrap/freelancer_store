<?php
$host = 'localhost'; // Dirección del servidor de base de datos
$dbname = 'tienda_db'; // Nombre de tu base de datos
$username = 'roof'; // Usuario de la base de datos
$password = ' '; // Contraseña de la base de datos

try {
    // Crear una conexión PDO a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Establecer el modo de error de PDO a excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>


