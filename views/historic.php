<?php

// userLogged();

$text = [];

include("../includes/header.php");
include("../includes/navbar_app.php");

$userHistory = $_SESSION['user_history'] ?? [];

?>

<div class="container mt-5">

    <h2 class="text-center mb-4">
        <?= $text['order_history'] ?>
    </h2>

    <?php if (empty($userHistory)) : ?>

        <div class="alert alert-warning text-center">
            <?= $text['no_order_history'] ?>
        </div>

    <?php else : ?>

        <?php foreach ($userHistory as $orderId => $order): ?>

            <?php $orderTotal = 0; ?>

            <div class="mb-5">

                <h5>
                    Purchase date: <?= $order['date'] ?>
                </h5>
                <!-- <h5>
                    User id: <?= $order['user_id'] ?> | User login: <?= $_SESSION['user']['name'] ?>
                </h5> -->

                <table class="table table-striped align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th><?= $text['product'] ?></th>
                            <th><?= $text['price'] ?></th>
                            <th class="text-center"><?= $text['quantity'] ?></th>
                            <th><?= $text['cartSubtotal'] ?></th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($order['cart'] as $product) : ?>

                            <?php
                            $subtotal = $product['price'] * $product['qty'];
                            $orderTotal = $orderTotal + $subtotal;
                            ?>

                            <tr>

                                <td>
                                    <?= $product['name'] ?>
                                </td>

                                <td>
                                    <?= number_format($product['price'], 2) ?> €
                                </td>

                                <td class="text-center">
                                    <?= $product['qty'] ?>
                                </td>

                                <td>
                                    <?= number_format($subtotal, 2) ?> €
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                    <tfoot>
                        <tr class="table-secondary">
                            <th colspan="3" class="text-end">
                                <?= $text['cartTotal'] . ":" ?>
                            </th>

                            <th>
                                <?= number_format($orderTotal, 2) ?> €
                            </th>
                        </tr>
                    </tfoot>

                </table>

                <div classe="col-12 d-flex justify-content-center">
                    <form action="../controllers/invoicePDF_controller.php" method="post">
                        <input type="hidden" name="order" value="<?= $orderId ?>">
                        <input class="btn btn-success "type="submit" value="Generar Factura PDF">
                    </form>

                </div>

            </div>

        <?php 

        echo "<pre>";
        print_r($userHistory);
        echo "</pre>";
    
    endforeach; ?>

    <?php endif; ?>

</div>

<?php

include("../includes/footer.php");

?>