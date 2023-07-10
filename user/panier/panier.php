<?php 
    require_once '../../src/classes/Utilisateurs.php'; 
    require_once '../../src/classes/Products.php'; 
    require_once '../../src/classes/Card.php'; 
    require_once '../../src/inc/path.php'; 

    if($user->isNotConnected() || !$user->isClient()) {
        $user->redirect($path . "/");
        exit();
    }

    $order_cards = Card::getOrderCards();
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="../../dist/style.css">
</head>
<body>
    <div class="app">
        <?php require_once '../../components/header.php'; ?>
        <div class="bg-gray-100 py-6">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-semibold mb-6">Mon Panier</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if($order_cards) :?>
                <?php for($i = 0; $i < count($order_cards); $i++) :?>
                    <?php $product = new Products($order_cards[$i]->product_id); ?>
                    <p><strong>Name :</strong> <?php echo $product->getName()?></p>
                    <p><strong>Price :</strong> <?php echo $product->getCurrentPrice()?></p>
                <?php endfor; ?>
            <?php else :?>
                <p class="text-lg">Votre panier est vide</p>
            <?php endif; ?>
        <div class="mt-6">
            <p class="text-lg">Total : $329.94</p>
            <button class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 mt-4">Passer la commande</button>
        </div>
    </div>
</div>

    </div>

    <script src="../../dist/js/script.js"></script>
</body>
</html>