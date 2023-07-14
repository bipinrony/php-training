<?php

// create a function which will take a number and print the table from 1 to 10

function table($number)
{
    for ($i = 1; $i <= 10; $i++) {
        echo $number . ' x ' . $i . ' = ' . ($number * $i);
        echo "<br>";
    }
}
$number = $_POST['test_number'];
table($number);
// for ($i = 1; $i <= 10; $i++) {
//     echo "==================Table of " . $i . "===================";
//     echo "<br>";
//     table($i);
//     echo "<br>";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="number" name="test_number">
        <input type="submit">
    </form>
</body>

</html>
