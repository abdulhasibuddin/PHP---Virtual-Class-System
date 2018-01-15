<?php
	require '../login(08.09.2017)_session/model/config.php';
	include '../login(08.09.2017)_session/content/session.php';
	session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start();
	session_regenerate_id(true);

	$_SESSION['tutorial'] = "";
	$user = $adminMsg = "";
	$areaList = $sub_areaList = $selectedArea = $existingAreas = $selectedSub_Area = $newTutorial = "";

	if(isset($_SESSION['email'])){
		$user = $_SESSION['email'];
		echo "<div style='text-align: right; color: indigo;'><h4>" . $user . "</h4></div>";
		require 'member2.php';
	}
	else{
		header("location: ../login(08.09.2017)_session/view/index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Membership Forum</title>
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
			<label style="color: red; font-style: italic; font-weight: bold;"><?php echo $adminMsg; ?></label>
			<br>
			<input id="button" type="submit" name="adminBtn" value="Log-in as Admin">
			<h4>********************************************</h4>
		<div id="table">
			<div id="row"><h3>Edit Tutorial</h3>
				<div id="column1">Area:</div>
				<div id="column2">
					<select id="select" name="areaElements_Edit">
						<?php
							echo $area_menu;
							echo "</select></div>";
						?>
					</select>
					<input id="button" type="submit" name="areabtn_Edit" value="Select Area">
				</div>
			</div>
			<div id="row">
				<div id="column1">Sub-area:</div>
				<div id="column2">
					 <select id="select" name="sub_areaElement_Edit">
						<?php
							echo $subarea_menu;
							echo "</select></div>";
						?>
					</select>
					<div id="row">
						<div id="column1" style="margin-top: 1%;">Tutorial type:</div>
						<div id="column2" style="margin-bottom: 1%;">
							<input type="radio" name="tutorialType_Edit" value="general">general
							<input type="radio" name="tutorialType_Edit" value="video">video
							<input type="radio" name="tutorialType_Edit" value="audio">audio
						</div>
					</div>
					<input id="button" type="submit" name="sub_areaBtn_Edit" value="Select Sub-area">
				</div>
			</div>
			<div>
				<div id="column1">Tutorial:</div>
				<div id="column2">
					 <select id="select" name="TutorialElement">
						<?php
							echo $tutorial_menu;
							echo "</select></div>";
						?>
					</select>
					<input id="button" type="submit" name="edit_TutorialBtn" value="EDIT TUTORIAL!">
				</div>
			</div>
		</div>
		<h4>********************************************</h4>
		<div id="table"><h3>Add New Tutorial</h3>
			<div id="row">
				<div id="column1">Tutorial Name:</div>
				<div id="column2">
					<input id="text" type="text" name="tutorialName">
				</div>
			</div>
			<div id="row">
				<div id="column1">Area:</div>
				<div id="column2">
					<select id="select" name="areaElements">
						<?php
							echo $area_menu;
							echo "</select></div>";
						?>
					</select>
					<input id="button" type="submit" name="areabtn" value="Select">
				</div>
			</div>
			<div id="row">
				<div id="column1">Sub-area:</div>
				<div id="column2">
					 <select id="select" name="sub_areaElement">
						<?php
							echo $subarea_menu;
							echo "</select></div>";
						?>
					</select>
					<!--<input id="button" type="submit" name="sub_areaBtn" value="CREATE TUTORIAL!">-->
				</div>
			</div>
			<div id="row">
				<div id="column1" style="margin-top: 1%;">Tutorial Type:</div>
				<div id="column2" style="margin-bottom: 1%;">
					<input type="radio" name="tutorialType" value="general">general
					<input type="radio" name="tutorialType" value="video">video
					<input type="radio" name="tutorialType" value="audio">audio
				</div>
				<input id="button" type="submit" name="create_TutorialBtn" value="CREATE TUTORIAL!">
			</div>
		</div>
		<h4>********************************************</h4>
		<div id="table2"><h3>Add New Area</h3>
			<div id="row2">
				<div id="col1">Area: </div>
				<div id="col2">
					<input id="text" type="text" name="newArea">
				</div>
			</div>
			<div id="row2">
				<div>
					<input id="button" type="submit" value="Add New Area">
				</div>
			</div>
		</div>
		<h4>********************************************</h4>
		<div id="table3"><h3>Add New Sub-area</h3>
			<div id="row3">
				<div id="column1">Area:</div>
				<div id="column2">
					<select id="select" name="existing_Area">
						<?php
							echo $area_menu;
							echo "</select></div>";
						?>
					</select>
				</div>
			<div id="row3">
				<div id="col1">Sub-area: </div>
				<div id="col2">
					<input id="text" type="text" name="newSub_area">
				</div>
			</div>
			<div id="row3">
				<div>
					<input id="button" type="submit" name="ExistingAreaBtn" value="Add New Sub-area">
				</div>
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