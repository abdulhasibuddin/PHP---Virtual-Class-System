<!DOCTYPE html>
<html>
<head>
	<title>Play</title>
</head>
<body>
	<?php
		session_start();
		if (isset($_SESSION['video'])) {
			$video = $_SESSION['video'];
		}
	?>
	<video width="80%" height="300px" controls>
		<source src="<?php echo $video;?>" type="video/mp4">
	</video>
	<?php session_destroy();?>
</body>
</html>
