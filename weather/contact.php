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

	</head>


	<body>
		
		<div class="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.php" class="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">Gostivar</h1>
							<small class="site-description">Weather Statioin</small>
						</div>
					</a>

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item"><a href="news.php">7 Day Forecast</a></li>
							<li class="menu-item"><a href="photos.html">Photos</a></li>
							<li class="menu-item current-menu-item"><a href="contact.php">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<main class="main-content">
				<div class="container">
					<div class="breadcrumb">
						<a href="index.php">Home</a>
						<span>Contact</span>
					</div>
				</div>

				<div class="fullwidth-block">
					<div class="container">
						<div class="col-md-5">
							<div class="contact-details">
								<div class="map" data-latitude="41.8026" data-longitude="20.9089"></div>
								<div class="contact-info">
									<address>
										<img src="images/icon-marker.png" alt="">
										<p>Gostivar<br>
										Gostivar Macedonia</p>
									</address>
									
									<a href="#"><img src="images/icon-phone.png" alt="">+072 633 886</a>
									<a href="#"><img src="images/icon-envelope.png" alt="">zdravkoski.lazar@gmail.com</a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-md-offset-1">
							<h2 class="section-title">Contact us</h2>
							<p>If you are interested in our product and you want to have a personal weather station or you have any questions about our work dont hasitate to contact us via email. <br> 
							We will be in contact</p>
							<form action="#" method="POST" class="contact-form">
								<div class="row">
									<div class="col-md-6"><input name="first_name" type="text" placeholder="Your name..."></div>
									<div class="col-md-6"><input name="email" type="text" placeholder="Email Addresss..."></div>
								</div>
								
								<textarea name="email_body" placeholder="Message..."></textarea>
								<div class="text-right">
									<input type="submit" cols='40' rows='150' placeholder="Send message">
									<?php
										
										if (isset($_POST["first_name"]) && isset($_POST["email"])){
											if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
												$first_name = $_POST["first_name"];
												$email = $_POST["email"];
												$email_body = $_POST["email_body"];
												$to = "zdravkoski.lazar@gmail.com";
												$command = escapeshellcmd("python3 /var/www/html/capstone/send_mail.py " . $first_name . " " . $email . " " . escapeshellarg($email_body));
												shell_exec($command);
												
											}
											else{
												echo "invalid email address format";
											}
											
										}

										
									?>
								</div>
							</form>

						</div>
					</div>
				</div>
				
			</main> <!-- .main-content -->

			<footer class="site-footer">
				<div class="container">
					<div class="row">
						
					</div>

					<p class="colophon">Made By Lazar Zdravkoski</p>
				</div>
			</footer> <!-- .site-footer -->
		</div>
		
		<script src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>