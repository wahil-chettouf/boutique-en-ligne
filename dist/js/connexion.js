const registerForm = document.querySelector('#connectionForm');

connectionForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(connectionForm);

    fetch("../src/api/connexion.php", {
        method: "POST", 
        body: formData,
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        process_data(data)
    })

    .catch(error => console.log(error))
});

const process_data = (data) => {
    // Reset errors
    const error = document.querySelector("#error");
    error.innerText = "";
    
    const errors = document.querySelectorAll('.text-red-600');
    errors.forEach(error => error.innerText = "");

    if("success" in data) {
        window.location.href = "../index.html";
    } else {
        for(const [key, value] of Object.entries(data)) {
            if(value == "") continue;
            const error = document.querySelector(`#${key}`);
            error.innerText += value;
        }
    }
};