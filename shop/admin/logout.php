<?php
session_start();


// session_unset($_SESSION['admin']);
// session_destroy();
unset($_SESSION['admin']);

header('Location: index.php');
