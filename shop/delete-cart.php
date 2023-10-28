<?php
session_start();
require_once 'constants.php';
require_once SHOP_DIR . 'database/connection.php';
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header('Location: login.php');
}
if (isset($_GET['id'])) {
    $deleteSql = "DELETE FROM carts WHERE id=" . (int)$_GET['id'];
    $response = mysqli_query($connection, $deleteSql);
    if ($response) {
        header('Location: cart.php');
    } else {
        die('Failed to delete' . mysqli_error($connection));
    }
} else {
    echo "ID is missing";
}