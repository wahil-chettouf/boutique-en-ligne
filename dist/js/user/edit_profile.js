const fullNameBtn = document.getElementById('fullNameBtn');
const phoneBtn = document.getElementById('phoneBtn');
const emailBtn = document.getElementById('emailBtn');
const passwordBtn = document.getElementById('passwordBtn');
//const addressBtn = document.getElementById('addressBtn');

const fullNameForm = document.querySelector('#fullNameForm');
const phoneForm = document.getElementById('phoneForm');
const emailForm = document.getElementById('emailForm');
const passwordForm = document.getElementById('passwordForm');
//const addressForm = document.getElementById('addressForm');

fullNameBtn.addEventListener('click', async (e) => {
    e.preventDefault();

    // Mettre à jour le nom complet
    await updateFullName();
});

const updateFullName = async () => {
    // Vide les messages d'erreur
    removeErrors();
    removeSuccess();

    const formData = new FormData(fullNameForm);
    const requestOption = {
        method: 'POST',
        body: formData
    };

    const response = await fetch('../../src/api/user/profile/profile.php', requestOption)

    const data = await response.json();
    if(data.success){
        const name = Object.keys(data.message)[0];
        const successMessage = data.message[name];
        displaySuccessMessage(name, successMessage);
    } else {
        const name = Object.keys(data.error)[0];
        const errorMessage = data.error[name];
        displayError(name, errorMessage);
    }
};

// Créer une function qui afficher l'erreur dans le formulaire de modification du nom complet
const displayError = (name, errorMessage) => {
    const errorSpan = document.getElementById(name + "_err");
    errorSpan.innerText = errorMessage;
};

const displaySuccessMessage = (name, successMessage) => {
    const successSpan = document.getElementById(name + "_success");
    successSpan.innerText = successMessage;
};

// function pour supprimer les messages d'erreur
const removeErrors = () => {
    const errorSpan = document.querySelectorAll('.error');
    errorSpan.forEach(span => {
        span.innerText = "";
    });
};

// function pour supprimer les messages de succès
const removeSuccess = () => {
    const successSpan = document.querySelectorAll('.success');
    successSpan.forEach(span => {
        span.innerText = "";
    });
};