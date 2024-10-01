<?php
header('Content-Type: application/json'); // Asegura que la respuesta es JSON
include 'dp.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar y sanitizar las entradas
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        try {
            // Preparar la consulta usando PDO
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Verificar la contraseña
                // Asumiendo que las contraseñas están hasheadas usando password_hash()
                if ($password === $user['password']) {
                    // Aquí puedes iniciar sesión, por ejemplo, establecer sesiones
                    // session_start();
                    // $_SESSION['user_id'] = $user['id'];
                    
                    echo json_encode(['success' => true, 'message' => 'Inicio de sesión exitoso']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']);
            }
        } catch (PDOException $e) {
            // En producción, evita exponer detalles de errores
            echo json_encode(['success' => false, 'message' => 'Error en la consulta: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
    }
} else {
    // Si el método no es POST, devuelve el código 405
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>



