<?php
	require '../login(08.09.2017)_session/model/config.php';
	include '../login(08.09.2017)_session/content/session.php';
	session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start();
	session_regenerate_id(true);

	//$_SESSION['tutorial'] = "";
	$superAdmin = $admin = "";
	//$areaList = $sub_areaList = $selectedArea = $existingAreas = $selectedSub_Area = $newTutorial = "";
	$adminMsg = "";

	if(isset($_SESSION['admin'])){
		$admin = $_SESSION['admin'];
		echo "<div style='text-align: right; color: indigo;'><h4>" . $admin . "</h4></div>";
		require 'admin2.php';
	}
	else{
		header("location: ./../login(08.09.2017)_session/view/index.php");
	}
	//require 'admin2.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="../css/navbar.css"> -->
	<style type="text/css">
		body{
			margin: 0;
			background-color: #ccffdd;
		}
		form{
			/*margin-top: 5%;*/
			align-content: center; 
			 
			padding-top: 1%; 
			padding-left: 35%; 
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
		#column1{
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
			width: 40%;
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
	<form action="" method="post">
		<div id="table">
			<div id="row"><h3>Member Log</h3>
				<div id="column1">Member-list:</div>
				<div id="column2">
					<select id="select" name="memberElements_Edit">
						<?php
							echo $member_menu;
							echo "</select></div>";
						?>
					</select>
					<input id="button" type="submit" name="memberbtn_Remove" value="Remove Member"><br>
					<input id="button" type="submit" name="memberbtn_Add" value="Add Admin">
				</div>
			</div>
		</div>
		<h4>********************************************</h4>
		<footer id="footerId">
			<input id="button" type="submit" name="logout" value="Log-out">
		</footer>
	</form>
</body>
</html>