<?php
session_start();
require_once '../database/connection.php';

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['email']) && $_POST['email'] != "") {
        $email = $_POST['email'];
        if (strpos($_POST['email'], '@') == false) {
            array_push($errors, "Please enter valid email");;
        } else if (strpos($_POST['email'], '.') == false) {
            array_push($errors, "Please enter valid email");;
        }
    } else {
        array_push($errors, "email is required");
    }

    if (isset($_POST['password']) && $_POST['password'] != "") {
        $password = $_POST['password'];
    } else {
        array_push($errors, "password is required");
    }

    if (count($errors) == 0) {
        $loginSql = "SELECT * FROM `admin` WHERE
        email='" . $email . "' AND password = '" . $password . "'";
        $loginResponse = mysqli_query($connection, $loginSql);

        if ($loginResponse !== false) {
            if (mysqli_num_rows($loginResponse)) {
                $admin = mysqli_fetch_assoc($loginResponse);
                $_SESSION['admin'] = $admin;
                header('Location: dashboard.php');
            } else {
                array_push($errors, "Invalid login credential.");
            }
        } else {
            die('Error' . mysqli_error($connection));
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin|Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php if (count($errors)) { ?>
                                        <ul class="alert alert-danger">
                                            <?php
                                            foreach ($errors as $error) {
                                                echo  "<li>" . $error . "</li>";
                                            }
                                            ?>
                                        </ul>
                                    <?php  }  ?>


                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
