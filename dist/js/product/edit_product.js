const productId = window.location.href.split('?')[1].split('=')[1];
const updateProductForm = document.querySelector('#updateProductForm');
const updateProductBtn = document.querySelector('#updateProductBtn');

const inputTest = document.querySelector(`input[name="p_name"]`);


const updateProduct = async () => {
    const formData = new FormData(updateProductForm);
    formData.append('p_id', productId);
    const response = await fetch("../../src/api/product/product.php", {
        method: 'PUT',
        body: formData
    });
    const data = await response.json();

    if (data.status === 'success') {
        console.log(data.status);
        window.location.href = './product_manager.php';
    } else {
        console.log("error")
    }
};

updateProductBtn.addEventListener('click', (e) => {
    e.preventDefault();
    updateProduct();
});

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

// Créer une function qui prend en paramètre un objet et qui va remplir le formulaire depuis son paramètre (name)
const fillForm = (product) => {
    // creer des constantes pour chaque input du formulaire
    const p_name = document.querySelector(`input[name="p_name"]`);
    const p_current_price = document.querySelector(`input[name="p_current_price"]`);
    const p_stock = document.querySelector(`input[name="p_stock"]`);
    const p_description = document.querySelector(`textarea[name="p_description"]`);
    const p_short_description = document.querySelector(`textarea[name="p_short_description"]`);
    const p_featured_photo = document.querySelector(`input[name="p_featured_photo"]`);
    const p_feature = document.querySelector(`input[name="p_feature"]`);
    const ecat_id = document.querySelector(`input[value="femme"]`);

    console.log(ecat_id);

    // remplir les inputs avec les valeurs de l'objet
    p_name.value = product.p_name;
    p_current_price.value = product.p_current_price;
    p_stock.value = product.p_stock;
    p_description.value = product.p_description;
    p_short_description.value = product.p_short_description;

    // pour l'image je pense qu'il faut demmander si on le modifie ou peut etre on ajoute d'aures images
    //p_featured_photo.value = product.p_featured_photo;

    p_feature.value = product.p_feature;
    
    // check le radio button qui a la valeur de l'objet ecate_id
    ecat_id.checked = true;


    // faire une boucle sur de l'objet
    // for(const [key, value] of Object.entries(product)) {
    //     //console.log(key);
    //     if(document.querySelector(`input[name=${key}]`)) {
    //         console.log(key, "input found");

    //         if(key === 'p_featured_photo') {

    //         } else if(key === 'ecat_id') {

    //         } else if(key === 'p_feature') {

    //         } else if(key === "p_description" || key === "p_short_description") {
    //             const textarea = document.querySelector(`textarea[name=${key}]`);
    //             textarea.value = value;
            
    //         } else {
    //             const input = document.querySelector(`input[name=${key}]`);
    //             input.value = value;
    //         }
    //     } else {
    //         //console.log(key, 'input not found');
    //     }
    // }
};