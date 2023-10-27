<?php
session_start();
require_once '../../constants.php';
require_once SHOP_DIR . 'database/connection.php';
require_once SHOP_ADMIN_DIR . 'check-login.php';

if (isset($_GET['id'])) {
    $customerSql = "SELECT * FROM users WHERE id = " . (int)$_GET['id'];
    $response = mysqli_query($connection, $customerSql);
    if (mysqli_num_rows($response) > 0) {
        $customer = mysqli_fetch_assoc($response);
    } else {
        die('customer not found');
    }
} else {
    die('ID is missing');
}
$error = "";
$success = "";
$errors = array();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['name']) && $_POST['name'] != "") {
        $name = $_POST['name'];
    } else {
        array_push($errors, "Name is required");
    }

    if (isset($_POST['email']) && $_POST['email'] != "") {
        $email = $_POST['email'];
    } else {
        array_push($errors, "Email is required");
    }

    if (isset($_POST['password']) && $_POST['password'] != "") {
        $password = $_POST['password'];
    } else {
        array_push($errors, "Password is required");
    }

    if (isset($_POST['status']) && $_POST['status'] != "") {
        $status = $_POST['status'];
    } else {
        array_push($errors, "status is required");
    }

    if (isset($_POST['phone_number']) && $_POST['phone_number'] != "") {
        $phone_number = $_POST['phone_number'];
    } else {
        array_push($errors, "Phone number is required");
    }

    if (count($errors) == 0) {

        $updateCustomerSql = "UPDATE users SET 
        name = '" . $name . "' , 
        email = '" . $email . "', 
        password = '" . $password . "', 
        phone_number = '" . $phone_number . "', 
        status =" . (int)$status . " WHERE id=" . $_POST['customer_id'];


        $response = mysqli_query($connection, $updateCustomerSql);
        if ($response) {
            $success = "Update updated successfully.";
            header('Location: list.php');
        } else {
            $error = 'Failed to update Update:' . mysqli_error($connection);
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

    <title>Customer|Edit</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo ADMIN_BASE_URL; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo ADMIN_BASE_URL . 'css/sb-admin-2.min.css'; ?>" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include SHOP_ADMIN_DIR . 'common/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include SHOP_ADMIN_DIR . 'common/navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit</h1>
                        <a href="<?php echo ADMIN_BASE_URL . 'customer/list.php'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> List</a>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">New</h6>
                                </div>
                                <div class="card-body">

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

                                    <form class="user" method="post">
                                        <input type="hidden" name="customer_id" value="<?php echo $customer['id']; ?>">
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $customer['name']; ?>">
                                            </div>

                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $customer['email']; ?>">
                                            </div>

                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <label for="">Password</label>
                                                <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo $customer['password']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <label for="">Phone number</label>
                                                <input type="text" class="form-control" name="phone_number" placeholder="Phone number" value="<?php echo $customer['phone_number']; ?>">
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="">Status</label>
                                                <select name="status" class="form-control ">
                                                    <option value="1" <?php if ($customer['status'] == 1) {
                                                                            echo "selected";
                                                                        } ?>>
                                                        Active</option>
                                                    <option value="0" <?php if ($customer['status'] == 0) {
                                                                            echo "selected";
                                                                        } ?>>In
                                                        Active</option>
                                                </select>
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Save
                                        </button>

                                    </form>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php include SHOP_ADMIN_DIR . 'common/footer.php'; ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your
                        current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo ADMIN_BASE_URL; ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo ADMIN_BASE_URL; ?>vendor/bootstrap/js/bootstrap.bundle.min.js">
        </script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo ADMIN_BASE_URL; ?>vendor/jquery-easing/jquery.easing.min.js">
        </script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo ADMIN_BASE_URL; ?>js/sb-admin-2.min.js"></script>

</body>

</html>
