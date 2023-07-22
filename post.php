<?php
//$_POST
$student = $_POST;
echo "<pre>";
print_r($student);
print_r($_GET);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="name"><br>
        <input type="text" name="age" placeholder="age"><br>
        <input type="text" name="class" placeholder="class"><br>
        <input type="text" name="address" placeholder="address"><br>
        <input type="text" name="mobile" placeholder="mobile"><br>
        <input type="submit">
    </form>
</body>

</html>
