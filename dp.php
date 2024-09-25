<?php
$servername = "localhost"; // Servidor de base de datos
$username = "root"; // usuario de MySQL
$password = ""; //  contraseña de MySQL
$dbname = "tienda_db"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
