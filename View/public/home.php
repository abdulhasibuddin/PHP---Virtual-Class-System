<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<link rel="stylesheet" type="text/css" href="../css/gridView.css">
</head>
<body>
	<?php include 'navbar.php';?>
	<div class="liveImage">
		<div class="slideshow">
			<div class="imageSlide">
				<img src="../images/math-pictures-wallpapers.png" class="image">
				<div class="transBox" style="opacity: 0.4">
					<div class="text">Mathematics</div>
				</div>
			</div>
			<div class="imageSlide">
				<img src="../images/physics-2.jpg" class="image">
				<div class="transBox">
					<div class="text">Physics</div>
				</div>
			</div>
			<div class="imageSlide">
				<img src="../images/astronomy.jpg" class="image">
				<div class="transBox">
					<div class="text">Astronomy</div>
				</div>
			</div>
			<div class="imageSlide">
				<img src="../images/chemistry.png" class="image">
				<div class="transBox">
					<div class="text">Chemistry</div>
				</div>
			</div>
			<div class="imageSlide">
				<img src="../images/cse.jpg" class="image">
				<div class="transBox">
					<div class="text">Computer Science & Engineering</div>
				</div>
			</div>
			<div class="imageSlide">
				<img src="../images/biology.jpg" class="image">
				<div class="transBox">
					<div class="text">Biology</div>
				</div>
			</div>
		</div>
		<div style="text-align: center;">
			<span class="circle"></span>
			<span class="circle"></span>
			<span class="circle"></span>
			<span class="circle"></span>
			<span class="circle"></span>
			<span class="circle"></span>
		</div>
		<script type="text/javascript" src="../javascript/home.js"></script>
	</div>

	<?php include 'searchBar.php';?>

	<!--<div class="gridView">
		<a href="#" class="fill_div"><p>PDF</p></a>
	</div>
	<div class="gridView">
		<a href="video.php" class="fill_div"><p>VIDEO</p></a>
	</div>
	<div class="gridView">
		<a href="#" class="fill_div"><p>AUDIO</p></a>
	</div>
	<div class="gridView">
		<a href="#" class="fill_div"><p>Q&A</p></a>
	</div>
	<div class="gridView">
		<a href="#" class="fill_div" style="font-size: 25px;"><p>USEFUL<br>RESOURCES</p></a>
	</div>-->
	<?php include 'footer.php';?>
</body>
</html>
