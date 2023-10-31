<?php
session_start();
require_once 'constants.php';
require_once SHOP_DIR . 'database/connection.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header('Location: login.php');
}

$cartListSql = "SELECT products.discounted_price as price, carts.* FROM carts 
LEFT JOIN products ON products.id = carts.product_id
WHERE carts.user_id=" . $user['id'];

$response = mysqli_query($connection, $cartListSql);
$carts = array();
if (mysqli_num_rows($response) > 0) {
    while ($row = mysqli_fetch_assoc($response)) {
        array_push($carts, $row);
    }
}

$total = 0;

foreach ($carts as $cart) {
    $total = $total + ($cart['quantity'] * $cart['price']);
}
// create order
$createOrderSql = "INSERT INTO orders  VALUES (
    NULL,
    " . $user['id'] . ",
    '" . date('Y-m-d H:i:s') . "',
    " . $total . ",
    1
)";
$response = mysqli_query($connection, $createOrderSql);
if ($response) {
    // get created order id
    $orderId = mysqli_insert_id($connection);
    // create order products
    foreach ($carts as $cart) {
        $createOrderProductSql = "INSERT INTO order_products  VALUES (
            NULL,
            " . $orderId . ",
            " . $cart['product_id'] . ",
            " . $cart['quantity'] . ",
            " . ($cart['quantity'] * $cart['price']) . "
        )";
        mysqli_query($connection, $createOrderProductSql);
    }
    //delete cart when order placed
    $deleteCart = "DELETE FROM carts WHERE user_id=" . (int)$user['id'];
    mysqli_query($connection, $deleteCart);

    header('Location: index.php');
} else {
    die('Failed to order:' . mysqli_error($connection));
}
