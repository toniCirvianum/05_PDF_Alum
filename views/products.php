<?php

include("../functions/user_functions.php");

// userLogged();

$text = [];

include("../includes/header.php");
include("../includes/navbar_app.php");

$products = $_SESSION['filtered_products'] ?? $_SESSION['products'] ?? [];
$categories = $_SESSION['categories'] ?? [];


?>

<div class="text-center vh-50 d-flex flex-column justify-content-center m-5">
    <h1 class="display-3 mb-4"><?= $text['product_list'] ?></h1>
</div>


<div class="container mx-auto mt-3 my-6">
    <div class="bg-light p-4 rounded mb-4 border">

        <form action="../controllers/filter_controller.php" method="GET" class="row g-3">
            <!-- Comença el form del filtre de productes -->
            <div class="col-md-4">
                <!-- Filtre per nom -->
                <label class="form-label"><?= $text['product_name'] ?> </label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="<?= $text['search_product'] ?>">
            </div>


            <div class="col-md-4">
                <!-- Filtre per categoria -->
                <label class="form-label"><?= $text['category'] ?></label>

                <select name="category" class="form-select">
                    <option value=""><?= $text['all_categories'] ?></option>

                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category ?>">
                            <?= $category ?>
                        </option>
                    <?php endforeach; ?>

                </select>

            </div>

            <div class="col-md-4">
                <!-- Filtre per preu maxim -->
                <label class="form-label"><?= $text['price'] ?></label>

                <input
                    type="number"
                    name="price"
                    class="form-control"
                    step="0.01"
                    placeholder="<?= $text['maxium_price'] ?>">
            </div>

            <div class="col-12 d-flex justify-content-center gap-2">
                <button type="submit" class="btn btn-primary">
                    <?= $text['filter_button'] ?>
                </button>
                <a href="../controllers/filter_controller.php" class="btn btn-secondary">
                    <?= $text['reset_button'] ?>
                </a>
            </div>

        </form>

    </div>

    <?php if (isset($_GET['productInCart']) && $_GET['productInCart']) : ?>
        <div class="alert alert-success text-center mx-auto w-50" role="alert">
            <?= $text['productInCart']; ?>
        </div>
    <?php endif; ?>
    <div class="row g-4 mb-4">
        <!-- Comença la llista de productes -->
        <?php foreach ($products as $product) : ?>

            <div class="col-md-3 col-sm-6">

                <div class="card bg-light w-100">
                    <div class="card-body">
                        <!-- Nom del producte -->
                        <h5 class="card-title fw-bold">
                            <?= $product['name'] ?>
                        </h5>
                        <!-- imatge -->
                        <img
                            src="../public/images/products/<?= $product['image'] ?>"
                            class="card-img-top"
                            style="height: 200px; object-fit: cover;"
                            alt="<?= $product['name'] ?>">
                        <!-- Descripcio -->
                        <p class="card-text overflow-hidden" style="height:5rem;">
                            <?= $product['description'] ?>
                        </p>
                        <!-- preu -->
                        <p class="fw-bold text-center">
                            <?= $product['price'] ?> €
                        </p>
                        <!-- Boto per afegir al carret fent servir POST -->
                        <div class="d-flex justify-content-center">

                            <a
                                href="../controllers/add_cart_controller.php?id=<?= $product['id'] ?>"
                                class="btn btn-primary">

                                <i class="bi bi-cart-plus"></i>
                                <?= $text['add_to_cart'] ?>
                            </a>

                        </div>

                    </div>
                </div>

            </div>

        <?php endforeach; ?>

    </div>
</div>

<?php
include("../includes/footer.php");
?>