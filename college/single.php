<?php
require 'database/connection.php';

if (isset($_GET['service_id'])) {
    $serviceSql = "SELECT * FROM services WHERE id = " . (int)$_GET['service_id'];
    $response = mysqli_query($connection, $serviceSql);
    if (mysqli_num_rows($response) > 0) {
        $service = mysqli_fetch_assoc($response);
    } else {
        die('Service not found');
    }
} else {
    die('Service ID is missing');
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>legend Website Template | single :: W3layouts</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="keywords"
        content="legend iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <link href='//fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
    <!---start-wrap---->

    <!---start-header---->
    <?php include 'header.html'; ?>
    <!---end-header---->
    <div class="wrap">
        <!---start-content---->
        <div class="content">
            <div class="singlelink">
                <div class="section group example">
                    <div class="col_1_of_1 span_1_of_1">
                        <h3><?php echo $service['heading']; ?> </h3>
                        <img src="<?php echo $service['service_image']; ?>">
                        <p><?php echo $service['service']; ?></p>
                    </div>
                </div>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
    <!---End-content---->
    <div class="clear"> </div>
    <!---start-footer---->
    <?php include 'footer.html'; ?>
    <!---end-footer---->
</body>

</html>
