<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['index'])) {
    $index = $_POST['index'];

    if (isset($_SESSION['carrito'][$index])) {
        unset($_SESSION['carrito'][$index]);
        // Reindexar el array para mantener la consistencia
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    }

    // Redirigir de vuelta a index.php
    header("Location: index.php");
    exit;
} else {
    echo "Error al eliminar el producto del carrito.";
}
?>
