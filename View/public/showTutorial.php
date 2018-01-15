<?php
	require '../../login(08.09.2017)_session/model/config.php';
	//session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start(); //Start session
	//session_regenerate_id(true); //Generates new session at each page load

	$user = $tutorial = $tutorialType = "";
	$existingItems = "";

	if (isset($_SESSION['tutorialName']) AND isset($_SESSION['tutorialType'])) {
		$tutorial = $_SESSION['tutorialName'];
		$tutorialType = $_SESSION['tutorialType'];
	}

	require '../showTutorial2.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $tutorial; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/preview.css">
	<link rel="stylesheet" type="text/css" href="../view/css/navbar.css">
</head>
<body>
	<form method="post" action="">
		<?php include 'navbar.php'; ?>
		<div id="table">
			<div id="row">
				<input type="submit" name="backPage" value="back" style="float: right;">
			</div>
			<div id="row">
				<div id="sidenav">
					<?php echo $existingItems; ?>
				</div>
				<div id="content">
					<h1 style="text-align: center; color: green;"><?php echo $tutorial; ?></h1>
					<h3  style="color: #002966"><?php echo $showContent; ?></h3>
				</div>
			</div>
			<div id="footer">
				<?php include 'footer.php'; ?>
			</div>
		</div>
	</form>
</body>
</html>