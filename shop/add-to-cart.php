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
        //check if product already added to card
        $checkSql = "SELECT * FROM carts WHERE user_id=" . $user['id'] . " AND product_id=" . $product['id'];
        $checkSqlResponse = mysqli_query($connection, $checkSql);
        if (mysqli_num_rows($checkSqlResponse) > 0) {
            $cart = mysqli_fetch_assoc($checkSqlResponse);
            $newQuantity = $cart['quantity'] + 1;
            $updateCartSql = "UPDATE carts SET quantity = " . $newQuantity . " WHERE id=" . $cart['id'];
            $updateCartSqlResponse = mysqli_query($connection, $updateCartSql);
            if ($updateCartSqlResponse) {
                header('Location: cart.php');
            } else {
                die('Failed to add:' . mysqli_error($connection));
            }
        } else {
            // insert new record
            $insertSql = "INSERT INTO carts  VALUES (
            NULL,
            " . $user['id'] . ",
            " . $product['id'] . ",
            1
        )";
            $response = mysqli_query($connection, $insertSql);
            if ($response) {
                header('Location: cart.php');
            } else {
                die('Failed to add:' . mysqli_error($connection));
            }
        }
    } else {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}