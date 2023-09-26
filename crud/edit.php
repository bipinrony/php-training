<?php
require 'connection.php';

if (isset($_GET['student_id'])) {
    $studentSql = "SELECT * FROM students WHERE id = " . (int)$_GET['student_id'];
    $response = mysqli_query($connection, $studentSql);
    if (mysqli_num_rows($response) > 0) {
        $student = mysqli_fetch_assoc($response);
    } else {
        die('Student not found');
    }
} else {
    die('Student ID is missing');
}

$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['name']) && $_POST['name'] != "") {
        $name = $_POST['name'];
    } else {
        $name = NULL;
    }

    if (isset($_POST['email']) && $_POST['email'] != "") {
        $email = $_POST['email'];
    } else {
        $email = NULL;
    }

    if (isset($_POST['phone_number']) && $_POST['phone_number'] != "") {
        $phone_number = $_POST['phone_number'];
    } else {
        $phone_number = NULL;
    }

    if (isset($_POST['gender']) && $_POST['gender'] != "") {
        $gender = $_POST['gender'];
    } else {
        $gender = NULL;
    }

    if (isset($_POST['date_of_birth']) && $_POST['date_of_birth'] != "") {
        $date_of_birth = $_POST['date_of_birth'];
    } else {
        $date_of_birth = NULL;
    }

    if (isset($_POST['date_of_birth']) && $_POST['date_of_birth'] != "") {
        $date_of_birth = $_POST['date_of_birth'];
    } else {
        $date_of_birth = NULL;
    }

    if (isset($_POST['address']) && $_POST['address'] != "") {
        $address = $_POST['address'];
    } else {
        $address = NULL;
    }

    $updateSql = "UPDATE students SET 
    name= '" . $name . "',
    email= '" . $email . "',
    phone_number= " . $phone_number . ",
    gender= '" . $gender . "',
    date_of_birth= '" . $date_of_birth . "',
    address= '" . $address . "'
     WHERE id=" . (int)$_GET['student_id'];
    $response = mysqli_query($connection, $updateSql);
    if ($response) {
        $success = "Student updated successfully.";
        header('Location: read.php');
    } else {
        $error = 'Failed to update student:' . mysqli_error($connection);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Student</title>
</head>

<body>
    <h3>Student Registration</h3>
    <?php echo $success; ?>
    <?php echo $error; ?>
    <form action="" method="POST">
        <table border="1">
            <tr>
                <th>Name: </th>
                <td><input type="text" name="name" value="<?php echo $student['name']; ?>"></td>
            </tr>

            <tr>
                <th>Email: </th>
                <td><input type="email" name="email" value="<?php echo $student['email']; ?>"></td>
            </tr>

            <tr>
                <th>Phone Number: </th>
                <td><input type="number" name="phone_number" value="<?php echo $student['phone_number']; ?>"></td>
            </tr>

            <tr>
                <th>Gender: </th>
                <td>
                    <select name="gender">
                        <option value="male" <?php if ($student['gender'] === "male") {
                                                    echo "selected";
                                                } ?>>Male
                        </option>
                        <option value="female" <?php if ($student['gender'] === "female") {
                                                    echo "selected";
                                                } ?>>Female</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th>Date of Birth: </th>
                <td><input type="date" name="date_of_birth" value="<?php echo $student['date_of_birth']; ?>"></td>
            </tr>

            <tr>
                <th>Address: </th>
                <td>
                    <textarea name="address"><?php echo $student['address']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <a href="read.php">Back</a>
                </td>
                <td style="text-align: center;">
                    <input type="submit">
                </td>
            </tr>
        </table>

    </form>
</body>

</html>
