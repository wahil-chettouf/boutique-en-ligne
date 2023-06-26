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
    article.classList.add('flex', 'flex-col', 'max-sm:basis-1', 'space-y-2', 'bg-slate-100', "justify-between");
        article.innerHTML = `
            <a href="../public/product.php?p_id=${product.p_id}">
                <div class="flex justify-center h-56">
                    ${await displayProductImages(product.p_id)}
                </div>
                
                <div class="flex flex-col justify-between px-1 pb-2">
                    <div class="flex justify-center">
                        <p class="text-xs ">${product.p_short_description.slice(0, 35)}</p>
                    </div>

                    <div class="flex justify-center font-black text-sm">
                        <h4 class="underline">EUR $</h4>
                        <span class="pl-2">${product.p_current_price}$</span>
                    </div>
                </div>
            </a>
        `
        productsBox.appendChild(article);
    });
};

displayProducts();