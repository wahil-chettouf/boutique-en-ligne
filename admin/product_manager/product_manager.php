<?php
    require_once '../../src/classes/Utilisateurs.php'; 
    require_once '../../src/classes/Products.php'; 
    require_once 'C:\xampp\htdocs\boutique-en-ligne\src\inc\path.php';
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product manager</title>
    <link rel="stylesheet" href="../../dist/style.css">
</head>
<body>
    <div class="app box-border">
        <?php require_once '../../components/header.php'; ?>
        
        <div class="container flex flex-col max-md:space-y-6 px-2 mx-auto my-9 md:flex-row md:justify-between md:space-x-6">
            <div class="">
                <?php require_once "../inc/side_bar.php"?>
            </div>

            <div class="w-full">
                <section class="flex flex-col space-y-6">
                    <div class="">
                        <ul class="flex justify-center space-x-2">
                            <li class="">
                                <a href="product_manager.php" class="block text-white bg-blue-600 py-2 px-3">produits</a>
                            </li>
                            <li class="">
                                <a href="new_product.php" class="block text-white bg-blue-600 py-2 px-3">Ajouter</a>
                            </li>
                            <li class="">
                                <a href="#" class="block text-white bg-blue-600 py-2 px-3">commandes</a>
                            </li>
                        </ul>
                    </div>

                    <section id="" class="basis-3/4">
                        <div class="flex flex-col sm:px-1 space-y-3 text-center bg-white">
                            <h2 class="uppercase py-2 bg-red-100">produits :</h2>
                            <div id="products" class="grid gap-2 max-sm:grid-cols-2 grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">

                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </div>
    <script src="<?php echo $path?>/dist/js/product_manager.js"></script>
    <script src="<?php echo $path?>/dist/js/script.js"></script>
</body>
</html>