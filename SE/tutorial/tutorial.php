<?php
	//session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start(); //Start session
	//session_regenerate_id(true); //Generates new session at each page load
	//require 'tutorial2.php';
	$user = $tutorial = "";

	if(isset($_SESSION['email'])){
		$user = $_SESSION['email']; //Getting username from the current session
		echo "<div style='text-align: right; color: indigo;'><h4>" . $user . "</h4></div>";
	}
	else{
		header("location: ../login(08.09.2017)_session/view/loginPage.php");
	}
	if(isset($_SESSION['tutorial'])){
		$tutorial = $_SESSION['tutorial'];
		echo "<div style='text-align: center; color: green;'><h1>" . $tutorial . "</h1></div>";
	}
	else{
		echo "<div style='text-align: center; color: red;'><h4>Tutorial is not set!</h4></div>";
	}
	require 'tutorial2.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Tutorial</title>
</head>
<body>
	<form method="post" action="">
		<div id="table_addNavbarItem">
			<div id="row">
				<div id="col1">
					<input type="text" name="addNavbarItem">
				</div>
				<div id="col2">
					<input type="submit" name="addNavbarItem_Btn" value="Add Item to Navbar">
				</div>
			</div>
		</div>
		<div id="table_EditContent">
			
		</div>
	</form>
</body>
</html>