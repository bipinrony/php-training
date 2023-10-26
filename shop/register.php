<?php
session_start();
require_once 'constants.php';
require_once SHOP_DIR . 'database/connection.php';

if (isset($_SESSION['user'])) {
    header('Location: index.php');
}

$error = "";
$success = "";
$errors = array();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['name']) && $_POST['name'] != "") {
        $name = $_POST['name'];
    } else {
        array_push($errors, "name is required");
    }

    if (isset($_POST['email']) && $_POST['email'] != "") {
        $email = $_POST['email'];
    } else {
        array_push($errors, "email is required");
    }

    if (isset($_POST['password']) && $_POST['password'] != "") {
        $password = $_POST['password'];
    } else {
        array_push($errors, "password is required");
    }

    if (isset($_POST['phone_number']) && $_POST['phone_number'] != "") {
        $phone_number = $_POST['phone_number'];
    } else {
        array_push($errors, "Phone number is required");
    }

    $status = 1;

    if (count($errors) == 0) {

        $insertSql = "INSERT INTO users  VALUES (
            NULL,
            '" . $name . "',
            '" . $email . "',
            '" . $password . "',
            '" . $phone_number . "',
            " . $status . "
        )";
        $response = mysqli_query($connection, $insertSql);
        if ($response) {
            $success = "Registration done successfully.";
        } else {
            $error = 'Failed to register:' . mysqli_error($connection);
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body class="text-center">

    <main class="form-signin">
        <?php if ($error !== "") { ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <?php if ($success !== "") { ?>
            <div class="alert alert-primary">
                <?php echo $success; ?>
            </div>
        <?php } ?>

        <?php if (count($errors)) { ?>
            <ul class="alert alert-danger">
                <?php foreach ($errors as $error) {
                    echo "<li>" . $error . "</li>";
                } ?>

            </ul>
        <?php } ?>

        <form action="" method="post">
            <img class="mb-4" src="assets/favicon.ico" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe">
                <label for="name">Name</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="7894561230">
                <label for="phone_number">Phone number</label>
            </div>


            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
            <p class="mt-5 mb-3 text-muted">© <?php echo date('Y') ?></p>
        </form>
    </main>





</body>

</html>
