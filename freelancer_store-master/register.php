<?php
include 'dp.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el usuario ya existe
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'El correo ya está registrado']);
    } else {
        // Insertar nuevo usuario
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Registro exitoso']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al registrar']);
        }
    }

    $stmt->close();
    $conn->close();
}
?>
