<?php


// indexed
$students = array('priyanka', 'khusboo', 'ritu', 'raghvendra'); // indexed array
echo $students[0];
echo $students[1];
echo $students[2];
echo $students[3];
$studentCount = count($students);
for ($i = 0; $i <= ($studentCount - 1); $i++) {
    echo $students[$i] . "<br>";
}

$students = array(
    array('location' => array('state' => 'UP', 'city' => 'Azamgadh'), 'education' => 'MA'),
    array('location' => array('state' => 'UP', 'city' => 'Azamgadh'), 'education' => 'MCA'),
    array('location' => array('state' => 'UP', 'city' => 'Azamgadh'), 'education' => 'BCA'),
);


$students = array(
    array('state' => 'UP', 'city' => 'Azamgadh'), 'education' => 'MA',
    array('state' => 'UP', 'city' => 'Azamgadh'), 'education' => 'MCA',
    array('state' => 'UP', 'city' => 'Azamgadh'), 'education' => 'BCA',
);


echo "<pre>";
print_r($students[0]['state']);


// associated
$student = array('name' => 'priyanka', 'location' => 'Azamgadh', 'education' => 'BCA'); // associated array or key value array (key == index)
echo $student['name'] . "<br>";
echo $student['location'] . "<br>";
echo $student['education'] . "<br>";

foreach ($student as $key => $value) {
    echo $student[$key] . "<br>";
    echo $key . "=>" . $value . "<br>";
}

// multi-dimensional
$students = array(
    'Khusboo' => array('location' => array('state' => 'UP', 'city' => 'Azamgadh'), 'education' => 'MA'),
    'priyanka' => array('location' => array('state' => 'UP', 'city' => 'Azamgadh'), 'education' => 'MCA'),
    'Ritoo' => array('location' => array('state' => 'UP', 'city' => 'Azamgadh'), 'education' => 'BCA'),
);

echo "<pre>";
print_r($students['Khusboo']['location']['state']);
