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
          <a href="#" class="header__link" id="btn-login">Mi cuenta</a>
          <a href="#" class="header__link" id="btn-login-icon">
            <i class="fa fa-user"></i>
          </a>
        <?php endif; ?>
        <a href="#" class="header__link"><i class="fa fa-shopping-cart"></i></a>
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
        <div class="producto">
          <a href="producto.html">
            <img class="producto__imagen" src="img/1.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">VueJS</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto">
          <a href="producto.html">
            <img class="producto__imagen" src="img/2.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">AngularJS</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto">
          <a href="producto.html">
            <img class="producto__imagen" src="img/3.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">ReactJS</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto">
          <a href="producto.html">
            <img class="producto__imagen" src="img/4.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">Redux</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto">
          <a href="producto.html">
            <img class="producto__imagen" src="img/5.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">NodeJS</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto">
          <a href="producto.html">
            <img class="producto__imagen" src="img/6.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">SASS</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto">
          <a href="producto.html">
            <img class="producto__imagen" src="img/7.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">HTML5</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto">
          <a href="producto.html">
            <img class="producto__imagen" src="img/8.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">Github</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto">
          <a href="producto.html">
            <img class="producto__imagen" src="img/9.jpg" alt="imagen camisa" />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">BulmaCSS</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto">
          <a href="producto.html">
            <img
              class="producto__imagen"
              src="img/10.jpg"
              alt="imagen camisa"
            />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">Typescript</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto">
          <a href="producto.html">
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

        <div class="producto">
          <a href="producto.html">
            <img
              class="producto__imagen"
              src="img/12.jpg"
              alt="imagen camisa"
            />
          </a>
          <div class="producto__informacion">
            <p class="producto__nombre">Javascript</p>
            <p class="producto__precio">$25.000</p>
          </div>
        </div>

        <div class="producto">
          <a href="producto.html">
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

        <div class="producto">
          <a href="producto.html">
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
</html>