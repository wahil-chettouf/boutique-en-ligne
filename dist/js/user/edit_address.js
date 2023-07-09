const addressId = window.location.href.split('?')[1].split('=')[1];
const updateAddressBtn = document.querySelector('#updateAddressBtn');
const updateAddressForm = document.querySelector('#formUpdateAddress');

const getAddressInfo = async () => {
    const response = await fetch("../../src/api/user/address/address.php?id=" + addressId, {
        method: "GET",
    });

    const data = await response.json();
    console.log(data);
    if (data.success) {
        //console.log(data.product);
        fillForm(data.address);
    } else {
        console.log("error")
    }
}
getAddressInfo();

// Créer une function qui prendre en paramètre un objet, la function va remplire la formulaire avec le paramètre (product)
const fillForm = (address) => {
    // creer des constantes pour chaque input du formulaire
    const address_line_1 = document.querySelector(`input[name="address_line_1"]`);
    const address_line_2 = document.querySelector(`input[name="address_line_2"]`);
    const city = document.querySelector(`input[name="city"]`);
    const state = document.querySelector(`input[name="state"]`);
    const zip_code = document.querySelector(`input[name="zip_code"]`);
    const country = document.querySelector(`input[name="country"]`);

    // remplir les inputs avec les valeurs de l'objet
    address_line_1.value = address.address_line_1;
    address_line_2.value = address.address_line_2;
    city.value = address.city;
    state.value = address.state;
    zip_code.value = address.zip_code;
    country.value = address.country;
};

// Créer une function qui va envoyer les données du formulaire au serveur
const updateAddress = async () => {
    // Vide les erreurs
    cleanErrors();

    const formData = new FormData(updateAddressForm);
    const requestOption = {
        method: 'POST',
        body: formData,
    };

    const response = await fetch(`../../src/api/user/address/address.php?p_id=${productId}`, requestOption);

    const data = await response.json();
    if (data.status === 'success') {
        console.log(data);
        //window.location.href = './product_manager.php';
        displayError(data.errors);

        // Afficher des messages de success
        displaySuccessMessage(data.messages);
        
        // remplir les inputs avec les valeurs de l'objet
        getProductInfo();
        //fillForm(data.product);
    } else {
        alert(data.error);
    }
};

updateAddressBtn.addEventListener('click', async (e) => {
    e.preventDefault();
    await updateProduct();
});


// Créer une function qui va vider les erreurs
const cleanErrors = () => {
    const errorsSpan = document.querySelectorAll('.error');
    errorsSpan.forEach(error => {
        error.textContent = '';
    });
}