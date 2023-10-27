<?php
session_start();
require_once 'constants.php';
require_once SHOP_DIR . 'database/connection.php';

if (isset($_SESSION['user'])) {
    header('Location: index.php');
}

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
        $loginSql = "SELECT * FROM `users` WHERE
        email='" . $email . "' AND password = '" . $password . "'";
        $loginResponse = mysqli_query($connection, $loginSql);

        if ($loginResponse !== false) {
            if (mysqli_num_rows($loginResponse)) {
                $user = mysqli_fetch_assoc($loginResponse);
                if ($user['status'] == 1) {
                    $_SESSION['user'] = $user;
                    header('Location: index.php');
                } else {
                    array_push($errors, "Your account is deactivated. Please contact admin.");
                }
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <?php if (count($errors)) { ?>
            <ul class="alert alert-danger">
                <?php
                foreach ($errors as $error) {
                    echo  "<li>" . $error . "</li>";
                }
                ?>
            </ul>
        <?php  }  ?>

        <form action="" method="post">
            <img class="mb-4" src="assets/favicon.ico" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">© <?php echo date('Y') ?></p>
        </form>
    </main>


</body>

</html>
