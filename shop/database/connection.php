<?php
// Create connection
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
