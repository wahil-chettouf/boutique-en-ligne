<?php
    require_once '../src/classes/Utilisateurs.php'; 
    require_once '../src/classes/Products.php'; 

    // if($_SERVER['REQUEST_METHOD'] === 'GET') 
?>

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
        
        <div class="container flex flex-col space-y-6 px-2 mx-auto my-9">
            <div class="">
                <section class="" id="sideBar">
                    <div class="flex flex-col space-y-3">
                        <div class="flex flex-col space-y-1">
                            <div class="flex justify-between">
                                <h2 class="font-bold">Dashboard</h2>
                            </div>
                            <div class="flex flex-col space-y-1">
                                <a href="./product_manager/products_manager.php" class="text-slate-400 hover:text-slate-600">Produits</a>
                                <a href="dashboard.php" class="text-slate-400 hover:text-slate-600">Utilisateurs</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- <script src="../dist/js/product.js"></script> -->
    <script src="../dist/js/script.js"></script>
</body>
</html>