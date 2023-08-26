<?php
$filename = 'webdictionary.txt';
$myfile = fopen($filename, 'w');
$contentToWrite = "Khusboo" . PHP_EOL;
fwrite($myfile, $contentToWrite);
$contentToWrite = "Ritu" . PHP_EOL;
fwrite($myfile, $contentToWrite);
$contentToWrite = "Priyanka" . PHP_EOL;
fwrite($myfile, $contentToWrite);

$myfile = fopen($filename, 'r');
echo fread($myfile, filesize($filename));

$myfile = fopen($filename, 'a');
$contentToWrite = "Raghvendra" . PHP_EOL;
fwrite($myfile, $contentToWrite);

$myfile = fopen($filename, 'a+');
echo fread($myfile, filesize($filename));

$filename = 'webdictionary_new.txt';
$myfile = fopen($filename, 'x');
$contentToWrite = "Khusboo" . PHP_EOL;
fwrite($myfile, $contentToWrite);

fclose($myfile);
