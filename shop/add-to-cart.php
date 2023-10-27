<?php
session_start();
require_once 'constants.php';
require_once SHOP_DIR . 'database/connection.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header('Location: login.php');
}

if (isset($_GET['product_id']) && $_GET['product_id'] != "") {
    $productId =  $_GET['product_id'];
    $productSql = "SELECT * FROM products WHERE id = " . (int)$productId;
    $response = mysqli_query($connection, $productSql);
    if (mysqli_num_rows($response) > 0) {
        $product = mysqli_fetch_assoc($response);

        $insertSql = "INSERT INTO carts  VALUES (
            NULL,
            " . $user['id'] . ",
            " . $product['id'] . ",
            1
        )";
        $response = mysqli_query($connection, $insertSql);
        if ($response) {
            die('Added to cart');
            header('Location: cart.php');
        } else {
            die('Failed to register:' . mysqli_error($connection));
        }
    } else {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}
