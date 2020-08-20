<?php
	require 'functions.php';



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js" ></script>
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<title>JeVAN NEWS</title>
</head>
<body>
	<style type="text/css">
		@font-face{
			font-family: damn;
			src:url(Anders.ttf);
		}
		@font-face{
			font-family: damn1;
			src:url(koliko.ttf);
		}
		@font-face{
			font-family: damn2;
			src:url(Genera-AltLight.ttf);
		}
		@font-face{
			font-family: damn3;
			src:url(Dosis-Regular.ttf);
		}
		@font-face{
			font-family: damn4;
			src:url(Moon 2.0 Regular 400.ttf);
		}
	</style>
	<header>
		<div class="container"  style="background-color: black;">
			<div class="row">
				<div class="col-md-4 col-sm-12 col-12">
					<h2 class="my-md-3 site-title" style="font-family: damn;"> <a class="navbar-brand" href="index.php"><img src="image/logo.png" width="30" height="30"><bold>JEVAN</bold></a></h2>
				</div>
				<div class="col-md-4 col-sm-12 col-12">
					<div class="container-fluid p-0">
						<nav class="navbar  navbar-expand-lg navbar-light text-white sticky-top">
						    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						   		<span class="navbar-toggler-icon"></span>
						    </button>
						    <div class="collapse navbar-collapse" id="navbarSupportedContent">
						        <ul class="navbar-nav">
							        <li class="nav-item active">
							        	<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
							        </li>
							        <li class="nav-item">
							       		<a class="nav-link" href="my_account.php">About Us</a>
							        </li>
							        <li class="nav-item ">
							        	<a class="nav-link" href="all_products.php">All Products</a>
							        </li>		        
						        </ul>
						    </div>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="col">
				<div class="container-fluid p-0" style="background-color: black;">
					<nav class="navbar  navbar-expand-lg navbar-light text-white sticky-top">
					    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					   		<span class="navbar-toggler-icon"></span>
					    </button>

					    <div class="collapse navbar-collapse" id="navbarSupportedContent">
					        <ul class="navbar-nav" style="">
						        <?php echo getcats(); ?>        
					        </ul>
					    </div>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<div class="main">
		<div class="container">
			<div class="row">
				<div class="carousel slide" id="demo" data-ride="carousel">
					<ul class="carousel-indicators"> 
						<li data-target="#demo" data-slide-to="0" class="active"></li>
						<li data-target="#demo" data-slide-to="1"></li>
					</ul>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="image/5.jpg" style="width: 100%;height: 100%;">
							<i>SPORT</i>
						</div>
						<div class="carousel-item">
							<img src="image/6.jpg" style="width: 100%;height: 100%;">
							<i>SPORT</i>
						</div>
					</div><br><br><br>
					<a class="carousel-control-prev" href="#demo" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#demo" data-slide="prev">
						<span class="carousel-control-next-icon"></span>
					</a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-3">
					<h4 style="border-bottom: 1px solid blue;">Latest News</h4>
					<?php getsidepost(); ?>
				</div>
				<div class="col-9">
					<div class="container">
						<?php getfrontpost(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="container-fluid text-white" style="margin-top: 30px; background-color: black; padding:30px;font-family: damn;font-size: 10px;" data-aos="zoom-in-left">
		<div class="row">
			<div class="col">
				<h2 style="text-shadow: 3px solid red;"><bold>Evans is an Aspiring Web Developer...</bold></h2>
				<h4 style="color:grey;">No Pain, No Gain</h4><br><br>
				<h5><bold>CODED AND DESIGNED BY <img src="image/logo1.png" style=" width:30px; height:30px; padding: 0px 0px; margin: auto;  "> J-E</bold></h5>
			</div>
			<div class="col" data-aos="fade-left" style="font-family: damn2;">
				<div class="row" >
					<div class="col">
						<section>
							<ul>
								<h5><a href="#">Learn More</a> </h5>
								<h6><a href="#">How it works</a> </h6>
								<h6><a href="#">Meeting Tools</a> </h6>
								<h6><a href="#">Live Streaming</a> </h6>
								<h6><a href="#">Contact Methods</a> </h6>
								<h6><a href="#">Support</a> </h6>
							</ul>
						</section>
					</div>
					<div class="col">
						<section>
							<ul >
								<h5><a href="#"> About Us</a></h5>
								<h6><a href="#"> Team</a></h6>
								<h6><a href="#"> Features</a></h6>
								<h6><a href="#"> Privacy Policy</a></h6>
								<h6><a href="#"> Terms and Condition</a></h6>
							</ul>
						</section>
					</div>
					<div class="col">
						<section>
							<ul>
								<h5> <a href="#"> Support</a></h5>
								<h6><a href="#"> FAQ</a></h6>
								<h6><a href="#"> Contact Us</a></h6>
								<h6><a href="#"> Live Chat</a></h6>
								<h6><a href="#">Phone Call</a> </h6>
							</ul>
						</section>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid text-center text-white">
			<div class="row">
				<div class="col">
					<i class="fab fa-amazon" style="font-size:30px; color:white; padding: 10px; text-shadow:2px 2px 4px #000000;"></i>
					<i class="fab fa-app-store-ios" style="font-size:30px; color:white; padding: 10px; text-shadow:2px 2px 4px #000000;"></i>
					<i class="fab fa-whatsapp" style="font-size:30px; color:white; padding: 10px; text-shadow:2px 2px 4px #000000;"></i>
					<i class="fab fa-facebook" style="font-size:30px; color:blue; padding: 10px; text-shadow:2px 2px 4px #000000;"></i>
					<i class="fab fa-git-square" style="font-size:30px; color:green; padding: 10px; text-shadow:2px 2px 4px #000000;"></i><br>
					<i class="fab fa-500px"></i> JohnnyEvans Copyright<br>2019
				</div>
			</div>
		</div>
	</footer>
</body>
</html>