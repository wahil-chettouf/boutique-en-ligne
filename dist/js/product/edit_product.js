const productId = window.location.href.split('?')[1].split('=')[1];
const updateProductForm = document.querySelector('#updateProductForm');
const updateProductBtn = document.querySelector('#updateProductBtn');

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
    }
};

updateProductBtn.addEventListener('click', (e) => {
    e.preventDefault();
    updateProduct();
});