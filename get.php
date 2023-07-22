<?php
//$_GET
// isko ham url se data get krne ke liye use krte hain jo v url me ? ke bad hota hai
// jo url me ? ke bad hota hai use ham query string kahte hain
// do values ko alag krne ke liya hm & (ampersand sign) use krte hain

echo "<pre>";
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
    <form action="" method="get">
        <input type="text" name="name" placeholder="name"><br>
        <input type="text" name="age" placeholder="age"><br>
        <input type="text" name="class" placeholder="class"><br>
        <input type="text" name="address" placeholder="address"><br>
        <input type="text" name="mobile" placeholder="mobile"><br>
        <input type="submit">
    </form>
</body>

</html>
