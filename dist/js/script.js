const btnMenu = document.querySelector('#btnMenu');
const navMenu = document.querySelector('#navMenu');

btnMenu.addEventListener('click', () => {
    navMenu.classList.toggle('max-md:hidden');
});


// Créer une function qui afficher l'erreur dans le formulaire de modification du nom complet
const displayError = (errors) => {
    // Boucle sur les erreurs
    for(const [error, value] of Object.entries(errors)) {
        const errorSpan = document.getElementById(error + "_err");
        errorSpan.innerText = value;
    }
};

const displaySuccessMessage = (messages) => {
    //console.log(messages);
    // Boucle sur les messages de succès
    for(const [key, value] of Object.entries(messages)) {
        const successSpan = document.getElementById(key + "_success");
        successSpan.innerText = value;
    }
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

const updateProfile = async (form) => {
    // Vide les messages d'erreur
    removeErrors();
    removeSuccess();

    const requestOption = {
        method: 'POST',
        body: form
    };

    const response = await fetch('../../src/api/user/profile/profile.php', requestOption)

    const data = await response.json();

    displayError(data.error);
    displaySuccessMessage(data.message);

    if(data.success) {
        if(data.notification) { 
            console.log(data.notification);
            alert(data.notification);
            window.location.href = "./profile.php";
        }
    } else {
    }
};