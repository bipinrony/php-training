<?php

// $GLOBALS

$num = 1;
$name = 'test';
// jab v ham koi variable define krte hain..php use automatic $GLOBALS name ke variable me store kr leti hai
// agar hame koi bhi variable par se scope ka limit htana ho to ham $GLOBALS ka use krte hain
function sum($num2)
{
    echo $GLOBALS['num'] + $num2;
    echo $GLOBALS['name'];
}

sum(2);
