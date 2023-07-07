<?php

$students = array('priyanka', 'khusboo', 'ritu', 'test', 'raghvendra'); // indexed array
// array as index => value (index can optional)
foreach ($students as $key => $value) {
    // echo $students[$key] . "<br>";
    // echo $key . "<br>";
    echo $value . "<br>";
}
echo "<br>";
print_r($students);
echo "<br>";
$student = array('name' => 'priyanka', 'location' => 'Azamgadh', 'education' => 'BCA'); // associated array or key value array (key == index)
echo $student['name'] . "<br>";
echo $student['location'] . "<br>";
echo $student['education'] . "<br>";

foreach ($student as $key => $value) {
    echo $student[$key] . "<br>";
    echo $key . "=>" . $value . "<br>";
}

// $student = array('student', 'name' => 'priyanka', 'location' => 'Azamgadh', 'education' => 'BCA'); // both type of array
// echo "<pre>";
// print_r($student);