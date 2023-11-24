document.addEventListener('DOMContentLoaded', function () {
    const navbarToggler = document.getElementById('navbar-toggler');
    const navbar = document.getElementById('navbar');

    navbarToggler.addEventListener('click', function () {
        navbar.classList.toggle('active');

        if (navbar.classList.contains('active')) {
            // Muestra el menú debajo de la barra de navegación
            navbar.style.position = 'static';
            navbar.style.top = '10px'; // Ajusta según la altura de tu barra de navegación

        } else {
            // Oculta el menú y restablece la posición
            navbar.style.position = '';
            navbar.style.top = '';
        }
    });

    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(function (dropdown) {
        const dropdownContent = dropdown.querySelector('.dropdown-content');
        dropdown.addEventListener('click', function () {
            const isDropdownVisible = dropdownContent.style.display === 'block';
            dropdownContent.style.display = isDropdownVisible ? 'none' : 'block';
        });
    });
});
