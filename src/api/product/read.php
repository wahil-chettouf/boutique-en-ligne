<?php
    require_once '../../classes/Products.php';

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        // verifie si on recois une requete get avec l'id de product on retourne le product depuis la method getProductById($id)
        if(isset($_GET['p_id'])) {
            $product = Products::getProductById($_GET['id']);
            echo json_encode($product);
        } else {
            $products = Products::getAllProducts();
            echo json_encode($products);
        }
    }