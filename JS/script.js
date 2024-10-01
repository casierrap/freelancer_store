document.getElementById('btn-login').addEventListener('click', function() {
    document.getElementById('modal-login').style.display = 'flex';
  });
  
  document.getElementById('btn-register').addEventListener('click', function() {
    document.getElementById('modal-register').style.display = 'flex';
  });
  
  // Para cerrar los modales
  document.querySelectorAll('.close').forEach(function(closeBtn) {
    closeBtn.addEventListener('click', function() {
      closeBtn.closest('.modal').style.display = 'none';
    });
  });
  // Función para cerrar el modal de login
document.getElementById('btn-cancelar-login').addEventListener('click', function() {
    document.getElementById('modal-login').style.display = 'none';
  });
  
 // Función para cerrar el modal de registro y redirigir al inicio
document.getElementById('btn-cancelar-register').addEventListener('click', function() {
    document.getElementById('modal-register').style.display = 'none';
    window.location.href = 'index.html';  // Redirigir al inicio
  });
  
  // Opcional: también cerrar el modal al hacer clic en el botón de la 'x'
  document.querySelectorAll('.close').forEach(function(closeBtn) {
    closeBtn.addEventListener('click', function() {
      closeBtn.closest('.modal').style.display = 'none';
    });
  });
 
  

  document.getElementById('login-form').addEventListener('submit', function (e) {
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
          window.location.href = 'index.html'; // Redirigir si es exitoso
        }
      }
    };
    xhr.send(`email=${email}&password=${password}`);
  });
  