<?php
session_start();

include('../functions/product_functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id_product = $_GET['id'];

        //Si no existeix iniciem la varibale de sessio de cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        //Busquem el producte al carret
        $product = getProductById($id_product, $_SESSION['cart']);

        if ($product != null) {
            //si el producte esta al carret actualitzem la qty
            foreach ($_SESSION['cart'] as $key => $cartProduct) {
                if ($cartProduct['id'] == $id_product) {
                    $_SESSION['cart'][$key]['qty']++;
                }
            }
        } else {
            //si el producte no és al carret l'afegim
            $product = getProductById($id_product, $_SESSION['products']);
            $product['qty'] = 1;
            array_push($_SESSION['cart'], $product);
            $_SESSION['product_addes'] = true;
        }

        header('Location: ../views/products.php?productInCart=true');
        exit;
    }
}
