<?php
require 'connection.php';

if (isset($_GET['student_id'])) {
    $deleteSql = "DELETE FROM students WHERE id=" . (int)$_GET['student_id'];
    $response = mysqli_query($connection, $deleteSql);
    if ($response) {
        echo "deleted successfully. <br>";
        echo "<a href='read.php'>Back</a>";
    } else {
        die('Failed to delete' . mysqli_error($connection));
    }
} else {
    echo "Student ID is missing";
}
