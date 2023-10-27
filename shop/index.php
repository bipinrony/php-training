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
    $sliderListSql = "SELECT * FROM sliders WHERE status = 1";
    $response = mysqli_query($connection, $sliderListSql);

    $sliders = array();
    if (mysqli_num_rows($response) > 0) {
        while ($row = mysqli_fetch_assoc($response)) {
            array_push($sliders, $row);
        }
    }

    $featuredProductListSql = "SELECT * FROM products WHERE is_featured = 1";
    $response = mysqli_query($connection, $featuredProductListSql);

    $featuredProducts = array();

    if (mysqli_num_rows($response) > 0) {
        while ($row = mysqli_fetch_assoc($response)) {
            array_push($featuredProducts, $row);
        }
    }

    ?>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($sliders as $key => $slider) { ?>
            <div class="carousel-item <?php if ($key == 0) {
                                                echo "active";
                                            } ?>">
                <img src="<?php echo BASE_URL . $slider['image']; ?>" alt="Slider" style="width:100%">
            </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="pb-2 border-bottom text-center">Featured products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach ($featuredProducts as  $featuredProduct) { ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <?php if ($featuredProduct['discounted_price'] < $featuredProduct['price']) { ?>
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                        </div>
                        <?php } ?>

                        <!-- Product image-->
                        <img class="card-img-top" src="<?php echo BASE_URL . $featuredProduct['image']; ?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo  $featuredProduct['name']; ?></h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <?php for ($i = 0; $i < $featuredProduct['rating']; $i++) { ?>
                                    <div class="bi-star-fill"></div>
                                    <?php } ?>

                                </div>
                                <!-- Product price-->
                                <?php if ($featuredProduct['discounted_price'] < $featuredProduct['price']) { ?>
                                <span
                                    class="text-muted text-decoration-line-through">₹<?php echo  $featuredProduct['price']; ?></span>
                                ₹<?php echo  $featuredProduct['discounted_price']; ?>
                                <?php } else { ?>
                                ₹<?php echo  $featuredProduct['price']; ?>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                    href="add-to-cart.php?product_id=<?php echo $featuredProduct['id']; ?>">Add
                                    to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </section>

    <section>
        <div class="container px-4 px-lg-5">
            <div class="row py-lg-5">
                <div class="col-lg-12 col-md-12 mx-auto">
                    <h1 class="fw-light text-center border-bottom">About</h1>
                    <p class="lead text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into electronic typesetting, remaining
                        essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                        containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                        PageMaker including versions of Lorem Ipsum</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <?php include 'footer.php'; ?>
</body>

</html>
