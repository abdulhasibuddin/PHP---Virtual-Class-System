<?php
	require '../../login(08.09.2017)_session/model/config.php';
	include '../../login(08.09.2017)_session/content/session.php';
	session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start();
	session_regenerate_id(true);

	$areaList = $sub_areaList = $selectedArea = $existingAreas = $selectedSub_Area = $newTutorial = "";
	require '../selectTutorial2.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Select Tutorial</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
	<style type="text/css">
		body{
			margin: 0;
		}
		form{
			margin-top: 5%;
			align-content: center; 
			background-color: #ccffdd; 
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
	<?php include 'navbar.php'; ?>
	<form action="" method="post">
		<div id="table">
			<div id="row"><h2 style="">Select Tutorial</h2>
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
					<input id="button" type="submit" name="edit_TutorialBtn" value="SHOW TUTORIAL!">
				</div>
			</div>
		</div>
		<!-- <footer id="footerId">Copyright&copyKhulna University
		</footer> -->
	</form>
</body>
</html>