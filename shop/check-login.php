<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    header('Location: index.php');
}
