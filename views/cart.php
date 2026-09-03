<?php
session_start();
include("../functions/user_functions.php");

// userLogged();

$text = [];

include("../includes/header.php");
include("../includes/navbar_app.php");


$cart = $_SESSION['cart'] ?? [];

$total = 0;

?>

<div class="container mt-5">

    <h2 class="mb-4"><?= $text['shpoingCart'] ?></h2>

    <?php if (empty($cart)): ?>
        <div class="text-center vh-50 d-flex flex-column justify-content-center m-5 alert alert-warning">
            <h1 class="display-6 mb-4"><?= $text['empty_cart'] ?></h1>
        </div>
    <?php else: ?>

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

                <?php foreach ($cart as $product) : ?>

                    <?php
                    $subtotal = $product['price'] * $product['qty'];
                    $total = $total + $subtotal;
                    ?>

                    <tr>

                        <td>
                            <div class="d-flex align-items-center">

                                <img
                                    src="../public/images/products/<?= $product['image'] ?>"
                                    alt="<?= $product['name'] ?>"
                                    class="rounded me-3"
                                    style="width: 70px; height: 70px; object-fit: cover;">

                                <div>
                                    <strong>
                                        <?= $product['name'] ?>
                                    </strong>

                                    <p class="text-muted small mb-0">
                                        <?= $product['description'] ?>
                                    </p>
                                </div>

                            </div>
                        </td>

                        <td>
                            <?= number_format($product['price'], 2) ?> €
                        </td>

                        <td class="text-center">

                            <a
                                href="../controllers/edit_cart_controller.php?action=remove&id=<?= $product['id'] ?>"
                                class="btn btn-outline-danger btn-sm">
                                -
                            </a>

                            <span class="mx-3">
                                <?= $product['qty'] ?>
                            </span>

                            <a
                                href="../controllers/edit_cart_controller.php?action=add&id=<?= $product['id'] ?>"
                                class="btn btn-outline-success btn-sm">
                                +
                            </a>

                        </td>

                        <td>
                            <?= number_format($subtotal, 2) ?> €
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

            <tfoot>
                <tr class="table-light">
                    <th colspan="3" class="text-end">
                        <?= $text['cartTotal'] . ":" ?>
                    </th>

                    <th>
                        <?= number_format($total, 2) ?> €
                    </th>
                </tr>
            </tfoot>

        </table>

        <div class="d-flex justify-content-end mt-4">

            <a
                href="../controllers/checkout_controller.php"
                class="btn btn-success btn-lg">

                <?= $text['confirmCart'] ?>

            </a>

        </div>
    <?php endif; ?>
</div>


<?php
include("../includes/footer.php");
?>