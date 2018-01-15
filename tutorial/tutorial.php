<?php
	//session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start(); //Start session
	//session_regenerate_id(true); //Generates new session at each page load
	//require 'tutorial2.php';
	$user = $tutorial = "";
	$existingItems = "";

	if(isset($_SESSION['email'])){
		$user = $_SESSION['email']; //Getting username from the current session
	}
	else{
		header("location: ../login(08.09.2017)_session/view/loginPage.php");
	}
	if(isset($_SESSION['tutorialName'])){
		$tutorial = $_SESSION['tutorialName'];
	}
	// else{
	// 	echo "<div style='text-align: center; color: red;'><h4>Tutorial is not set!</h4></div>";
	// }
	require 'tutorial2.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Tutorial</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="../css/navbar.css"> -->
	<style type="text/css">
		body{
			margin: 0;
		}
		form{
			/*margin-top: 5%;*/
			align-content: center; 
			background-color: #ccffdd; 
			padding-top: 1%; 
			padding-left: 15%; 
			padding-right: 15%;
			padding-bottom: 3%;
		}
		#button{
			width: 40%;
			padding: 1%;
			margin-top: .5%;
			margin-bottom: 4%;
			font-weight: bold;
			font-style: italic;
		}
		#col1{
			font-style: italic;
			font-weight: bold;
		}
		#select{
			width: 40%;
			padding: 1%;
			margin-top: 1%;
			margin-bottom: 1%;
			font-weight: bold;
			font-style: italic;
		}
		#text{
			width: 37.5%;
			padding: 1%;
			margin-top: 1%;
			margin-bottom: 1%;
			font-weight: bold;
			font-style: italic;
		}
/*		#footerId{
			margin-top: 40px;
			width: 100%;
			height: 15px;
			padding-top: 1px;
			background-color: grey;
			text-align: center;
			font-weight: bold;
		}*/
	</style>
</head>
<body>
	<form method="post" action="">
		<div style='text-align: right; color: indigo;'><h4><?php echo $user; ?></h4></div>
		<div style='text-align: center; color: #000066; font-style: italic;'><h1><?php echo $tutorial; ?></h1></div>
		<h3 style="font-style: italic;">Add new item</h3>
		<div id="table_addNavbarItem">
			<div id="row">
				<div id="col1">
					<input id="text" type="text" name="addNavbarItem">
				</div>
				<div id="col2">
					<input id="button" type="submit" name="addNavbarItem_Btn" value="Add Item to Navbar">
				</div>
			</div>
		</div>
		<br><h3 style="font-style: italic;">Insert/Edit Content</h3>
		<div id="table_EditContent">
			<div id="row">
				<div id="col1">
					<select id="select" name="existingItems">
						<?php
							echo $existingItems;
							$existingItems = "";
							echo "</select></div>";
						?>
					</select>
				<!--<input type="submit" name="saveContent" value="Save">-->
				<!--<input type="submit" name="selectedItem" value="Select">-->
				</div><br>
				<div id="col2">
						<textarea id="text" name="textContent" style="height: 350px; width: 100%;"></textarea>
				</div>
				<div id="row"><br>
					<div id="col1">
						<input id="button" type="submit" name="saveContent" value="Save">
					</div>
					<div id="col2">
						<input id="button" type="submit" name="previewContent" value="Preview">
					</div>
					<div id="">
						<input id="button" type="submit" name="backPage" value="back">
					</div>
				</div>
			</div>
		</div>
	</form>
</body>
</html>