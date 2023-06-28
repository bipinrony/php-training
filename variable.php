<?php
include_once 'constant.php';
// = assignment operator

echo constant;
$name = "Hello Priyanka"; // string
$name = "Hello world"; // over-write
echo $name;
$roll = 10; // integer
$roll = 10.02; // float

echo $roll;

echo "<br>";

$hello = "world";
$call = "hello";
$greeting = $$call; // variable variable

echo $greeting; // perl
echo "<br>";
print($greeting); // c
echo "<br>";
var_dump($greeting);

echo "<br>";
if (
    "1" === 1
) {
    echo "equal";
} else {
    echo "not equal";
}

// $a = 1;
// $a = $a + 1; // over-write
// echo $a;

// $a = 1;
// echo $a++;

$add = 1;
$add += $add; // short-hand
echo $add;
echo "<br>";

$b = 1;
$b = $b + $b;
echo $b;
