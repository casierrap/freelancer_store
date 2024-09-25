<?php
require 'db.php'; // Conexión BD

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // Recibe el email enviado desde el formulario
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashea la contraseña

    // Consultar para insertar el nuevo usuario BD
    $sql = "INSERT INTO usuarios (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);

    // Ejecuta la consulta 
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Registro exitoso']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error en el registro']);
    }

    $stmt->close();
    $conn->close();
}
?>


