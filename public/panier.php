<?php require_once '../src/classes/Utilisateurs.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="../dist/style.css">
</head>
<body>
    <div class="app">
        <?php require_once '../components/header.php'; ?>
        <div class="bg-gray-100 py-6">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-semibold mb-6">Mon Panier</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Produit 1 -->
            <div class="bg-white rounded-lg shadow">
                <img src="chemin/vers/image.jpg" alt="Nom du produit" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Nom du produit</h2>
                    <p class="text-gray-600 mb-2">Prix : $99.99</p>
                    <p class="text-gray-600 mb-2">Quantité : 2</p>
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Supprimer</button>
                </div>
            </div>

            <!-- Produit 2 -->
            <div class="bg-white rounded-lg shadow">
                <img src="chemin/vers/image.jpg" alt="Nom du produit" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Nom du produit</h2>
                    <p class="text-gray-600 mb-2">Prix : $79.99</p>
                    <p class="text-gray-600 mb-2">Quantité : 1</p>
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Supprimer</button>
                </div>
            </div>

            <!-- Produit 3 -->
            <div class="bg-white rounded-lg shadow">
                <img src="chemin/vers/image.jpg" alt="Nom du produit" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Nom du produit</h2>
                    <p class="text-gray-600 mb-2">Prix : $49.99</p>
                    <p class="text-gray-600 mb-2">Quantité : 3</p>
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Supprimer</button>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <p class="text-lg">Total : $329.94</p>
            <button class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 mt-4">Passer la commande</button>
        </div>
    </div>
</div>

    </div>

    <script src="../dist/js/script.js"></script>
</body>
</html>