<?php

session_start();

$userId = $_SESSION['user']['id'];

$_SESSION['user_history'] = [];

$history = $_SESSION['history_cart'] ?? [];

foreach ($history as $order) {

    if ($order['user_id'] == $userId) {

        array_unshift(
            $_SESSION['user_history'],
            $order
        );

    }
}

header('Location: ../views/historic.php');
exit;