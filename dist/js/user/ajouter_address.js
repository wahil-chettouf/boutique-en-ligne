const btnNewAddress = document.querySelector('#btnNewAddress');
const formNewAddress = document.querySelector('#formNewAddress');

btnNewAddress.addEventListener('click', (e) => {
    e.preventDefault();
    const formData = new FormData(formNewAddress);

    addAddress(formData);
});


const addAddress = async (form) => {
    // Vide les messages d'erreur
    removeErrors();
    removeSuccess();

    const requestOption = {
        method: 'POST',
        body: form
    };

    const response = await fetch('../../src/api/user/address/address.php', requestOption)

    const data = await response.json();

    displayError(data.errors);
    //displaySuccessMessage(data.messages);

    if(data.success) {
        if(data.notification) { 
            alert(data.notification);
            window.location.href = "./address.php";
        }
    } else {
    }
};