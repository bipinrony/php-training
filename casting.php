<?php


$number = 123456;
if (is_int($number)) {
    echo "it is an integer";
} else {
    echo "it is not an integer";
}

echo "<br>";

$number = 123456;
if (is_string($number)) {
    echo "it is an integer";
} else {
    echo "it is not an integer";
}

echo "<br>";
$number = 123456;
var_dump($number);
// convert to string
$number = (string) $number; // over-write
// var_dump($number);
if (is_string($number)) {
    echo "it is an string";
} else {
    echo "it is not an string";
}

// if block runs if value is not false or 0

$number = 1;
echo "<br>";
echo $number;

echo "<br>";
$arr = (array)$number;
print_r($arr);

// below casting will not work
// $students = array('priyanka', 'khusboo', 'ritu');
// echo "<br>";
// $str = (string)$students;
// echo $str;

echo "<br>";
$students = array('priyanka', 'khusboo', 'ritu');
$studentName = implode('-', $students);
echo $studentName;
