const fullNameBtn = document.getElementById('fullNameBtn');
const phoneBtn = document.getElementById('phoneBtn');
const emailBtn = document.getElementById('emailBtn');
//const addressBtn = document.getElementById('addressBtn');

const fullNameForm = document.querySelector('#fullNameForm');
const phoneForm = document.getElementById('phoneForm');
const emailForm = document.getElementById('emailForm');
//const addressForm = document.getElementById('addressForm');

fullNameBtn.addEventListener('click', async (e) => {
    e.preventDefault();
    const formData = new FormData(fullNameForm);
    // Mettre à jour le nom complet
    await updateProfile(formData);
});

phoneBtn.addEventListener('click', async (e) => {
    e.preventDefault();
    const formData = new FormData(phoneForm);
    // Mettre à jour le nom complet
    await updateProfile(formData);
});

emailBtn.addEventListener('click', async (e) => {
    e.preventDefault();
    const formData = new FormData(emailForm);
    // Mettre à jour le nom complet
    await updateProfile(formData);
});
