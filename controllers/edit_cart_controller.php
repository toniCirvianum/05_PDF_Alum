<?php
session_start();
include ('../functions/product_functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && isset($_GET['id'])) {
        $action = $_GET['action'];
        $id = $_GET['id'];

        if ($action == 'remove') {
            foreach ($_SESSION['cart'] as $key => $product) {
                if ($product['id'] == $id) {
                    $_SESSION['cart'][$key]['qty']--;
                    if ($_SESSION['cart'][$key]['qty']==0) {
                        unset($_SESSION['cart'][$key]);
                    }
                }
            }
        }

        if ($action == 'add') {
            foreach ($_SESSION['cart'] as $key => $product) {
                if ($product['id'] == $id) {
                    $_SESSION['cart'][$key]['qty']++;
                }
            }
        }

        header ('Location: ../views/cart.php');
        exit();
    }

}