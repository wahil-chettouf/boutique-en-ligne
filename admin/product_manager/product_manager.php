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
                <section class="">
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
                </section>
            </div>
        </div>
    </div>
    <!-- <script src="../dist/js/product.js"></script> -->
    <script src="<?php echo $path?>/dist/js/script.js"></script>
</body>
</html>