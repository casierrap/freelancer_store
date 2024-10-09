<?php
include '../session.php'; // Iniciar la sesión

?>

<!DOCTYPE html>
<html lang="en">
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="stylesheet" href="styles/styles.css" />

    <title>Venta CamisetasFrontEnd</title>
  </head>
  <body>
    <!--Ejemplo BEM-->
    <!--Ejemplo BEM-->
    <header class="header">
      <a href="index.php" class="header__logo-link">
        <img class="header__logo" src="img/logo.png" alt="Logotipo" />
      </a>
      <input
        type="search"
        class="header__search"
        placeholder="Buscar producto"
      />
      <nav class="header__nav">
      <?php if (isset($_SESSION['username'])): ?>
    <a href="#" class="header__link">Hola, <?php echo htmlspecialchars($_SESSION['username']); ?></a>
    <a href="logout.php" class="header__link" id="btn-logout-icon">
        <i class="fa fa-sign-out-alt"></i> Cerrar Sesión
    </a>
<?php else: ?>
    <a href="#" class="header__link" id="btn-login1">Mi cuenta</a>
    <a href="#" class="header__link" id="btn-login-icon">
        <i class="fa fa-user"></i>
    </a>
<?php endif; ?>
<a href="#" class="carrito-icono"><i class="fa fa-shopping-cart"></i>
    <span id="contador-carrito" class="contador-carrito">0</span>
</a>

      </nav>
    </header>

    <nav class="navegacion">
      <a class="navegacion__enlace navegacion__enlace--activo" href="index.html"
        >Tienda</a
      >
      <a class="navegacion__enlace" href="nosotros.html">Nosotros</a>
    </nav>

    <main class="contenedor">
      <h1>Nuestros Productos</h1>
      <div class="grid">
        <div class="producto" data-id="1" data-nombre="VueJS" data-precio="25000">
          <a href="producto.php?id=1&nombre=VueJS&precio=25000">
            <img class="producto__imagen" src="img/1.jpg" alt="imagen camisa VueJS" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">VueJS</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto" data-id="2" data-nombre="AngularJS" data-precio="45000">
          <a href="producto.php?id=2&nombre=AngularJS&precio=45000">
            <img class="producto__imagen" src="img/2.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">AngularJS</p>
            <p class="producto__precio">$45.000</p>
          </div>
        </div>

        <div class="producto" data-id="3" data-nombre="ReactJS" data-precio="75000">
          <a href="producto.php?id=3&nombre=ReactJS&precio=75000">
            <img class="producto__imagen" src="img/3.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">ReactJS</p>
            <p class="producto__precio">$75.000</p>
          </div>
        </div>

        <div class="producto" data-id="4" data-nombre="Redux" data-precio="40000">
          <a href="producto.php?id=4&nombre=Redux&precio=40000">
            <img class="producto__imagen" src="img/4.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">Redux</p>
            <p class="producto__precio">$40.000</p>
          </div>
        </div>

        <div class="producto" data-id="5" data-nombre="NodeJS" data-precio="140000">
          <a href="producto.php?id=5&nombre=NodeJS&precio=140000">
            <img class="producto__imagen" src="img/5.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">NodeJS</p>
            <p class="producto__precio">$140.000</p>
          </div>
        </div>

        <div class="producto" data-id="6" data-nombre="SASS" data-precio="80000">
          <a href="producto.php?id=6&nombre=SASS&precio=80000">
            <img class="producto__imagen" src="img/6.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">SASS</p>
            <p class="producto__precio">$80.000</p>
          </div>
        </div>

        <div class="producto" data-id="7" data-nombre="HTML5" data-precio="30000">
          <a href="producto.php?id=7&nombre=HTML5&precio=30000">
            <img class="producto__imagen" src="img/7.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">HTML5</p>
            <p class="producto__precio">$30.000</p>
          </div>
        </div>

        <div class="producto" data-id="8" data-nombre="Github" data-precio="90000">
          <a href="producto.php?id=8&nombre=Github&precio=90000">
            <img class="producto__imagen" src="img/8.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">Github</p>
            <p class="producto__precio">$90.000</p>
          </div>
        </div>

        <div class="producto" data-id="9" data-nombre="BulmaCSS" data-precio="300000">
          <a href="producto.php?id=9&nombre=BulmaCSS&precio=300000">
            <img class="producto__imagen" src="img/9.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">BulmaCSS</p>
            <p class="producto__precio">$300.000</p>
          </div>
        </div>

        <div class="producto" data-id="10" data-nombre="Typescript" data-precio="50000">
          <a href="producto.php?id=10&nombre=Typescript&precio=50000">
            <img
              class="producto__imagen"
              src="img/10.jpg"
              alt="imagen camisa"
            />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">Typescript</p>
            <p class="producto__precio">$50.000</p>
          </div>
        </div>

        <div class="producto" data-id="11" data-nombre="Drupal" data-precio="25000">
          <a href="producto.php?id=11&nombre=Drupal&precio=25000">
            <img
              class="producto__imagen"
              src="img/11.jpg"
              alt="imagen camisa"
            />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">Drupal</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto" data-id="12" data-nombre="Javascript" data-precio="15000">
          <a href="producto.php?id=12&nombre=Javascript&precio=15000">
            <img
              class="producto__imagen"
              src="img/12.jpg"
              alt="imagen camisa"
            />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">Javascript</p>
            <p class="producto__precio">$15.000</p>
          </div>
        </div>

        <div class="producto" data-id="13" data-nombre="GraphQL" data-precio="17000">
          <a href="producto.php?id=13&nombre=GraphQL&precio=17000">
            <img
              class="producto__imagen"
              src="img/13.jpg"
              alt="imagen camisa"
            />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">GraphQL</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto" data-id="14" data-nombre="Wordpress" data-precio="25000">
          <a href="producto.php?id=14&nombre=Wordpress&precio=25000">
            <img
              class="producto__imagen"
              src="img/14.jpg"
              alt="imagen camisa"
            />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">Wordpress</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>
      </div>
      <!-- .grid -->

      <div class="grafico grafico--camisas"></div>
      <div class="grafico grafico--node"></div>
    </main>

    <div id="carrito-lateral" class="carrito-lateral">
    <div class="carrito-header">
        <h2>Tu Carrito</h2>
        <button id="cerrar-carrito" class="cerrar-carrito">&times;</button>
    </div>
    <div class="carrito-contenedor" id="carrito-contenido">
        <?php
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $producto) {
                echo "<div class='producto-carrito'>";
                echo "<img class='producto-carrito__imagen' src='img/" . htmlspecialchars($producto['producto_id']) . ".jpg' alt='Imagen de " . htmlspecialchars($producto['producto_nombre']) . "'>";
                echo "<p class='producto-carrito__nombre'>" . htmlspecialchars($producto['producto_nombre']) . "</p>";
                echo "<p class='producto-carrito__precio'>Precio unitario: $" . htmlspecialchars(number_format($producto['producto_precio'])) . "</p>";
                echo "<p class='producto-carrito__cantidad'>Cantidad: " . htmlspecialchars($producto['cantidad']) . "</p>";
                echo "<p class='producto-carrito__total'>Total: $" . htmlspecialchars(number_format($producto['cantidad'] * $producto['producto_precio'])) . "</p>";
                echo "<button class='eliminar-producto' data-index='" . $index . "'>Eliminar</button>";
                echo "</div>";
            }
        } else {
            echo "<p>El carrito está vacío.</p>";
        }
        ?>
    </div>
    <div class="carrito-footer">
        <p id="total-compra"></p>
        <button class="comprar-btn">Proceder al Pago</button>
    </div>
</div>

    <div class="carrito-footer">
        <p id="total-compra"></p>
        <button class="comprar-btn">Proceder al Pago</button>
    </div>
</div>

    <div class="carrito-footer">
        <button class="comprar-btn">Proceder al Pago</button>
    </div>
  </div>

    <!-- Fondo oscurecido al abrir el carrito -->
    <div id="overlay" class="overlay"></div>

    <!-- Modal de Iniciar Sesión -->
    <div id="modal-login" class="modal">
      
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Iniciar Sesión</h2>
        <form id="login-form">
          <input
            type="email"
            placeholder="Correo electrónico"
            id="login-email"
            required
          />
          <input
            type="password"
            placeholder="Contraseña"
            id="login-password"
            required
          />
          <button type="submit" id="btn-login">Iniciar Sesión</button>
          <button type="button" id="btn-cancelar-login" class="btn-cancelar">
            Salir
          </button>
          <!-- Botón de salir -->
        </form>
        <p>
          ¿No tienes cuenta? <a href="#" id="btn-register">Regístrate aquí</a>
        </p>
      </div>
    </div>

    <!-- Modal de Registro -->
    <div id="modal-register" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Registro</h2>
        <form id="register-form">
          <input
            type="email"
            placeholder="Correo electrónico"
            id="register-email"
            required
          />
          <input
            type="password"
            placeholder="Contraseña"
            id="register-password"
            required
          />
          <button type="submit" id="btn-register">Registrarse</button>
          <button type="button" id="btn-cancelar-register" class="btn-cancelar">
            Salir
          </button>

          <!-- Botón de salir -->
        </form>
      </div>
    </div>

    <footer class="footer">
      <p class="footer__texto">Front End Store © Todos los derechos 2024</p>
    </footer>
  </body>
  <script src="JS/script.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const contadorCarrito = document.getElementById("contador-carrito");

        <?php if (isset($_SESSION['carrito'])): ?>
            let totalProductos = 0;
            <?php foreach ($_SESSION['carrito'] as $producto): ?>
                totalProductos += <?php echo $producto['cantidad']; ?>;
            <?php endforeach; ?>
            contadorCarrito.textContent = totalProductos;
        <?php endif; ?>
    });
</script>
</html>