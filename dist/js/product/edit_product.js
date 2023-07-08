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
    // Récupérer le fichier de l'image
    const p_featured_photo_file = formData.get('p_featured_photo');

    // Supprimez le champ de fichier de l'objet formData
    formData.delete('p_featured_photo');

    console.log(p_featured_photo_file);
    const dataForm = {
        p_name: formData.get('p_name'),
        p_current_price: formData.get('p_current_price'),
        p_stock: formData.get('p_stock'),
        p_description: formData.get('p_description'),
        p_short_description: formData.get('p_short_description'),
        p_featured_photo: p_featured_photo_file,
        p_feature: formData.get('p_feature'),
        ecat_id: formData.get('ecat_id'),
    }

    const requestOption = {
        method: 'PUT',
        body: formData,
    };

    // Ajouter le champ d'image séparément au formData
    if(p_featured_photo_file.name) {
        formData.append('p_featured_photo', p_featured_photo_file);
    }
    
    const response = await fetch(`../../src/api/product/product.php?p_id=${productId}`, requestOption);

    const data = await response.json();
    if (data.status === 'success') {
        console.log(data);
        //window.location.href = './product_manager.php';
        displayError(data.errors);
        
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