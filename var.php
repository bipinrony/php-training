<?php
include 'calculator-functions.php';

$student1 = "Khusboo"; // set
$student2 = "priyanka";
$student3 = "ritu";

unset($student1); // unset

if (isset($student1)) {
    echo $student1;
} else {
    echo "varilable is not set";
}
