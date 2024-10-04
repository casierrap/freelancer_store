// Obtener elementos del DOM
const loginModal = document.getElementById('modal-login');  // Modal de inicio de sesión
const registerModal = document.getElementById('modal-register');  // Modal de registro
const loginBtn = document.getElementById('btn-login');  // Botón para abrir el modal de login
const registerBtn = document.getElementById('btn-register');  // Botón para abrir el modal de registro
const closeBtns = document.querySelectorAll('.close');  // Botones de cerrar modal

// Abrir modal de login al hacer clic en el botón "Mi cuenta"
loginBtn.addEventListener('click', function() {
    loginModal.style.display = 'flex';  // Muestra el modal de inicio de sesión
});

// Abrir modal de registro al hacer clic en el botón "Regístrate aquí"
registerBtn.addEventListener('click', function() {
    registerModal.style.display = 'flex';  // Muestra el modal de registro
});

// Cerrar los modales al hacer clic en los botones de cerrar (X)
closeBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        loginModal.style.display = 'none';  // Oculta el modal de login
        registerModal.style.display = 'none';  // Oculta el modal de registro
    });
});

// Cerrar los modales al hacer clic fuera del contenido
window.addEventListener('click', function(e) {
    if (e.target === loginModal) {
        loginModal.style.display = 'none';  // Oculta el modal de login si se hace clic fuera de él
    }
    if (e.target === registerModal) {
        registerModal.style.display = 'none';  // Oculta el modal de registro si se hace clic fuera de él
    }
});

// Eliminar código repetido para abrir modales de login y registro
document.getElementById('btn-login').addEventListener('click', function() {
    loginModal.style.display = 'flex';  // Muestra el modal de login
});

document.getElementById('btn-register').addEventListener('click', function() {
    registerModal.style.display = 'flex';  // Muestra el modal de registro
});

// Cerrar los modales al hacer clic en los botones de cerrar (X)
document.querySelectorAll('.close').forEach(function(closeBtn) {
    closeBtn.addEventListener('click', function() {
        closeBtn.closest('.modal').style.display = 'none';  // Cierra el modal asociado al botón de cierre
    });
});

// Cerrar modal de login al hacer clic en el botón "Cancelar" dentro del modal
document.getElementById('btn-cancelar-login').addEventListener('click', function() {
    loginModal.style.display = 'none';  // Oculta el modal de login
});

// Cerrar modal de registro al hacer clic en "Cancelar" y redirigir al inicio
document.getElementById('btn-cancelar-register').addEventListener('click', function() {
    registerModal.style.display = 'none';  // Oculta el modal de registro
    window.location.href = 'index.php';  // Redirige a la página principal
});

// Cerrar los modales al hacer clic en la 'X'
document.querySelectorAll('.close').forEach(function(closeBtn) {
    closeBtn.addEventListener('click', function() {
        closeBtn.closest('.modal').style.display = 'none';  // Cierra el modal correspondiente
    });
});

// Al cargar el DOM, obtener y manejar elementos
document.addEventListener('DOMContentLoaded', () => {
  const modalLogin = document.getElementById('modal-login');  // Modal de inicio de sesión
  const modalRegister = document.getElementById('modal-register');  // Modal de registro
  const btnLogin = document.getElementById('btn-login');  // Botón para abrir modal de login
  const btnRegister = document.getElementById('btn-register');  // Botón para abrir modal de registro
  const btnCloseModal = document.querySelectorAll('.close');  // Botones de cierre de modales
  const registerForm = document.getElementById('register-form');  // Formulario de registro
  const departmentSelect = document.getElementById('register-department');  // Select de departamentos
  const citySelect = document.getElementById('register-city');  // Select de ciudades
  const captchaInput = document.getElementById('captcha');  // Input para el captcha

  // Mapa de departamentos a ciudades principales
  const departmentCities = {
    "Amazonas": ["Leticia"],
    "Antioquia": ["Medellín", "Bello", "Itagüí", "Envigado", "Rionegro"],
    // Mapa completo con departamentos y ciudades
  };

  // Función para abrir un modal
  const openModal = (modal) => {
    modal.style.display = 'block';  // Muestra el modal
  };

  // Función para cerrar un modal
  const closeModal = (modal) => {
    modal.style.display = 'none';  // Oculta el modal
  };

  // Abrir modal de registro
  document.getElementById('btn-register').addEventListener('click', () => {
    openModal(modalRegister);  // Abre el modal de registro
  });

  // Abrir modal de login
  document.getElementById('btn-login').addEventListener('click', () => {
    openModal(modalLogin);  // Abre el modal de inicio de sesión
  });

  // Cerrar modales al hacer clic en la 'X'
  btnCloseModal.forEach(btn => {
    btn.addEventListener('click', () => {
      btn.parentElement.parentElement.style.display = 'none';  // Cierra el modal
    });
  });

  // Cerrar modales al hacer clic fuera del contenido
  window.addEventListener('click', (event) => {
    if (event.target == modalLogin) {
      closeModal(modalLogin);  // Cierra el modal de login si se hace clic fuera
    }
    if (event.target == modalRegister) {
      closeModal(modalRegister);  // Cierra el modal de registro si se hace clic fuera
    }
  });

  // Función para poblar el select de ciudades basado en el departamento seleccionado
  const populateCities = () => {
    const selectedDepartment = departmentSelect.value;
    const cities = departmentCities[selectedDepartment] || [];

    // Limpiar opciones actuales
    citySelect.innerHTML = '<option value="">Selecciona una ciudad</option>';

    // Agregar nuevas opciones
    cities.forEach(city => {
      const option = document.createElement('option');
      option.value = city;
      option.textContent = city;
      citySelect.appendChild(option);
    });
  };

  // Event listener para cambiar departamento y actualizar ciudades
  departmentSelect.addEventListener('change', populateCities);

  // Función para validar el formulario de registro
  const validateRegisterForm = () => {
    const password = document.getElementById('register-password').value;
    const confirmPassword = document.getElementById('register-confirm-password').value;
    const captcha = captchaInput.value.trim();

    // Validar que las contraseñas coincidan
    if (password !== confirmPassword) {
      alert('Las contraseñas no coinciden.');
      return false;
    }

    // Validar captcha
    if (captcha !== '7') {
      alert('Respuesta incorrecta al captcha.');
      return false;
    }

    return true;
  };

  // Manejar el envío del formulario de registro
  const handleRegister = async (e) => {
    e.preventDefault();

    if (!validateRegisterForm()) {
      return;
    }

    const formData = new FormData(registerForm);

    try {
      const response = await fetch('register.php', {
        method: 'POST',
        body: formData
      });

      const result = await response.json();

      if (result.success) {
        alert('Registro exitoso. Puedes iniciar sesión ahora.');
        closeModal(modalRegister);  // Cierra el modal de registro
        registerForm.reset();  // Resetea el formulario
      } else {
        alert(`Error: ${result.message}`);
      }
    } catch (error) {
      console.error('Error en la solicitud:', error);
      alert('Ocurrió un error al procesar el registro. Por favor, intenta nuevamente.');
    }
  };

  // Event listener para el formulario de registro
  registerForm.addEventListener('submit', handleRegister);
});
