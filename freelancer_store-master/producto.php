<?php
include '../session.php'; // Iniciar la sesión

// Obtener los parámetros del producto
$producto_id = isset($_GET['id']) ? $_GET['id'] : null;
$producto_nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 'Producto Desconocido';
$producto_precio = isset($_GET['precio']) ? $_GET['precio'] : '0';

// Verificar si se proporcionaron todos los parámetros necesarios
if (!$producto_id) {
    echo "Producto no encontrado.";
    exit;
}


?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="normalize/normalize.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Moderustic:wght@300..800&family=Staatliches&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles/styles.css" />
    <script src="JS/script.js"></script>
    <title>Tienda Front End - <?php echo htmlspecialchars($producto_nombre); ?></title>
  </head>
  <body>
    <!-- Header -->
    <header class="header">
      <a href="index.php"></a>
      <img class="header__logo" src="img/logo.png" alt="Logotipo" />
    </header>

    <!-- Navegación -->
    <nav class="navegacion">
      <a class="navegacion__enlace navegacion__enlace--activo" href="index.php"
        >Tienda</a
      >
      <a class="navegacion__enlace" href="nosotros.html">Nosotros</a>
    </nav>

    <!-- Contenido principal -->
    <main class="contenedor">
        <h1><?php echo htmlspecialchars($producto_nombre); ?></h1>

        <div class="camisa">
            <img class="camisa__imagen" src="img/<?php echo $producto_id; ?>.jpg" alt="Imagen de <?php echo htmlspecialchars($producto_nombre); ?>">

            <div class="camisa__contenido">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime odit odio laborum. Cum laborum cupiditate sint labore accusamus culpa. Ducimus, dolore magnam.</p>

                <form action="../carrito.php" method="POST" class="formulario">
                    <input type="hidden" name="producto_id" value="3"> <!-- Cambiar este valor por el ID real del producto -->
                    <input type="hidden" name="producto_nombre" value="ReactJS"> <!-- Nombre del producto -->
                    <input type="hidden" name="producto_precio" value="25000"> <!-- Precio del producto -->

                    <select name="talla" class="formulario__campo">
                        <option disabled selected>--Seleccionar Talla--</option>
                        <option value="Pequeña">Pequeña</option>
                        <option value="Mediana">Mediana</option>
                        <option value="Grande">Grande</option>
                    </select>
                    <select name="genero" class="formulario__campo">
                        <option disabled selected>--Seleccionar Género--</option>
                        <option value="hombre">Hombre</option>
                        <option value="mujer">Mujer</option>
                    </select>
                    <input
                        class="formulario__campo"
                        type="number"
                        name="cantidad"
                        placeholder="Cantidad"
                        min="1"
                        value="1"
                    />
                    <input
                        class="formulario__submit"
                        type="submit"
                        value="Agregar al Carrito"
                        name="agregar"
                    />
                  </form>

            </div>
        </div>
    </main>

    <div id="carrito-lateral" class="carrito-lateral">
      <div class="carrito-header">
        <h2>Tu Carrito</h2>
        <button id="cerrar-carrito" class="cerrar-carrito">&times;</button>
      </div>
      <div class="carrito-contenedor" id="carrito-contenido">
        <!--Aquí se llenará con los productos del carrito-->
      </div>
      <div class="carrito-footer">
        <button class="comprar-btn">Proceder al Pago</button>
      </div>
    </div>


    <!-- Fondo oscurecido al abrir el carrito -->
    <div id="overlay" class="overlay"></div>

    <!-- Footer -->
    <footer class="footer">
      <p class="footer__texto">Front End Store © Todos los derechos 2024</p>
      <style>
        /* Ajustes para la página producto.php */
        html,
        body {
          height: 100%;
          margin: 0;
          padding: 0;
        }

        body {
          display: flex;
          flex-direction: column;
          min-height: 100vh;
        }

        main.contenedor {
          flex: 1; /* Esto expande el contenido principal para llenar el espacio disponible */
        }

        .footer {
          margin-top: auto; /* Empuja el footer hacia el fondo si el contenido es corto */
        }

        /* Centrar y ajustar la imagen en producto.html */
        .header__logo {
          display: flex;
          height: 40px; /* Altura del logo */
          width: auto;
          margin: 0 auto;
        }
      </style>
    </footer>
  </body>
</html>
