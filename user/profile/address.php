<?php
    require_once '../../src/classes/Utilisateurs.php'; 
    require_once '../../src/classes/Address.php'; 
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
        <div class="container mx-auto flex max-md:flex-col max-md:items-center">
            <?php require_once '../inc/sidebar.php'; ?>
            <div class="max-md:w-full md:w-3/4 bg-white p-4">
                <h2 class="text-2xl font-bold mb-4">Mes address</h2>
                <!-- Liste des adresses -->
                <?php if(Address::getAddresses() == null): ?>
                    <p class="text-xl">Vous n'avez pas encore d'adresse</p>
                <?php else :?>
                    <ul>
                    <?php foreach (Address::getAddresses() as $address) { ?>
                        <li class="mb-4">
                        <h3 class="text-xl font-bold"><?php echo $address['address_id']; ?></h3>
                        <p><?php echo $address['address_line_1']; ?></p>
                        <p><?php echo $address['address_line_2']; ?></p>
                        <p><?php echo $address['city']; ?></p>
                        <p><?php echo $address['state']; ?></p>
                        <p><?php echo $address['zip_code']; ?></p>
                        <p><?php echo $address['country']; ?></p>
                        <a href="modifier_address.php?id=<?php echo $address['address_id']; ?>" class="text-blue-500 hover:text-blue-700">Modifier</a>
                        </li>
                    <?php } ?>
                    </ul>
                <?php endif; ?>
                <a href="ajouter_address.php" class="text-blue-500 hover:text-blue-700">Ajouter une adresse</a>
            </div>
        </div>
    </div>
    <script src="../../dist/js/script.js"></script>
    <script src="../../dist/js/user/edit_profile.js"></script>
</body>
</html>