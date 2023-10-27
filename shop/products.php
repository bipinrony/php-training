<?php
require_once 'constants.php';
require_once SHOP_DIR . 'database/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Homepage</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <?php include 'header.php'; ?>

    <?php

    if (isset($_GET['category_id']) && $_GET['category_id'] != "") {
        $categoryId =  $_GET['category_id'];
    }
    $productListSql = "SELECT * FROM products WHERE status = 1";

    if (isset($categoryId)) {
        $productListSql .= " AND category_id=" . $categoryId;
    }

    $response = mysqli_query($connection, $productListSql);

    $products = array();

    if (mysqli_num_rows($response) > 0) {
        while ($row = mysqli_fetch_assoc($response)) {
            array_push($products, $row);
        }
    }

    ?>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach ($products as  $product) { ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <?php if ($product['discounted_price'] < $product['price']) { ?>
                                <!-- Sale badge-->
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                                </div>
                            <?php } ?>

                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo BASE_URL . $product['image']; ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo  $product['name']; ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <?php for ($i = 0; $i < $product['rating']; $i++) { ?>
                                            <div class="bi-star-fill"></div>
                                        <?php } ?>

                                    </div>
                                    <!-- Product price-->
                                    <?php if ($product['discounted_price'] < $product['price']) { ?>
                                        <span class="text-muted text-decoration-line-through">₹<?php echo  $product['price']; ?></span>
                                        ₹<?php echo  $product['discounted_price']; ?>
                                    <?php } else { ?>
                                        ₹<?php echo  $product['price']; ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>


    <!-- Footer-->
    <?php include 'footer.php'; ?>
</body>

</html>
