<?php
require 'connection.php';

$studentListSql = "SELECT * FROM students ORDER BY name ASC";
$response = mysqli_query($connection, $studentListSql);

$students = array();

if (mysqli_num_rows($response) > 0) {
    while ($row = mysqli_fetch_assoc($response)) {
        array_push($students, $row);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student list</title>
</head>

<body>

    <h3>Students list</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student) { ?>
                <tr>
                    <td><?php echo $student['id']; ?> </td>
                    <td><?php echo ucfirst($student['name']); ?> </td>
                    <td><?php echo $student['email']; ?> </td>
                    <td><?php echo $student['phone_number']; ?> </td>
                    <td><?php echo ucfirst($student['gender']); ?> </td>
                    <td><?php echo $student['date_of_birth']; ?> </td>
                    <td><?php echo $student['address']; ?> </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</body>

</html>
