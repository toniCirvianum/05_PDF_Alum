<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Recuperem els productes originals
    $products = $_SESSION['products'] ?? [];

    // Recuperem els filtres enviats pel formulari
    $name = $_GET['name'] ?? '';
    $category = $_GET['category'] ?? '';
    $price = $_GET['price'] ?? '';

    // Array on guardarem els productes filtrats
    $filteredProducts = [];

    foreach ($products as $product) {

        $nameOk = true;
        $categoryOk = true;
        $priceOk = true;

        // Filtre per nom
        if ($name != '') {
            //Busca dins el nom del producte si hi ha la paraula que li hem passat
            $nameOk = stripos($product['name'], $name) !== false;
        }

        // Filtre per categoria
        if ($category != '' && $product['category'] != $category) {
            $categoryOk = false;
        }

        if ($price != '' && $product['price'] <= $price) {
            $priceOk = false;
        }

        // El producte ha de complir tots els filtres
        if ($nameOk && $categoryOk && $priceOk) {
            $filteredProducts[] = $product;
        }
    }

    // Guardem el resultat
    $_SESSION['filtered_products'] = $filteredProducts;

    // Tornem a la vista
    header('Location: ../views/products.php');
    exit;
}

