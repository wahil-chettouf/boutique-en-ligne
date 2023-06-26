const btnMenu = document.querySelector('#btnMenu');
const navMenu = document.querySelector('#navMenu');

btnMenu.addEventListener('click', () => {
    navMenu.classList.toggle('max-md:hidden');
});