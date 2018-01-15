<?php
	//session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start(); //Start session
	//session_regenerate_id(true); //Generates new session at each page load

	$user = $tutorial = "";
	$existingItems = "";

	if(isset($_SESSION['email'])){
		$user = $_SESSION['email']; //Getting username from the current session
		echo "<div style='text-align: right; color: indigo; margin-top: 5%;'><h4>" . $user . "</h4></div>";
	}
	else{
		header("location: ../login(08.09.2017)_session/view/loginPage.php");
	}
	if(isset($_SESSION['tutorial'])){
		$tutorial = $_SESSION['tutorial'];
	}
	else{
		echo "<div style='text-align: center; color: red;'><h4>Tutorial is not set!</h4></div>";
	}
	require 'preview2.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $tutorial; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../view/css/preview.css">
	<link rel="stylesheet" type="text/css" href="../view/css/navbar.css">
</head>
<body>
	<form method="post" action="">
		<?php include '../view/public/navbar.php'; ?>
		<div id="table">
			<div id="row">
				<input type="submit" name="backPage" value="back" style="float: right;">
			</div>
			<div id="row">
				<div id="sidenav">
					<?php echo $existingItems; ?>
				</div>
				<div id="content">
					<?php echo $showContent; ?>
				</div>
			</div>
			<div id="footer">
				<?php include '../view/public/footer.php'; ?>
			</div>
		</div>
	</form>
</body>
</html>