<?php

// while (entry control loop)
$number = 5;

while ($number >= 1) {
    echo "The number is: $number <br>";
    $number--;
}

// do while (exit control loop)
// The do...while loop will always execute the block of code once, it will then check the condition, and repeat the loop while the specified condition is true.
$x = 1;

do {
    echo "The number is: $x <br>";
    $x++;
} while ($x <= 5);
