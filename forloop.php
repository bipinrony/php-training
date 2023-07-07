<?php
// static
echo "2x1=" . (2 * 1) . "<br>";
echo "2x2=" . (2 * 2) . "<br>";
echo "2x3=" . (2 * 3) . "<br>";
echo "2x4=" . (2 * 4) . "<br>";
echo "2x5=" . (2 * 5) . "<br>";

// dynamic
$number = 3;
echo $number . "x1=" . ($number * 1) . "<br>";
echo $number . "x2=" . ($number * 2) . "<br>";
echo $number . "x3=" . ($number * 3) . "<br>";
echo $number . "x4=" . ($number * 4) . "<br>";
echo $number . "x5=" . ($number * 5) . "<br>";

// dynamic + forloop
$number = 3;
for ($i = 1; $i <= 100; $i++) {
    echo $number . "x" . $i . "=" . ($number * $i) . "<br>";
}
echo "<br>";




$students = array('priyanka', 'khusboo', 'ritu', 'raghvendra'); // indexed array
// echo $students[0];
// echo $students[1];
// echo $students[2];
// echo $students[3];
$studentCount = count($students);
for ($i = 0; $i <= ($studentCount - 1); $i++) {
    echo $students[$i] . "<br>";
}