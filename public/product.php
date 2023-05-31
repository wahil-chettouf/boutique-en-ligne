<?php require_once '../src/classes/Utilisateurs.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../dist/style.css">
</head>
<body>
    <div class="app box-border">
        <?php require_once '../components/header.php'; ?>
        
        <div class="container px-2 mx-auto my-9">
            <div class="flex flex-col max-sm:space-y-3 justify-between w-full sm:flex-row sm:space-x-2 ">
                <section id="categories" class="sm:basis-1/4">
                    <div class="bg-red-100 py-2 text-center uppercase">
                        <h2 class="mb-2">categories :</h2>
                        <ul class="flex flex-col space-y-2">
                            <li class="">
                                <a href="">home</a>
                                <ul class="hidden">
                                    <li class="">
                                        <a href="">living room</a>
                                    </li>
                                    <li class="">
                                        <a href="">kitchen</a>
                                    </li>
                                    <li class="">
                                        <a href="">bathroom</a>
                                    </li>
                                    <li class="">
                                        <a href="">bedroom</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="">Femme</a>
                                <ul class="hidden">
                                    <li class="">
                                        <a href="">living room</a>
                                    </li>
                                    <li class="">
                                        <a href="">kitchen</a>
                                    </li>
                                    <li class="">
                                        <a href="">bathroom</a>
                                    </li>
                                    <li class="">
                                        <a href="">bedroom</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </section>

                <section id="" class="basis-3/4">
                    <div id="product" class="flex flex-col sm:px-1 space-y-3 text-center bg-white">
                        <h2 class="uppercase py-2 bg-red-100">produits :</h2>

                        <div class="grid gap-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                            <article class="flex flex-col max-sm:basis-1 py-3 space-y-2  bg-slate-100">
                                <h3 class=""><a href="">T-shirts</a></h3>
                                <div class="flex justify-center h-56">
                                    <img class="h-full" src="<?php echo $path?>/dist/images/product/homme/img-h-1.jpg" alt="">
                                </div>
                                <div class="">
                                    <h4>Description</h4>
                                    <p class="break-words max-lg:text-sm"></p>
                                </div>
                                <div class="flex justify-center">
                                    <h4 class="underline">Price :</h4>
                                    <span class="text-sm pl-2 pt-0.5">100€</span>
                                </div>
                                <!-- Ajouter un boutton pour afficher le produit clicker -->
                                <div class="">
                                    <button class="bg-green-300 py-1 px-2 max-md:text-sm ">Ajouter au panier</button>
                                </div>
                            </article>

                            <article class="flex flex-col max-sm:basis-1 py-3 space-y-2  bg-slate-100">
                                <h3 class=""><a href="">T-shirts</a></h3>
                                <div class="flex justify-center h-56">
                                    <img class="h-full" src="<?php echo $path?>/dist/images/product/homme/img-h-2.jpg" alt="">
                                </div>
                                <div class="">
                                    <h4>Description</h4>
                                    <p class="break-words max-lg:text-sm"></p>
                                </div>
                                <div class="flex justify-center">
                                    <h4 class="underline">Price :</h4>
                                    <span class="text-sm pl-2 pt-0.5">100€</span>
                                </div>
                                <!-- Ajouter un boutton pour afficher le produit clicker -->
                                <div class="">
                                    <button class="bg-green-300 py-1 px-2 max-md:text-sm ">Ajouter au panier</button>
                                </div>
                            </article>

                            <article class="flex flex-col max-sm:basis-1 py-3 space-y-2  bg-slate-100">
                                <h3 class=""><a href="">T-shirts</a></h3>
                                <div class="flex justify-center h-56">
                                    <img class="h-full" src="<?php echo $path?>/dist/images/product/femme/img-f-3.jpg" alt="">
                                </div>
                                <div class="">
                                    <h4>Description</h4>
                                    <p class="break-words max-lg:text-sm"></p>
                                </div>
                                <div class="flex justify-center">
                                    <h4 class="underline">Price :</h4>
                                    <span class="text-sm pl-2 pt-0.5">100€</span>
                                </div>
                                <!-- Ajouter un boutton pour afficher le produit clicker -->
                                <div class="">
                                    <button class="bg-green-300 py-1 px-2 max-md:text-sm ">Ajouter au panier</button>
                                </div>
                            </article>

                            <article class="flex flex-col max-sm:basis-1 py-3 space-y-2  bg-slate-100">
                                <h3 class=""><a href="">T-shirts</a></h3>
                                <div class="flex justify-center h-56">
                                    <img class="h-full" src="<?php echo $path?>/dist/images/product/femme/img-f-4.jpg" alt="">
                                </div>
                                <div class="">
                                    <h4>Description</h4>
                                    <p class="break-words max-lg:text-sm"></p>
                                </div>
                                <div class="flex justify-center">
                                    <h4 class="underline">Price :</h4>
                                    <span class="text-sm pl-2 pt-0.5">100€</span>
                                </div>
                                <!-- Ajouter un boutton pour afficher le produit clicker -->
                                <div class="">
                                    <button class="bg-green-300 py-1 px-2 max-md:text-sm ">Ajouter au panier</button>
                                </div>
                            </article>

                            <article class="flex flex-col max-sm:basis-1 py-3 space-y-2  bg-slate-100">
                                <h3 class=""><a href="">T-shirts</a></h3>
                                <div class="flex justify-center h-56">
                                    <img class="h-full" src="<?php echo $path?>/dist/images/product/femme/img-f-5.jpg" alt="">
                                </div>
                                <div class="">
                                    <h4>Description</h4>
                                    <p class="break-words max-lg:text-sm"></p>
                                </div>
                                <div class="flex justify-center">
                                    <h4 class="underline">Price :</h4>
                                    <span class="text-sm pl-2 pt-0.5">100€</span>
                                </div>
                                <!-- Ajouter un boutton pour afficher le produit clicker -->
                                <div class="">
                                    <button class="bg-green-300 py-1 px-2 max-md:text-sm ">Ajouter au panier</button>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="../dist/js/product.js"></script>
    <script src="../dist/js/script.js"></script>
</body>
</html>