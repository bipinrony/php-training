<?php

date_default_timezone_set("Asia/Kolkata");

function currentTime()
{
    // echo date('d-m-Y H:i:s');
    echo date('d-m-y H:i:s a');
}

currentTime();
echo "<br>";

// echo "Copyright 1999-" . date('Y');

function sum(int $number1, int $number2)
{
    echo $number1 + $number2;
}

sum("4", "5");
echo "<br>";

function multiply($number1, $number2)
{
    echo $number2 * $number1;
}

multiply(4, 5);
echo "<br>";

function greetingMsg($name)
{
    echo "Hello " . $name . "! How are you? <br>";
}

greetingMsg('Priyanka');
greetingMsg('Khusboo');
greetingMsg('Ritoo');

$students = array('priyanka', 'khusboo', 'Ritoo');
foreach ($students as $key => $student) {
    greetingMsg($student);
}

echo "<br>";
// defult parameter
function calc($price = 10, $tax = 0)
{
    $total = $price + ($price * $tax);
    echo "$total";
}
calc();
