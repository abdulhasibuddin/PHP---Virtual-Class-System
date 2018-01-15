<!DOCTYPE html>
<html>
<head>
	<title>Video</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/video.css">
	<link rel="stylesheet" type="text/css" href="../css/gridView.css">
</head>
<body>
	<?php include 'navbar.php';?>
	<div style="margin-top: 85px;">
		<?php include 'searchBar.php';?>
	</div>

	<?php 
		session_start();
		$video = '';
		$count = 0;
	?>
	<div class="gridView">
		<a href="playVideo.php" class="fill_div">
			<?php $video = '../../Content/videos/Developing a Dynamic Website 2014 - Part 3 - Setting up the Project.mp4';
				if (!isset($_SESSION['video']) and $count == 0) {
					$_SESSION['video'] = $video;
					$count = $count+1;
				}
			?>
			<video class="videos"><source src="<?php echo $video;?>" type="video/mp4"></video>
		</a>
	</div>
	<div class="gridView">
		<a href="playVideo.php" class="fill_div">
			<?php
				//session_destroy(); 
				$video = '../../Content/videos/PHP Security Pt 1.mp4';
				if (!isset($_SESSION['video']) and $count == 0) {
					$_SESSION['video'] = $video;
					$count = $count+1;
				}
			?>
			<video class="videos"><source src="<?php echo $video;?>" type="video/mp4"></video>
		</a>
	</div>
	<div class="gridView">
		<a href="#" class="fill_div"></a>
	</div>
	<div class="gridView">
		<a href="#" class="fill_div"></a>
	</div>
	<div class="gridView">
		<a href="#" class="fill_div"></a>
	</div>
	<div class="gridView">
		<a href="#" class="fill_div"></a>
	</div>
</body>
</html>
