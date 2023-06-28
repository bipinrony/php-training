<?php

//1 - if statement - executes some code if one condition is true
//2 - if...else statement - executes some code if a condition is true and another code if that condition is false
//3 - if...elseif...else statement - executes different codes for more than two conditions
//4 - switch statement - selects one of many blocks of code to be executed
$number = 1;
if ($number <= 1) {
    // if block
    echo "greater";
} else {
    // else block
    echo "smaller";
}

echo "<br>";

$number = 0;
if ($number > 1) {
    echo "greater";
} elseif ($number == 1) {
    echo "equal";
} else {
    echo "smaller";
}

echo "<br>";

$students = array("Khusboo", "Priyanka", "Ritoo");
if ($students[0] == "Ritoo") {
    echo "Ritoo found at 0 index";
} elseif ($students[1] == "Ritoo") {
    echo "Ritoo found at 1 index";
} elseif ($students[2] == "Ritoo") {
    echo "Ritoo found at 2 index";
} else {
    echo "Ritoo not found in array";
}

echo "<br>";

$name = "khusboo";
switch ($name) {
    case "khusboo":
        echo "Your name is khusboo!";
        break;
    case "Priyanka":
        echo "Your name is Priyanka!";
        break;
    case "Ritoo":
        echo "Your name is Ritoo!";
        break;
    default:
        echo "Your name is not present!";
}
