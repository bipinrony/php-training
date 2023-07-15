<?php

declare(strict_types=1);

$number1 = "test";
$number2 = 2;

function sum(int $number1, int $number2)
{
    echo $number1 + $number2;
}

sum($number1, $number2);
