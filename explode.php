<?php

// pieces => array
// syntax
//explode(seperator, string) => output => array

$string = "Hello world";
// print_r(explode(" ", $string, -1));
$temp = explode(" ", $string);
echo "<pre>";
print_r($temp[0]);

$temp = explode("l", $string);
echo "<pre>";
print_r($temp);

$temp = explode("o", $string);
echo "<pre>";
print_r($temp);
