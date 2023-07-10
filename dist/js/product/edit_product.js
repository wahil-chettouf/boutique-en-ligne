const productId = window.location.href.split('?')[1].split('=')[1];
const updateProductBtn = document.querySelector('#updateProductBtn');
const updateProductForm = document.querySelector('#updateProductForm');

const getProductInfo = async () => {
    const response = await fetch("../../src/api/product/product.php?p_id=" + productId, {
        method: "GET",
    });

    const data = await response.json();
    if (data.status === 'success') {
        //console.log(data.product);
        fillForm(data.product);
    } else {
        console.log("error")
    }
}
getProductInfo();

// Créer une function qui prendre en paramètre un objet, la function va remplire la formulaire avec le paramètre (product)
const fillForm = (product) => {
    // creer des constantes pour chaque input du formulaire
    const p_name = document.querySelector(`input[name="p_name"]`);
    const p_current_price = document.querySelector(`input[name="p_current_price"]`);
    const p_stock = document.querySelector(`input[name="p_stock"]`);
    const p_description = document.querySelector(`textarea[name="p_description"]`);
    const p_short_description = document.querySelector(`textarea[name="p_short_description"]`);
    const p_featured_photo = document.querySelector(`input[name="p_featured_photo"]`);
    const p_feature = document.querySelector(`input[name="p_feature"]`);

    // remplir les inputs avec les valeurs de l'objet
    p_name.value = product.p_name;
    p_current_price.value = product.p_current_price;
    p_stock.value = product.p_stock;
    p_description.value = product.p_description;
    p_short_description.value = product.p_short_description;

    // selectionner la catégorie du produit
    const cat = product.ecat_id == 1 ? "homme" : "femme";
    const ecat_id = document.querySelector(`input[value="${cat}"]`).checked = true;
};

// Créer une function qui va envoyer les données du formulaire au serveur
const updateProduct = async () => {
    // Vide les erreurs
    cleanErrors();

    const formData = new FormData(updateProductForm);
    const requestOption = {
        method: 'POST',
        body: formData,
    };

    const response = await fetch(`../../src/api/product/product.php?p_id=${productId}`, requestOption);

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

updateProductBtn.addEventListener('click', async (e) => {
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

const displayError = (errors) => {
    // parcourir l'objet errors
    for (const [key, value] of Object.entries(errors)) {
        const spanError = document.getElementById(key + "_error");
        spanError.textContent = value;
        //console.log(spanError);
    }
};

const displaySuccessMessage = (messages) => {
    // parcourir l'objet messages
    for (const [key, value] of Object.entries(messages)) {
        const spanError = document.getElementById(key + "_success");
        spanError.textContent = value;
    }
};