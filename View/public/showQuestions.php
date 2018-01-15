<?php
	//session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start(); //Start session
	//session_regenerate_id(true); //Generates new session at each page load

	$showQuestions_subarea = "";
	if (isset($_SESSION['showQuestions_subarea'])) {
		$showQuestions_subarea = $_SESSION['showQuestions_subarea'];
		echo '<div style="color: indigo; font-weight: bold;">'.$showQuestions_subarea.'</div><br>';
	}

	require '../showQuestions2.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/navbar.css">
</head>
<body style="">
	<form method="post" action="">
		<?php include './navbar.php'; ?>
		<div style="margin-top: 5%;">
			<?php echo $show_questions; ?>
		</div>
		<div>
			<input type="submit" name="previousPage" value="Previous Page">
		</div>
	</form>
</body>
</html>