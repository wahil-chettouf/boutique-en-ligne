<?php
    require_once '../../src/classes/Utilisateurs.php'; 
    require_once '../../src/classes/Products.php'; 
    require_once 'C:\xampp\htdocs\boutique-en-ligne\src\inc\path.php';
    require_once '../../src/inc/path.php'; 

    if($user->isNotConnected() && $user->isClient()) {
        $user->redirect($path . "/");
    }
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User manager</title>
    <link rel="stylesheet" href="../../dist/style.css">
</head>
<body>
    <div class="app box-border">
        <?php require_once '../../components/header.php'; ?>
        
        <div class="container flex flex-col space-y-6 px-2 mx-auto my-9">
            <div class="">
                <?php require_once "../inc/side_bar.php"?>
            </div>
        </div>
    </div>
    <!-- <script src="../dist/js/product.js"></script> -->
    <script src="../dist/js/script.js"></script>
</body>
</html>