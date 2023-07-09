<?php require_once '../../src/classes/Utilisateurs.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="../../dist/style.css">
</head>
<body>
    <div class="app">
        <?php require_once '../../components/header.php'; ?>
        <!-- Contenu de la page -->
        <div class="container mx-auto flex max-md:flex-col max-md:items-center">
            <?php require_once '../inc/sidebar.php'; ?>

            <div class="max-md:w-full md:w-3/4 bg-white p-4">
                <h2 class="text-2xl font-bold mb-4">Mes informations</h2>
                <form id="formPassword">
                    <div class="mb-4">
                        <label for="password" class="block mb-2">Ancienne mot de passe</label>
                        <input type="password" id="old_password" name="old_password" required class="border border-gray-300 px-4 py-2 rounded w-3/4">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2">Nouveau mot de passe</label>
                        <input type="password" id="password" name="password" required class="border border-gray-300 px-4 py-2 rounded w-3/4">
                    </div>
                        <div class="mb-4">
                        <label for="confirm_pass" class="block mb-2">Confirmer le mot de passe</label>
                        <input type="password" id="confirm_pass" name="confirm_pass" required class="border border-gray-300 px-4 py-2 rounded w-3/4">
                    </div>
                    <button type="submit" id="passwordBtn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Modifier</button>
                </form>
            </div>
        </div>
    </div>
    <script src="../../dist/js/user/edit_profile.js"></script>
</body>
</html>