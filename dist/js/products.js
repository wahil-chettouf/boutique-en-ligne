const productsBox = document.querySelector('#products');

// Get the products from the database
const getProducts = async () => {
    const res = await fetch("../src/api/product/read.php");
    const data = await res.json()
    return data;
};

// Display the products
const displayProducts = async () => {
    const products = await getProducts();
    products.forEach(product => {
        const article = document.createElement('article');
        article.classList.add('flex', 'flex-col', 'max-sm:basis-1', 'py-3', 'space-y-2', 'bg-slate-100');
        article.innerHTML = `
                <article class="flex flex-col max-sm:basis-1 py-3 px-2 space-y-2 bg-slate-100">
                <h3 class=""><a href="">${product.p_name}</a></h3>
                <div class="flex justify-center h-56">
                    <img class="h-full" src="../dist/images/product/homme/img-h-1.jpg" alt="">
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