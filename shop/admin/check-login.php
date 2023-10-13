<?php
if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
} else {
    header('Location: index.php');
}
