<?php
    require_once '../../src/classes/Utilisateurs.php'; 
    require_once '../../src/classes/Address.php'; 
    $address = Address::getAddresses();
?>

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
        <div class="container mx-auto md:flex md:justify-between">
            <?php require_once '../inc/sidebar.php'; ?>
            <div id="" class="max-md:w-full md:w-3/4 bg-white p-4">
                <h2 class="text-2xl font-bold mb-4">Mes address</h2>
                <!-- Liste des adresses -->
                <p class="hidden my-6 text-blue-950" id="messageZeroAddress">Vous n'avez pas encore d'adresse !</p>
                <ul class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4" id="addresses">
                    <!-- javascript code -->
                </ul>
                <a href="ajouter_address.php" class="text-blue-500 hover:text-blue-700">Ajouter une adresse</a>
            </div>
        </div>
    </div>
    <script src="../../dist/js/script.js"></script>
    <script src="../../dist/js/user/address.js"></script>
</body>
</html>