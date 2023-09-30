<?php
require 'database/connection.php';

$serviceListSql = "SELECT * FROM services";
$response = mysqli_query($connection, $serviceListSql);

$services = array();

if (mysqli_num_rows($response) > 0) {
	while ($row = mysqli_fetch_assoc($response)) {
		array_push($services, $row);
	}
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>legend Website Template | services :: W3layouts</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="keywords" content="legend iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
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
			<div class="services">
				<h5>Our services</h5>
				<div class="section group">
					<?php foreach ($services as $service) { ?>
						<div class="listview_1_of_2 images_1_of_2 sta">
							<div class="listimg listimg_2_of_1">
								<img src="<?php echo $service['service_image']; ?>">
							</div>
							<div class="text list_2_of_1">
								<h3><?php echo $service['heading']; ?></h3>
								<p><?php echo substr($service['service'], 0, 95); ?>...</p>
								<div class="button">
									<span>
										<a href="single.php?service_id=<?php echo $service['id']; ?>">Read More</a>
									</span>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!---End-content---->
		<div class=" clear">
		</div>
	</div>
	<!---start-footer---->
	<?php include 'footer.html'; ?>
	<!---end-footer---->
</body>

</html>
