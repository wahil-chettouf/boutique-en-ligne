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
                    <div class="flex flex-col sm:px-1 space-y-3 text-center bg-white">
                        <h2 class="uppercase py-2 bg-red-100">produits :</h2>
                        <div id="products" class="grid gap-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="../dist/js/products.js"></script>
    <script src="../dist/js/script.js"></script>
</body>
</html>