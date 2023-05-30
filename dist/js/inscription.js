const registerForm = document.querySelector('#registerForm');

registerForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(registerForm);

    fetch('../src/api/inscription.php', {
        method: "POST", 
        body: formData,
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        process_data(data);
    })

    .catch(error => console.log(error));
});

const process_data = (data) => {
    console.log(typeof data);
    if("success" in data) {
        window.location.href = "connexion.html";
    } else {
        const error = document.querySelector('#error');
        for(const [key, value] of Object.entries(data)) {
            error.innerHTML += value + "<br>";
        }
    }
};