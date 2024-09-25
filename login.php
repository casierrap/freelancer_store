<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consultar para verificarel usuario existe
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            // Inicio de sesión 
            $_SESSION['user_id'] = $user['id'];
            echo json_encode(['success' => true, 'message' => 'Inicio de sesión exitoso']);
        } else {
            // Contraseña incorrecta
            echo json_encode(['success' => false, 'message' => 'Contraseña incorrecta']);
        }
    } else {
        // Usuario no encontrado
        echo json_encode(['success' => false, 'message' => 'El usuario no existe']);
    }
    $stmt->close();
    $conn->close();
}
?>
