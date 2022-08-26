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
							<h1 class="site-title">Gostivar</h1>
							<small class="site-description">The City That Never Sleeps</small>
						</div>
					</a>

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item"><a href="news.php">7 Day Forecast</a></li>
							<li class="menu-item"><a href="photos.html">Photos</a></li>
							<li class="menu-item"><a href="contact.php">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<div class="hero" data-bg-image="images/city.jpeg">

			</div>
			
			<div class="forecast-table">
				<div class="container">
					<div class="forecast-container">
						<div class="today forecast">
							<div class="forecast-header">
								
							<div class="day">
								<?php 
									$conn = get_connection();
									$sql = "SELECT DAYNAME(DATE(time_stamp)) as week_day, TIME(time_stamp) as datum, temperature as tmp, humidity as humm, pressure as press FROM weather_data ORDER BY id DESC;";
									$result = $conn->query($sql)->fetch_assoc();

									echo $result["week_day"];

								?>
							</div>
								<div class="date">Last Measurement Time:	<?php 
									echo $result["datum"]; ?>
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
			<main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
						<h2 class="section-title">Gostivar At Night</h2>
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<div class="live-camera">
									<div style="width:100%; height:180px;"><img src="images/gostivar_winter2.jpeg" width="100%" height="100%"></div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="live-camera">
									<div style="width:100%; height:180px;"><img src="images/gostivar_winter.jpeg" width="100%" height="100%"></div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="live-camera">
								<div style="width:100%; height:180px;"><img src="images/gostivar_night1.jpeg" width="100%" height="100%"></div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="live-camera">
								<div style="width:100%; height:180px;"><img src="images/gostivar_night2.jpeg" width="100%" height="100%"></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="fullwidth-block" data-bg-color="#262936">
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<div class="news">
									<h3>Economy</h3>
									<p>Gostivar is a merchant city. From the second half of the 19th century, merchants started moving in and opening stores. There is also a market day, Tuesday. Merchants from Kruševo, Kičevo, Tetovo and Veles were the founders of the Gostivar merchant centre at that time. Today they have become electricians, mechanics workers, and Gostivar is a modern city.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="news">
									<h3>Geography</h3>
									<p>Gostivar, at an elevation of 535 meters, is situated on the foothills of one of the Šar Mountains. Near to Gostivar is the village of Vrutok, where the Vardar river begins at an altitude of 683 meters (2,241 ft) from the base of the Šar Mountains. Vardar River extends through Gostivar, cutting it in half, passes through the capital Skopje, goes through the country, enters Greece and finally reaches the Aegean Sea.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="news">
									<h3>Tourism</h3>
									<p>Leaving Gostivar on the way to Ohrid, the village Vrutok has the gorge of the biggest river in North Macedonia, Vardar, which is 388 km (241 mi) long and flows into the Aegean Sea, at Thessaloniki. Gostivar is one of the biggest settlements in the Polog valley. The Polog valley can be observed from the high lands of Mavrovo and Galičnik.

Approximately 26 km (16 mi) from Gostivar is a ski resort, "Zare Lazarevski", in the Mavrovo National Park.</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<h2 class="section-title">Application features</h2>
								<ul class="arrow-feature">
									<li>
										<h3>Natus error sit voluptatem accusantium</h3>
										<p>Doloremque laudantium totam rem aperiam Inventore veritatis et quasi architecto beatae vitae.</p>
									</li>
									<li>
										<h3>Natus error sit voluptatem accusantium</h3>
										<p>Doloremque laudantium totam rem aperiam Inventore veritatis et quasi architecto beatae vitae.</p>
									</li>
									<li>
										<h3>Natus error sit voluptatem accusantium</h3>
										<p>Doloremque laudantium totam rem aperiam Inventore veritatis et quasi architecto beatae vitae.</p>
									</li>
								</ul>
							</div>
							<div class="col-md-4">
								<h2 class="section-title">Weather analyssis</h2>
								<ul class="arrow-list">
									<li><a href="#">Accusantium doloremque laudantium rem aperiam</a></li>
									<li><a href="#">Eaque ipsa quae ab illo inventore veritatis quasi</a></li>
									<li><a href="#">Architecto beatae vitae dicta sunt explicabo</a></li>
									<li><a href="#">Nemo enim ipsam voluptatem quia voluptas</a></li>
									<li><a href="#">Aspernatur aut odit aut fugit, sed quia consequuntur</a></li>
									<li><a href="#">Magni dolores eos qui ratione voluptatem sequi</a></li>
									<li><a href="#">Neque porro quisquam est qui dolorem ipsum quia</a></li>
								</ul>
							</div>
							<div class="col-md-4">
								<h2 class="section-title">Awesome Photos</h2>
								<div class="photo-grid">
									<a href="#"><img src="images/thumb-1.jpg" alt="#"></a>
									<a href="#"><img src="images/thumb-2.jpg" alt="#"></a>
									<a href="#"><img src="images/thumb-3.jpg" alt="#"></a>
									<a href="#"><img src="images/thumb-4.jpg" alt="#"></a>
									<a href="#"><img src="images/thumb-5.jpg" alt="#"></a>
									<a href="#"><img src="images/thumb-6.jpg" alt="#"></a>
									<a href="#"><img src="images/thumb-7.jpg" alt="#"></a>
									<a href="#"><img src="images/thumb-8.jpg" alt="#"></a>
									<a href="#"><img src="images/thumb-9.jpg" alt="#"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main> <!-- .main-content -->

			<footer class="site-footer">
				<div class="container">
					<div class="row">
						

					<p class="colophon" style = "margin-left: 1%;">Copyright 2014 Company name. Designed by Themezy. All rights reserved</p>
				</div>
			</footer> <!-- .site-footer -->
		</div>
		
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>