<?php
session_start();
include 'freelancer_store-master\dp.php'; // Archivo de conexión a la base de datos con PDO

function agregarAlCarrito($producto_id, $cantidad, $talla, $genero) {
    global $pdo; // Utilizamos la conexión PDO desde db.php
    $usuario_id = $_SESSION['user_id'];

    try {
        // Verificar si el producto ya está en el carrito con la misma talla y género
        $query = "SELECT * FROM carrito WHERE usuario_id = :usuario_id AND producto_id = :producto_id AND talla = :talla AND genero = :genero";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'usuario_id' => $usuario_id, 
            'producto_id' => $producto_id,
            'talla' => $talla,
            'genero' => $genero
        ]);
        
        if ($stmt->rowCount() > 0) {
            // Si el producto ya está en el carrito, incrementar la cantidad
            $query = "UPDATE carrito SET cantidad = cantidad + :cantidad WHERE usuario_id = :usuario_id AND producto_id = :producto_id AND talla = :talla AND genero = :genero";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                'cantidad' => $cantidad, 
                'usuario_id' => $usuario_id, 
                'producto_id' => $producto_id,
                'talla' => $talla,
                'genero' => $genero
            ]);
        } else {
            // Si el producto no está en el carrito, agregarlo
            $query = "INSERT INTO carrito (usuario_id, producto_id, cantidad, talla, genero) VALUES (:usuario_id, :producto_id, :cantidad, :talla, :genero)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                'usuario_id' => $usuario_id, 
                'producto_id' => $producto_id, 
                'cantidad' => $cantidad,
                'talla' => $talla,
                'genero' => $genero
            ]);
        }

        // Almacenar en la sesión
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        $producto_encontrado = false;
        foreach ($_SESSION['carrito'] as &$producto) {
            if ($producto['producto_id'] == $producto_id && $producto['talla'] == $talla && $producto['genero'] == $genero) {
                $producto['cantidad'] += $cantidad;
                $producto_encontrado = true;
                break;
            }
        }

        if (!$producto_encontrado) {
            $_SESSION['carrito'][] = [
                'producto_id' => $producto_id,
                'cantidad' => $cantidad,
                'talla' => $talla,
                'genero' => $genero
            ];
        }

        header("Location: freelancer_store-master/index.php");
        exit;
    } catch (PDOException $e) {
        echo "Error al agregar el producto al carrito: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agregar'])) {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];
    $talla = $_POST['talla'];
    $genero = $_POST['genero'];

    agregarAlCarrito($producto_id, $cantidad, $talla, $genero);
}
?>
