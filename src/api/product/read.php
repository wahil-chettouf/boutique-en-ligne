<?php
    require_once '../../classes/Products.php';

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $products = Products::getAllProducts();
        echo json_encode($products);
    }