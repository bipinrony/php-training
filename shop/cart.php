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

    <style>
    .cart-item-thumb {
        display: block;
        width: 10rem
    }

    .cart-item-thumb>img {
        display: block;
        width: 100%
    }

    .product-card-title>a {
        color: #222;
    }

    .font-weight-semibold {
        font-weight: 600 !important;
    }

    .product-card-title {
        display: block;
        margin-bottom: .75rem;
        padding-bottom: .875rem;
        border-bottom: 1px dashed #e2e2e2;
        font-size: 1rem;
        font-weight: normal;
    }

    .text-muted {
        color: #888 !important;
    }

    .bg-secondary {
        background-color: #f7f7f7 !important;
    }

    .accordion .accordion-heading {
        margin-bottom: 0;
        font-size: 1rem;
        font-weight: bold;
    }

    .font-weight-semibold {
        font-weight: 600 !important;
    }
    </style>
</head>

<body>
    <!-- Navigation-->
    <?php include 'header.php'; ?>

    <?php
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        header('Location: login.php');
    }
    $cartListSql = "SELECT products.name, products.image, products.discounted_price as price, carts.* FROM carts 
    LEFT JOIN products ON products.id = carts.product_id
    WHERE carts.user_id=" . $user['id'];

    $response = mysqli_query($connection, $cartListSql);
    $carts = array();
    if (mysqli_num_rows($response) > 0) {
        while ($row = mysqli_fetch_assoc($response)) {
            array_push($carts, $row);
        }
    }

    ?>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($carts as $cart) { ?>
                                <tr>
                                    <td><img src="<?php echo BASE_URL . $cart['image']; ?>" alt="" height="50"
                                            width="50"></td>
                                    <td><?php echo $cart['name']; ?></td>
                                    <td><?php echo $cart['quantity']; ?></td>
                                    <td><?php echo $cart['price'] . ' x ' . $cart['quantity'] . ' = ' . ($cart['quantity'] * $cart['price']); ?>
                                    </td>
                                    <td><a href="delete-cart.php?id=<?php echo $cart["id"]; ?>" class="btn btn-danger">
                                            Remove</a></td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="place-order.php" class="btn btn-primary btn-block">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer-->
    <?php include 'footer.php'; ?>
</body>

</html>