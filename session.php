<?php
session_start();
$name = "Khusboo";
$email = "Khusboo@gmail.com";

$_SESSION['name'] = "Khusboo"; // set
$_SESSION['email'] = "Khusboo@gmail.com";

echo $_SESSION['name'];

// unset($_SESSION['name']); // unset
// unset($_SESSION['email']); // unset

session_unset();
session_destroy();
