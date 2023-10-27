<?php
session_start();
require_once '../../constants.php';
require_once SHOP_DIR . 'database/connection.php';
require_once SHOP_ADMIN_DIR . 'check-login.php';

if (isset($_GET['id'])) {
    $deleteSql = "DELETE FROM users WHERE id=" . (int)$_GET['id'];
    $response = mysqli_query($connection, $deleteSql);
    if ($response) {
        header('Location: list.php');
    } else {
        die('Failed to delete' . mysqli_error($connection));
    }
} else {
    echo "ID is missing";
}
