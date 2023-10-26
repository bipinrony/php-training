<?php
session_start();


// session_unset($_SESSION['user']);
// session_destroy();
unset($_SESSION['user']);

header('Location: index.php');
