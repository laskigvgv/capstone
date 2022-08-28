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

		<?php 
			$conn = get_connection();
			$sql = "SELECT one_week FROM week_forecast ORDER BY ind DESC LIMIT 1;";
			$result = $conn->query($sql)->fetch_assoc();
			$decoded_result = json_decode($result["one_week"],true);
			
			$days = ['day_1','day_2','day_3','day_4','day_5','day_6','day_7'];
			$measurements = ['date_from_unix', 'temp_min', 'temp_max', 'humidity', 'pressure', 'feels_like_avg'];



			

			$day1 = date("l", strtotime($decoded_result["day_1"]["date_from_unix"]));
			$day2 = date("l", strtotime($decoded_result["day_2"]["date_from_unix"]));
			$day3 = date("l", strtotime($decoded_result["day_3"]["date_from_unix"]));
			$day4 = date("l", strtotime($decoded_result["day_4"]["date_from_unix"]));
			$day5 = date("l", strtotime($decoded_result["day_5"]["date_from_unix"]));
			$day6 = date("l", strtotime($decoded_result["day_6"]["date_from_unix"]));
			$day7 = date("l", strtotime($decoded_result["day_7"]["date_from_unix"]));

			$min_temp_day1 = $decoded_result["day_1"]["temp_min"];
			$min_temp_day2 = $decoded_result["day_2"]["temp_min"];
			$min_temp_day3 = $decoded_result["day_3"]["temp_min"];
			$min_temp_day4 = $decoded_result["day_4"]["temp_min"];
			$min_temp_day5 = $decoded_result["day_5"]["temp_min"];
			$min_temp_day6 = $decoded_result["day_6"]["temp_min"];
			$min_temp_day7 = $decoded_result["day_7"]["temp_min"];

			$max_temp_day1 = $decoded_result["day_1"]["temp_max"];
			$max_temp_day2 = $decoded_result["day_2"]["temp_max"];
			$max_temp_day3 = $decoded_result["day_3"]["temp_max"];
			$max_temp_day4 = $decoded_result["day_4"]["temp_max"];
			$max_temp_day5 = $decoded_result["day_5"]["temp_max"];
			$max_temp_day6 = $decoded_result["day_6"]["temp_max"];
			$max_temp_day7 = $decoded_result["day_7"]["temp_max"];

			$humidity_day1 = $decoded_result["day_1"]["humidity"];
			$humidity_day2 = $decoded_result["day_2"]["humidity"];
			$humidity_day3 = $decoded_result["day_3"]["humidity"];
			$humidity_day4 = $decoded_result["day_4"]["humidity"];
			$humidity_day5 = $decoded_result["day_5"]["humidity"];
			$humidity_day6 = $decoded_result["day_6"]["humidity"];
			$humidity_day7 = $decoded_result["day_7"]["humidity"];

			$pressure_day1 = $decoded_result["day_1"]["pressure"];
			$pressure_day2 = $decoded_result["day_2"]["pressure"];
			$pressure_day3 = $decoded_result["day_3"]["pressure"];
			$pressure_day4 = $decoded_result["day_4"]["pressure"];
			$pressure_day5 = $decoded_result["day_5"]["pressure"];
			$pressure_day6 = $decoded_result["day_6"]["pressure"];
			$pressure_day7 = $decoded_result["day_7"]["pressure"];

			$feels_like_avg_day1 = $decoded_result["day_1"]["feels_like_avg"];
			$feels_like_avg_day2 = $decoded_result["day_2"]["feels_like_avg"];
			$feels_like_avg_day3 = $decoded_result["day_3"]["feels_like_avg"];
			$feels_like_avg_day4 = $decoded_result["day_4"]["feels_like_avg"];
			$feels_like_avg_day5 = $decoded_result["day_5"]["feels_like_avg"];
			$feels_like_avg_day6 = $decoded_result["day_6"]["feels_like_avg"];
			$feels_like_avg_day7 = $decoded_result["day_7"]["feels_like_avg"];

?>

	</head>


	<body>
		
		<div class="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.php" class="branding">
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
							<li class="menu-item current-menu-item"><a href="news.php">News</a></li>
							<li class="menu-item"><a href="photos.html">Photos</a></li>
							<li class="menu-item"><a href="contact.php">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<main class="main-content">
				<div class="container">
					<div class="breadcrumb">
						<a href="index.php">Home</a>
						<span>News</span>
					</div>
				</div>
				

				<div class="forecast-table" style="margin-top: 1%;">
				<div class="container">
					<div class="forecast-container">
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day"><?php echo $day1; ?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
							<div class="degree">
									<div class="num">
										<div id = "min_temp" style="font-size: 12px;">Min. Temp: <?php echo $min_temp_day1; ?><sup>o</sup>C</div>
										<div id = "max_temp" style="font-size: 12px;">Max. Temp: <?php echo $max_temp_day1; ?><sup>o</sup>C</div>
										<div id = "humidity" style="font-size: 12px;">Humidity: <?php echo $humidity_day1; ?>%</div>
										<div id = "pressure" style="font-size: 12px;">Pressure: <?php echo $pressure_day1; ?>hPa</div>
										<div id = "feels_like_avg" style="font-size: 12px;">Feels Like: <?php echo $feels_like_avg_day1; ?><sup>o</sup>C</div>
									</div>
								</div>
							</div>
						</div>
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day"><?php echo $day2; ?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
							<div class="degree">
									<div class="num">
										<div id = "min_temp" style="font-size: 12px;">Min. Temp: <?php echo $min_temp_day2; ?><sup>o</sup>C</div>
										<div id = "max_temp" style="font-size: 12px;">Max. Temp: <?php echo $max_temp_day2; ?><sup>o</sup>C</div>
										<div id = "humidity" style="font-size: 12px;">Humidity: <?php echo $humidity_day2; ?>%</div>
										<div id = "pressure" style="font-size: 12px;">Pressure: <?php echo $pressure_day2; ?>hPa</div>
										<div id = "feels_like_avg" style="font-size: 12px;">Feels Like: <?php echo $feels_like_avg_day2; ?><sup>o</sup>C</div>
									</div>
								</div>
							</div>
						</div>
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day"><?php echo $day3; ?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
							<div class="degree">
									<div class="num">
										<div id = "min_temp" style="font-size: 12px;">Min. Temp: <?php echo $min_temp_day3; ?><sup>o</sup>C</div>
										<div id = "max_temp" style="font-size: 12px;">Max. Temp: <?php echo $max_temp_day3; ?><sup>o</sup>C</div>
										<div id = "humidity" style="font-size: 12px;">Humidity: <?php echo $humidity_day3; ?>%</div>
										<div id = "pressure" style="font-size: 12px;">Pressure: <?php echo $pressure_day3; ?>hPa</div>
										<div id = "feels_like_avg" style="font-size: 12px;">Feels Like: <?php echo $feels_like_avg_day3; ?><sup>o</sup>C</div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day"><?php echo $day4; ?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
							<div class="degree">
									<div class="num">
										<div id = "min_temp" style="font-size: 12px;">Min. Temp: <?php echo $min_temp_day4; ?><sup>o</sup>C</div>
										<div id = "max_temp" style="font-size: 12px;">Max. Temp: <?php echo $max_temp_day4; ?><sup>o</sup>C</div>
										<div id = "humidity" style="font-size: 12px;">Humidity: <?php echo $humidity_day4; ?>%</div>
										<div id = "pressure" style="font-size: 12px;">Pressure: <?php echo $pressure_day4; ?>hPa</div>
										<div id = "feels_like_avg" style="font-size: 12px;">Feels Like: <?php echo $feels_like_avg_day4; ?><sup>o</sup>C</div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day"><?php echo $day5; ?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
							<div class="degree">
									<div class="num">
										<div id = "min_temp" style="font-size: 12px;">Min. Temp: <?php echo $min_temp_day5; ?><sup>o</sup>C</div>
										<div id = "max_temp" style="font-size: 12px;">Max. Temp: <?php echo $max_temp_day5; ?><sup>o</sup>C</div>
										<div id = "humidity" style="font-size: 12px;">Humidity: <?php echo $humidity_day5; ?>%</div>
										<div id = "pressure" style="font-size: 12px;">Pressure: <?php echo $pressure_day5; ?>hPa</div>
										<div id = "feels_like_avg" style="font-size: 12px;">Feels Like: <?php echo $feels_like_avg_day5; ?><sup>o</sup>C</div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day"><?php echo $day6; ?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
							<div class="degree">
									<div class="num">
										<div id = "min_temp" style="font-size: 12px;">Min. Temp: <?php echo $min_temp_day6; ?><sup>o</sup>C</div>
										<div id = "max_temp" style="font-size: 12px;">Max. Temp: <?php echo $max_temp_day6; ?><sup>o</sup>C</div>
										<div id = "humidity" style="font-size: 12px;">Humidity: <?php echo $humidity_day6; ?>%</div>
										<div id = "pressure" style="font-size: 12px;">Pressure: <?php echo $pressure_day6; ?>hPa</div>
										<div id = "feels_like_avg" style="font-size: 12px;">Feels Like: <?php echo $feels_like_avg_day6; ?><sup>o</sup>C</div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day"><?php echo $day7; ?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
							<div class="degree">
									<div class="num">
										<div id = "min_temp" style="font-size: 12px;">Min. Temp: <?php echo $min_temp_day7; ?><sup>o</sup>C</div>
										<div id = "max_temp" style="font-size: 12px;">Max. Temp: <?php echo $max_temp_day7; ?><sup>o</sup>C</div>
										<div id = "humidity" style="font-size: 12px;">Humidity: <?php echo $humidity_day7; ?>%</div>
										<div id = "pressure" style="font-size: 12px;">Pressure: <?php echo $pressure_day7; ?>hPa</div>
										<div id = "feels_like_avg" style="font-size: 12px;">Feels Like: <?php echo $feels_like_avg_day7; ?><sup>o</sup>C</div>
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
						<p class="colophon">Copyright 2014 Company name. Designed by Themezy. All rights reserved</p>

					</div>

				</div>
			</footer> <!-- .site-footer -->
		</div>
		
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>