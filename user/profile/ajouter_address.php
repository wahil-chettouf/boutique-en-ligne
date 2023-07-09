<?php require_once '../../src/classes/Utilisateurs.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nouvelle address</title>
    <link rel="stylesheet" href="../../dist/style.css">
</head>
<body>
    <div class="app">
        <?php require_once '../../components/header.php'; ?>
        <!-- Contenu de la page -->
        <div class="container mx-auto flex max-md:flex-col max-md:items-center">
            <?php require_once '../inc/sidebar.php'; ?>
            <div class="max-md:w-full md:w-3/4 bg-white p-4">
                <h2 class="text-2xl font-bold mb-4">Ajouter une address</h2>
                <!-- Formulaire d'ajout d'adresse -->
                <form method="POST" id="formNewAddress" class="mb-4">
                    <input type="hidden" name="_method" value="POST_ADDRESS">

                    <div class="mb-4">
                        <label for="address_line_1" class="block mb-2">Adresse ligne 1</label>
                        <input type="text" id="address_line_1" name="address_line_1" required class="border border-gray-300 px-4 py-2 rounded w-3/4">
                        <span class="text-red-600 text-xs block mt-2 error" id="address_line_1_err"></span>
                    <span id="address_line_1_success" class="text-xs text-green-600 success"></span>
                    </div>
                    <div class="mb-4">
                        <label for="address_line_2" class="block mb-2">Adresse ligne 2</label>
                        <input type="text" id="address_line_2" name="address_line_2" class="border border-gray-300 px-4 py-2 rounded w-3/4">
                        <span class="text-red-600 text-xs block mt-2 error" id="address_line_2_err"></span>
                    <span id="address_line_2_success" class="text-xs text-green-600 success"></span>
                    </div>
                    <div class="mb-4">
                        <label for="city" class="block mb-2">Ville</label>
                        <input type="text" id="city" name="city" required class="border border-gray-300 px-4 py-2 rounded w-3/4">
                        <span class="text-red-600 text-xs block mt-2 error" id="city_err"></span>
                    <span id="city_success" class="text-xs text-green-600 success"></span>
                    </div>
                    <div class="mb-4">
                        <label for="state" class="block mb-2">État/Province</label>
                        <input type="text" id="state" name="state" required class="border border-gray-300 px-4 py-2 rounded w-3/4">
                        <span class="text-red-600 text-xs block mt-2 error" id="state_err"></span>
                    <span id="state_success" class="text-xs text-green-600 success"></span>
                    </div>
                    <div class="mb-4">
                        <label for="zip_code" class="block mb-2">Code postal</label>
                        <input type="text" id="zip_code" name="zip_code" required class="border border-gray-300 px-4 py-2 rounded w-3/4">
                        <span class="text-red-600 text-xs block mt-2 error" id="zip_code_err"></span>
                    <span id="zip_code_success" class="text-xs text-green-600 success"></span>
                    </div>
                    <div class="mb-4">
                        <label for="country" class="block mb-2">Pays</label>
                        <input type="text" id="country" name="country" required class="border border-gray-300 px-4 py-2 rounded w-3/4">
                        <span class="text-red-600 text-xs block mt-2 error" id="country_err"></span>
                    <span id="country_success" class="text-xs text-green-600 success"></span>
                    </div>
                    <button type="submit" id="btnNewAddress" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
                </form>
            </div>

        </div>
    </div>
    <script src="../../dist/js/script.js"></script>
    <script src="../../dist/js/user/ajouter_address.js"></script>
</body>
</html>