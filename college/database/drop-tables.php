<?php
include_once 'connection.php';

// $sqls = array(
//     "DROP TABLE contacts",
//     "DROP TABLE services"
// );

// foreach ($sqls as $sql) {
//     mysqli_query($connection, $sql);
// }

$contactTableDropSql = "DROP TABLE contacts";

$response = mysqli_query($connection, $contactTableDropSql);

if ($response) {
    echo "Contacts table droped successfully";
} else {
    die('Error in deleting contacts table' . mysqli_error($connection));
}

$serviceTableDropSql = "DROP TABLE services";

$response = mysqli_query($connection, $serviceTableDropSql);

if ($response) {
    echo "<br>services table droped successfully";
} else {
    die('Error in deleting services table' . mysqli_error($connection));
}