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
    
    if($_SERVER["REQUEST_METHOD"] == "DELETE") {
        // verifie si on recois une requete delete avec l'id de product on supprime le product depuis la method deleteProductById($id)
        if(isset($_GET['delete_p_id'])) {
            $product = Products::deleteProductById($_GET['delete_p_id']);
            echo json_encode($product);
        }
    }