document.addEventListener("DOMContentLoaded", function () {
  // Verificar que 'btn-login1' exista antes de agregar el evento
  const btnLogin1 = document.getElementById('btn-login1');
  if (btnLogin1) {
      btnLogin1.addEventListener('click', function () {
          document.getElementById('modal-login').style.display = 'flex';
      });
  }

  const btnRegister = document.getElementById('btn-register');
  if (btnRegister) {
      btnRegister.addEventListener('click', function () {
          document.getElementById('modal-register').style.display = 'flex';
      });
  }

  // Para cerrar los modales
  document.querySelectorAll('.close').forEach(function (closeBtn) {
      closeBtn.addEventListener('click', function () {
          closeBtn.closest('.modal').style.display = 'none';
      });
  });

  const btnCancelarLogin = document.getElementById('btn-cancelar-login');
  if (btnCancelarLogin) {
      btnCancelarLogin.addEventListener('click', function () {
          document.getElementById('modal-login').style.display = 'none';
      });
  }

  const btnCancelarRegister = document.getElementById('btn-cancelar-register');
  if (btnCancelarRegister) {
      btnCancelarRegister.addEventListener('click', function () {
          document.getElementById('modal-register').style.display = 'none';
          window.location.href = 'index.php';  // Redirigir al inicio
      });
  }

  // Formulario de inicio de sesión
  const loginForm = document.getElementById('login-form');
  if (loginForm) {
      loginForm.addEventListener('submit', function (e) {
          e.preventDefault(); // Evita el envío del formulario tradicional

          const email = document.getElementById('login-email').value;
          const password = document.getElementById('login-password').value;

          const xhr = new XMLHttpRequest();
          xhr.open('POST', 'login.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.onload = function () {
              if (this.status === 200) {
                  const response = JSON.parse(this.responseText);
                  alert(response.message);
                  if (response.success) {
                      window.location.href = 'index.php'; // Redirigir si es exitoso
                  }
              }
          };
          xhr.send(`email=${email}&password=${password}`);
      });
  }

  // Lógica para mostrar el carrito lateral
  const carritoIcono = document.querySelector(".carrito-icono");
  const carritoLateral = document.getElementById("carrito-lateral");
  const overlay = document.getElementById("overlay");
  const cerrarCarrito = document.getElementById("cerrar-carrito");

  // Debug para ver si los elementos críticos están disponibles
  console.log("Elementos críticos encontrados:",
      !!carritoIcono,
      !!carritoLateral,
      !!overlay,
      !!cerrarCarrito);

  if (carritoIcono && carritoLateral && overlay && cerrarCarrito) {
      // Mostrar carrito lateral al hacer clic en el icono del carrito
      carritoIcono.addEventListener("click", function () {
          console.log("Icono del carrito clickeado");
          carritoLateral.classList.add("mostrar");
          overlay.classList.add("mostrar");
      });

      // Ocultar carrito lateral al hacer clic en el botón de cerrar o en el overlay
      cerrarCarrito.addEventListener("click", function () {
          console.log("Cerrar carrito clickeado");
          carritoLateral.classList.remove("mostrar");
          overlay.classList.remove("mostrar");
      });

      overlay.addEventListener("click", function () {
          console.log("Overlay clickeado");
          carritoLateral.classList.remove("mostrar");
          overlay.classList.remove("mostrar");
      });
  } else {
      console.warn("No se encontraron todos los elementos críticos para el carrito lateral.");
  }
});
