<?php

// pieces => array
// syntax
//explode(seperator, string) => output => array

$string = "Hello world";

$temp = explode(" ", $string);
echo "<pre>";
print_r($temp);

$temp = explode("l", $string);
echo "<pre>";
print_r($temp);

$temp = explode("o", $string);
echo "<pre>";
print_r($temp);
