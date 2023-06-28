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
    <title>Nouveau produit</title>
    <link rel="stylesheet" href="../../dist/style.css">
</head>
<body>
    <div class="app box-border">
        <?php require_once '../../components/header.php'; ?>
        
        <div class="container flex flex-col max-md:space-y-6 px-2 mx-auto my-9 md:flex-row md:justify-between md:space-x-6">
            <div class="">
                <?php require_once "../inc/side_bar.php"?>
            </div>

            <div class="flex justify-center w-full">
                <section class="flex flex-col space-y-6 w-full xl:w-1/3">
                    <div class="">
                        <ul class="flex justify-center space-x-2">
                            <li class="">
                                <a href="product_manager.php" class="block text-white bg-blue-600 py-2 px-3 text-sm">produits</a>
                            </li>
                            <li class="">
                                <a href="new_product.php" class="block text-white bg-blue-600 py-2 px-3 text-sm">Ajouter</a>
                            </li>
                            <li class="">
                                <a href="#" class="block text-white bg-blue-600 py-2 px-3 text-sm">commandes</a>
                            </li>
                        </ul>
                    </div>

                    <form id="newProductForm" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="p_name" class="block text-gray-700 text-sm font-bold mb-2">Nom du produit:</label>
                            <input type="text" id="p_name" name="p_name" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
                            <span id="p_name_error" class="text-xs text-red-600 error"></span>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="p_current_price">Prix :</label>
                            <input type="number" id="p_current_price" name="p_current_price" step="0.01" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            <span id="p_current_price_error" class="text-xs text-red-600 error"></span>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="p_qty">Quantité :</label>
                            <input type="number" id="p_qty" name="p_qty" min="1" value="1" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            <span id="p_qty_error" class="text-xs text-red-600 error"></span>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="p_featured_photo">Photo en vedette :</label>
                            <input type="file" id="p_featured_photo" name="p_featured_photo" accept="image/*" class="py-2">
                            <span id="p_featured_photo_error" class="text-xs text-red-600 error"></span>
                        </div>
                        <div class="mb-4">
                            <label for="p_description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea id="p_description" name="p_description" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500"></textarea>
                            <span id="p_description_error" class="text-xs text-red-600 error"></span>
                        </div>
                        <div class="mb-4">
                            <label for="p_short_description" class="block text-gray-700 text-sm font-bold mb-2">Description courte:</label>
                            <textarea id="p_short_description" name="p_short_description" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500"></textarea>
                            <span id="p_short_description_error"

                            class="text-xs text-red-600 error"></span>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="p_feature">p_feature :</label>
                            <input type="text" id="p_feature" name="p_feature" class="px-3 py-2 border rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <button id="ajouterFeature" type="button" class="bg-blue-500 text-white py-2 px-4 rounded-lg ml-2">Ajouter</button>
                            <span id="p_feature_error" class="text-xs text-red-600 error"></span>
                        </div>
                        <div id="featuresAjoutees" class="flex space-x-3">
                            <!-- Ici seront affichées les p_feature ajoutés -->
                        </div>
                        <div class="my-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Catégorie :</label>
                            <div class="flex space-x-4">
                                <div class="flex items-center">
                                    <input type="radio" id="category_homme" name="ecat_id" value="homme" class="mr-2">
                                    <label for="category_homme" class="text-gray-700">Homme</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="category_femme" name="ecat_id" value="femme" class="mr-2">
                                    <label for="category_femme" class="text-gray-700">Femme</label>
                                </div>
                            </div>
                            <span id="ecat_id_error" class="text-xs text-red-600 error"></span>
                        </div>

                        <button type="submit" id="newProduct" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ajouter</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <!-- <script src="../dist/js/product.js"></script> -->
    <script src="<?php echo $path?>/dist/js/new_product.js"></script>
    <script src="<?php echo $path?>/dist/js/script.js"></script>
</body>
</html>