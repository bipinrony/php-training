<?php
session_start();
$cartQuantity = 0;
$categoryListSql = "SELECT * FROM categories WHERE status = 1";
$response = mysqli_query($connection, $categoryListSql);

$categories = array();

if (mysqli_num_rows($response) > 0) {
    while ($row = mysqli_fetch_assoc($response)) {
        array_push($categories, $row);
    }
}
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $cartSql = "SELECT count(id) as cart_count FROM `carts` WHERE user_id =" . $user['id'];
    $cartSqlResponse = mysqli_query($connection, $cartSql);
    if (mysqli_num_rows($cartSqlResponse) > 0) {
        $cart = mysqli_fetch_assoc($cartSqlResponse);
        $cartQuantity = $cart['cart_count'];
    }
}
?>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="<?php echo BASE_URL; ?>">My Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page"
                        href="<?php echo BASE_URL; ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <?php foreach ($categories as $category) { ?>
                <li class="nav-item"><a class="nav-link"
                        href="products.php?category_id=<?php echo $category["id"]; ?>"><?php echo $category['name'] ?></a>
                </li>
                <?php } ?>

            </ul>

            <?php if (isset($user)) { ?>
            <ul class=" navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="#"><?php echo $user['name']; ?></a>
                </li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="logout.php">Logout</a></li>
            </ul>
            <?php } else { ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="register.php">Register</a></li>
            </ul>
            <?php } ?>



            <a class="btn btn-outline-dark" href="cart.php">
                <i class="bi-cart-fill me-1"></i>
                Cart
                <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $cartQuantity; ?></span>
            </a>
        </div>
    </div>
</nav>
<!-- Header-->
