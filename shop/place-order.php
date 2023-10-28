<?php
session_start();
require_once 'constants.php';
require_once SHOP_DIR . 'database/connection.php';

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