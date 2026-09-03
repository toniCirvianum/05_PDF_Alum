<?php
session_start();

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

    if (!isset($_SESSION['history_cart'])) {
        $_SESSION['history_cart'] = [];
    }

    $userId = $_SESSION['user']['id'];
    $date = date('Y-m-d H:i:s');
    $order = [
        'user_id' => $userId,
        'date' => $date,
        'cart' => $_SESSION['cart']
    ];

    array_push($_SESSION['history_cart'], $order);


    // $_SESSION['user_history'] = [];
    // foreach ($_SESSION['history_cart'] as $cartProduct) {
    //     if ($userId == $cartProduct['user_id']) {
    //         array_unshift($_SESSION['user_history'], $cartProduct);
    //     }
    // }

    unset($_SESSION['cart']);
    // echo "<pre>";
    // print_r ($_SESSION['user_history']);
    // echo "</pre>";

    header('Location: ./history_controller.php');
    exit;
}
