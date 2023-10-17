<?php
$categoryListSql = "SELECT * FROM categories WHERE status = 1";
$response = mysqli_query($connection, $categoryListSql);

$categories = array();

if (mysqli_num_rows($response) > 0) {
    while ($row = mysqli_fetch_assoc($response)) {
        array_push($categories, $row);
    }
}

?>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">My Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <?php foreach ($categories as $category) { ?>
                    <li class="nav-item"><a class="nav-link" href="#!"><?php echo $category['name'] ?></a></li>
                <?php } ?>

            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" aria-current="page" href="register.php">Register</a></li>
            </ul>

            <form class="d-flex">

                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
    </div>
</nav>
<!-- Header-->
