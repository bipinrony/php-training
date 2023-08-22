<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>

<body>
    <form action="" method="post">
        Number1: <input type="number" name="number1"><br>
        Number2: <input type="number" name="number2"><br>
        <input type="submit" name="action" value="+">
        <input type="submit" name="action" value="-">
        <input type="submit" name="action" value="X">
        <input type="submit" name="action" value="/">
    </form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $number1 = (int)$_POST['number1'];
    $number2 = (int)$_POST['number2'];
    if (empty($number1) || empty($number2)) {
        echo "Please enter both numbers";
        exit;
    }
    $action = $_POST['action'];

    if ($action == "+") {
        sum($number1, $number2);
    } else if ($action == "-") {
        sub($number1, $number2);
    } else if ($action == "X") {
        multiplication($number1, $number2);
    } else {
        division($number1, $number2);
    }
}

function sum($number1, $number2)
{
    echo "Sum of given numbers is: " . ($number1 + $number2);
}

function sub($number1, $number2)
{
    echo "Subtraction of given numbers is: " . ($number1 - $number2);
}


function multiplication($number1, $number2)
{
    echo "Multiplication of given numbers is: " . ($number1 * $number2);
}


function division($number1, $number2)
{
    echo "Division of given numbers is: " . ($number1 / $number2);
}
?>
