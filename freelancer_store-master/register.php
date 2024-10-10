<?php
include 'dp.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //CAPTURAR LOS DATOS DEL FORMULARIO

    $email = trim($_POST['email']);
    $nombre = trim($_POST['nombre']);
    $username = trim($_POST['username']);
    $telefono = trim($_POST['telefono']);
    $direccion = trim($_POST['direccion']);
    $ciudad = trim($_POST['ciudad']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    //Validar que las contraseñas coincidan

    if ( $password !== $confirm_password ) {
        echo json_encode(['success' => false, 'message' => 'La contraseñas no coinciden']);
        exit;
    }

    //Hashear la contraseña

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Insertar el usuario en la base de datos
        $query = "INSERT INTO usuarios (email, nombre ,username, telefono, direccion, ciudad, password) 
                  VALUES (:email, :nombre ,:username, :telefono, :direccion, :ciudad, :password)";
        $stmt = $pdo->prepare($query);

        $stmt->execute([
            'email' => $email,
            'nombre' => $nombre,
            'username' => $username,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'ciudad' => $ciudad,
            'password' => $hashed_password
        ]);

        echo json_encode(['success' => true, 'message' => 'Usuario registrado con éxito.']);

    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error al registrar el usuario: ' . $e->getMessage()]);
    }
}


?>
