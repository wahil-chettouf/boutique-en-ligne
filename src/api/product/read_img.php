<?php
    require_once '../../classes/Products.php';

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        // si en recois une requete get avec l'id de product on retourne une table de ses images depuis la method getProductImage($id)
        if(isset($_GET['p_id'])) {
            $product_id = $_GET['p_id'];
            $product_images = Products::getFirstProductImage($product_id);
            echo json_encode($product_images);
        }
    }