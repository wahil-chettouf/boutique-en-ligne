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
        console.log(data.product);
        fillForm(data.product);
    } else {
        console.log("error")
    }
}
getProductInfo();

// Créer une function qui prend en paramètre un objet et qui va remplir le formulaire depuis son paramètre (name)
const fillForm = (product) => {
    // faire une boucle sur de l'objet
    for(const [key, value] of Object.entries(product)) {
        const input = document.querySelector(`input[name=${key}]`);
        console.log(key, "input found");
        if(input) {
            input.value = value;
        } else {
            console.log(key, 'input not found');
        }
    }
};