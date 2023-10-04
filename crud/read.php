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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title text-center text-uppercase text-warning">
                    <h3>Students list</h3>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td></td>
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
                            <td>
                                <a href="edit.php?student_id=<?php echo $student['id']; ?>"
                                    class="btn btn-primary">Edit</a>
                                <a href="delete.php?student_id=<?php echo $student['id']; ?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
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
            </div>
        </div>

    </div>

</body>

</html>
