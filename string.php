<?php
// $name = "Priyanka";
// // $name = 'Priyanka';
// echo "hello $name"; // run if ""
// echo "<br>";
// echo 'hello $name'; // will not run because ''
// echo "<br>";
// // Solution

// echo "hello " . $name; // concatenation
// echo "<br>";
// echo 'hello ' . $name; // concatenation

$name = "khusboo yadav";

$nameLength = strlen($name);
echo "Number of characters in " . $name . " is : " . $nameLength;
echo "<br>";

$nameWordCount = str_word_count($name);
echo "Number of words in " . $name . " is : " . $nameWordCount;
echo "<br>";

$reverseName = strrev($name);
echo "Reverse of " . $name . " is : " . $reverseName;
echo "<br>";

$searchString = "Yadav";
echo 'Position of ' . $searchString . ' in ' . $name . ' is: ' . stripos($name, $searchString);
echo "<br>";

echo str_replace("world", "Dolly", "Hello World!");
echo "<br>";

echo strtolower($name);
echo "<br>";

echo strtoupper($name);
echo "<br>";

echo ucfirst($name);
echo "<br>";

echo ucwords($name);
echo "<br>";

echo trim('    Khusboo Yadav    ');
echo "<br>";

echo rtrim('Khusboo Yadav', 'Yadav');
echo "<br>";


echo ltrim('Khusboo Yadav', 'Khusboo');
echo "<br>";

// explode
echo "<br>";
echo "<pre>";
$word = "My name is test";
$explodedItems = explode(" ", $word);
print_r($explodedItems);

// implode
echo "<br>";
$students = array('priyanka', 'khusboo', 'ritu');
$studentName = implode('-', $students);
echo $studentName;
