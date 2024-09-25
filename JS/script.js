const faders = document.querySelectorAll(".fade-in");
const appearOptions = {
    threshold: 0.1,
};

const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            return;
        } else {
            entry.target.classList.add('appear');
            appearOnScroll.unobserve(entry.target);
        }
    });
}, appearOptions);
faders.forEach(fader => {
    appearOnScroll.observe(fader);
});

document.getElementById("btn-login").addEventListener("click", openLoginModal);
document.getElementById("btn-login-icon").addEventListener("click", openLoginModal);

function openLoginModal() {
    document.getElementById("modal-login").style.display = "flex";
}

document.querySelectorAll('.close').forEach(closeBtn => {
    closeBtn.addEventListener('click', closeModals);
});

// Cerrar modales al hacer clic fuera del contenido
window.addEventListener('click', function(event) {
    const modalLogin = document.getElementById('modal-login');
    const modalRegister = document.getElementById('modal-register');

    if (event.target === modalLogin) {
        modalLogin.style.display = 'none';
    }
    if (event.target === modalRegister) {
        modalRegister.style.display = 'none';
    }
});

// Cerrar modal con tecla Escape
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModals();
    }
});

function closeModals() {
    document.getElementById("modal-login").style.display = "none";
    document.getElementById("modal-register").style.display = "none";
}

document.getElementById("btn-register").addEventListener("click", function() {
    document.getElementById("modal-login").style.display = "none";
    document.getElementById("modal-register").style.display = "flex";
});

//   inicio de sesión modificado para enviar datos a login.php 
document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault();
    
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;

    // Enviar los datos a login.php para verificar las credenciales
    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Inicio de sesión exitoso');
            closeModals();
            //  redirigir al usuario a otra página 
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});

// ** Lógica de registro modificada para enviar datos a register.php **
document.getElementById("register-form").addEventListener("submit", function(event) {
    event.preventDefault();

    const email = document.getElementById('register-email').value;
    const password = document.getElementById('register-password').value;

    // Enviar los datos a register.php para registrar al usuario
    fetch('register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Registro exitoso');
            closeModals();
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});

//Agregar productos al carrito
let carrito = [];

document.querySelectorAll('.agregar-carrito').forEach(button => {
    button.addEventListener('click', agregarAlCarrito);
});

function agregarAlCarrito(e) {
    const button = e.target;
    const producto = {
        id: button.dataset.id,
        nombre: button.dataset.nombre,
        precio: parseFloat(button.dataset.precio),
        talla: button.dataset.talla,
        color: button.dataset.color
    };

    carrito.push(producto);
    actualizarCarrito();
}

function actualizarCarrito() {
    const listaCarrito = document.getElementById("lista-carrito");
    listaCarrito.innerHTML = '';

    let total = 0;

    carrito.forEach(producto => {
        const productoHTML = `
            <div>
                ${producto.nombre} - ${producto.talla} - ${producto.color} - $${producto.precio}
            </div>
        `;
        listaCarrito.innerHTML += productoHTML;
        total += producto.precio;
    });

    document.getElementById("total").textContent = `$${total}`;
}
