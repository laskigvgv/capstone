<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Compass Starter by Ariona, Rian</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

		<?php
		function get_connection(){
			$servername = "127.0.0.1";
			$username = "capstone";
			$password = "lazar";
			$dbname = "capston_project";

			$conn = mysqli_connect($servername, $username, $password, $dbname	);
			if(!$conn)
				return mysqli_connect_error();
			else
				return $conn;
		}


	?>

	</head>


	<body>
		
		<div class="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.html" class="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">Company name</h1>
							<small class="site-description">tagline goes here</small>
						</div>
					</a>

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item current-menu-item"><a href="news.php">7 Day Forecast</a></li>
							<li class="menu-item"><a href="live-cameras.html">Live cameras</a></li>
							<li class="menu-item"><a href="photos.html">Photos</a></li>
							<li class="menu-item"><a href="contact.html">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<main class="main-content">
				<div class="container" style="margin-bottom: 10px;">
					<div class="breadcrumb">
						<a href="index.php">Home</a>
						<span>7 Day Forecast</span>
					</div>
				</div>
				

				<div class="forecast-table">
				<div class="container">
					<div class="forecast-container">
						<div class="today forecast">
							<div class="forecast-header">
								
							<div class="day">
								<?php 
									$conn = get_connection();
									$sql = "SELECT one_week FROM week_forecast ORDER BY ind DESC LIMIT 1;";
									$result = $conn->query($sql)->fetch_assoc();
									$decoded_result = json_decode($result["one_week"],true);
									$day_in_week = date("l", strtotime($decoded_result["day_1"]["date_from_unix"]));
									echo date('l', strtotime($decoded_result["day_1"]["date_from_unix"]));

								?>
							</div>
								<div class="date">Last Measurement Time:	<?php 
									echo $result; ?>
								</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<!-- <div class="location">Gostivar</div>		 -->
								<div class="degree">
									<div class="num">
										<?php
											echo $result["tmp"]
										?>
										
										<sup>o</sup>C<img src="images/icons/temperature.gif" width="45px" height="45px" loop="infinite"></div>
								</div>
							</div>
						</div>
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day">Humidity</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
							<div class="degree">
									<div class="num">
										<?php
											echo $result["humm"]
										?> %	
									</div>
								</div>
							</div>
						</div>
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day">Air Pressure</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
							<div class="degree">
									<div class="num">
										<?php
											echo $result["press"]
										?>hPa
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
			</div>


			</main> <!-- .main-content -->

			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<form action="#" class="subscribe-form">
								<input type="text" placeholder="Enter your email to subscribe...">
								<input type="submit" value="Subscribe">
							</form>
						</div>
						<div class="col-md-3 col-md-offset-1">
							<div class="social-links">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</div>
						</div>
					</div>

					<p class="colophon">Copyright 2014 Company name. Designed by Themezy. All rights reserved</p>
				</div>
			</footer> <!-- .site-footer -->
		</div>
		
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>