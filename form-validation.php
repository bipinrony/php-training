<?php
$nameError = "";
$emailError = "";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (empty($_POST['name'])) {
        $nameError = "Please enter name";
    } else {
        if (is_numeric($_POST['name']) == true) {
            $nameError = "Please enter valid name";
        } else {
            $found = 0;
            $name = $_POST['name'];
            for ($i = 0; $i < 10; $i++) {
                if (strpos($name, $i) == true) {
                    $nameError = "Please enter valid name";
                    $found = 1;
                    break;
                }
            }
            if ($found == 0) {
                echo 'valid name';
            }
        }
    }
    if (empty($_POST['email'])) {
        $emailError = "Please enter email";
    } else {
        if (strpos($_POST['email'], '@') == false) {
            $emailError = "Please enter valid email";
        } else if (strpos($_POST['email'], '.') == false) {
            $emailError = "Please enter valid email";
        } else {
            echo 'valid email';
        }
    }
}
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
        <input type="text" name="name" placeholder="name">
        <?php echo $nameError; ?>
        <br>
        <input type="text" name="email" placeholder="email">
        <?php echo $emailError; ?>
        <br>
        <input type="submit">
    </form>
</body>

</html>
