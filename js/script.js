const menuToggle = document.querySelector('.menu-toggle');
const navbar = document.querySelector('.navbar ul');

menuToggle.addEventListener('click', () => {
    navbar.classList.toggle('active');
});