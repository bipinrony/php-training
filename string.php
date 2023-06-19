<?php
$name = "Priyanka";
// $name = 'Priyanka';
echo "hello $name"; // run if ""
echo "<br>";
echo 'hello $name'; // will not run because ''
echo "<br>";
// Solution

echo "hello " . $name; // concatenation
echo "<br>";
echo 'hello ' . $name; // concatenation