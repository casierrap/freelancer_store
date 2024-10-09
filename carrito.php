<?php
session_start();

function agregarAlCarrito($producto_id, $producto_nombre, $producto_precio, $cantidad, $talla, $genero) {
    // Almacenar en la sesión
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    $producto_encontrado = false;
    foreach ($_SESSION['carrito'] as &$producto) {
        if ($producto['producto_id'] == $producto_id && $producto['talla'] == $talla && $producto['genero'] == $genero) {
            // Si el producto ya está en el carrito, incrementar la cantidad
            $producto['cantidad'] += $cantidad;
            $producto_encontrado = true;
            break;
        }
    }

    if (!$producto_encontrado) {
        // Agregar el nuevo producto al carrito
        $_SESSION['carrito'][] = [
            'producto_id' => $producto_id,
            'producto_nombre' => $producto_nombre,
            'producto_precio' => $producto_precio,
            'cantidad' => $cantidad,
            'talla' => $talla,
            'genero' => $genero
        ];
    }

    // Redirigir a index.php después de agregar al carrito
    header("Location: freelancer_store-master/index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agregar'])) {
    $producto_id = $_POST['producto_id'];
    $producto_nombre = $_POST['producto_nombre'];
    $producto_precio = $_POST['producto_precio'];
    $cantidad = $_POST['cantidad'];
    $talla = $_POST['talla'];
    $genero = $_POST['genero'];

    agregarAlCarrito($producto_id, $producto_nombre, $producto_precio, $cantidad, $talla, $genero);
}
?>
