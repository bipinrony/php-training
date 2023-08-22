<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $allowedFileTypes = array('image/jpg', 'image/jpeg', 'image/png'); // check file type 
    if (in_array($_FILES["file_to_upload"]["type"], $allowedFileTypes)) {
        $filesize = $_FILES["file_to_upload"]["size"] / 1024;
        if ($filesize <= 120) { // check file size 
            $fileName = time() . $_FILES["file_to_upload"]["name"];
            $uploadDir = 'uploads/';
            $upladedFilename = $uploadDir . $fileName;
            if (file_exists($upladedFilename)) { // check duplicate file 
                echo "File exists with same name";
            } else {
                $isUploaded = move_uploaded_file(
                    $_FILES["file_to_upload"]["tmp_name"],
                    $upladedFilename
                );
                if ($isUploaded) {
                    echo $_FILES["file_to_upload"]["name"] . " uploaded successfully";
                } else {
                    echo "file was not uploaded";
                }
            }
        } else {
            echo "File size must be less than or eqaul to 120kb";
        }
    } else {
        echo "Invalid file uploaded";
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
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file_to_upload">
        <input type="submit">
    </form>
</body>

</html>
