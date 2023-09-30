<?php
require 'database/connection.php';

$success = "";
$error = "";
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['heading']) && $_POST['heading'] != "") {
        $heading = $_POST['heading'];
    } else {
        array_push($errors, "Heading is required");
    }

    if (isset($_FILES['service_image']) && $_FILES['service_image']['name'] != "") {
        $service_image = $_FILES['service_image'];
    } else {
        array_push($errors, "Service Image is required");
    }

    if (isset($_POST['service']) && $_POST['service'] != "") {
        $service = $_POST['service'];
    } else {
        array_push($errors, "Service is required");
    }



    if (count($errors) == 0) {
        $fileName = time() . $service_image['name'];
        $uploadPath = "images/";

        $uploadFileName =  $uploadPath . $fileName;

        move_uploaded_file($service_image['tmp_name'], $uploadFileName);

        $insertSql = "INSERT INTO services  VALUES (
            NULL,
            '" . $uploadFileName . "',
            '" . $heading . "',
            '" . $service . "'
        )";
        $response = mysqli_query($connection, $insertSql);
        if ($response) {
            $success = "Service created successfully.";
        } else {
            $error = 'Failed to create Service:' . mysqli_error($connection);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Service</title>
</head>

<body>
    <h3>Create Service</h3>
    <?php echo $success; ?>
    <?php echo $error; ?>

    <?php
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <th>Heading: </th>
                <td><input type="text" name="heading"></td>
            </tr>

            <tr>
                <th>Image: </th>
                <td><input type="file" name="service_image"></td>
            </tr>

            <tr>
                <th>Service: </th>
                <td>
                    <textarea name="service"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit">
                </td>
            </tr>
        </table>

    </form>
</body>

</html>
