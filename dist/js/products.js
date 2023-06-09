const productsBox = document.querySelector('#products');



// Get the products from the database
const getProducts = async () => {
    const res = await fetch("../src/api/product/read.php");
    const data = await res.json()
    return data;
};

// Get the product images from the database
const getProductImages = async (p_id) => {
    const res = await fetch(`../src/api/product/read_img.php?p_id=${p_id}`);
    const data = await res.json()
    return data.photo;
};

// afficher les images de chaque produit
const displayProductImages = async (p_id) => {
    const productImage = await getProductImages(p_id);
    const img = `
        <img class="h-full" src="../dist/images/product/homme/${productImage}" alt="${productImage}">
    `
    return img;
};


// Display the products
const displayProducts = async () => {
    const products = await getProducts();
    products.forEach(async product => {

        const article = document.createElement('article');
        article.classList.add('flex', 'flex-col', 'max-sm:basis-1', 'py-3', 'space-y-2', 'bg-slate-100');
        article.innerHTML = `
                <article class="flex flex-col max-sm:basis-1 py-3 px-2 space-y-2 bg-slate-100">
                <h3 class=""><a href="">${product.p_id}</a></h3>
                <div class="flex justify-center h-56">
                    ${await displayProductImages(product.p_id)}
                </div>
                <div class="">
                    <h4>Description</h4>
                    <p class="break-words text-sm">${product.p_short_description.slice(0, 50)}</p>
                </div>
                <div class="flex justify-center">
                    <h4 class="underline">Price :</h4>
                    <span class="text-sm pl-2 pt-0.5">${product.p_current_price}$</span>
                </div>
                <!-- Ajouter un boutton pour afficher le produit clicker -->
                <div class="">
                    <button class="bg-green-300 py-1 px-2 max-md:text-sm ">Ajouter au panier</button>
                </div>
            </article>
        `
        productsBox.appendChild(article);
    });
};

displayProducts();