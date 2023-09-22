<?php
include_once 'connection.php';

// create contact table
$createContactTableSql = "CREATE TABLE IF NOT EXISTS contacts (
    id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) NOT NULL,
    email varchar(100) NOT NULL,
    mobile_number BIGINT,
    message TEXT
    )";

$response = mysqli_query($connection, $createContactTableSql);

if ($response) {
    echo "Contact table created successfully";
} else {
    die('Error in creating contacts table' . mysqli_error($connection));
}


// create service table
$createServiceTableSql = "CREATE TABLE IF NOT EXISTS services (
    id int AUTO_INCREMENT PRIMARY KEY,
    service TEXT NOT NULL
    )";

$response = mysqli_query($connection, $createServiceTableSql);

if ($response) {
    echo "<br>services table created successfully";
} else {
    die('Error in creating services table' . mysqli_error($connection));
}