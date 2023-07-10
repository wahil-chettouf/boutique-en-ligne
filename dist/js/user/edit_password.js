const passwordBtn = document.getElementById('passwordBtn');
//const addressBtn = document.getElementById('addressBtn');
const passwordForm = document.getElementById('passwordForm');
//const addressForm = document.getElementById('addressForm');

passwordBtn.addEventListener('click', async (e) => {
    e.preventDefault();
    const formData = new FormData(passwordForm);
    // Mettre à jour le nom complet
    await updateProfile(formData);
});