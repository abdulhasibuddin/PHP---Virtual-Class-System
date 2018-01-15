<?php
	//session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start(); //Start session
	//session_regenerate_id(true); //Generates new session at each page load
	//$area = $sub_area = "";
	require '../questions2.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Question&Answer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/navbar.css">
	<style type="text/css">
		body{
			margin: 0;
		}
		form{
			margin-top: 5%;
			/*align-content: center;*/ 
			background-color: #ccffdd; 
			padding-top: 1%; 
			padding-left: 5%; 
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
			width: 90%;
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
<body><?php include 'navbar.php'; ?>
	<form method="post" action="">
		<div id="table"><h2>People already asked:</h2>
			<div id="row">
				<div id="column1">Area:</div>
				<div id="column2">
					<select id="select" name="areaElements">
						<?php
							echo $area;
							//$area = "";
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
							echo $sub_area;
							echo "</select></div>";
						?>
					</select>
					<input id="button" type="submit" name="show_questionsBtn" value="See Existing Questions">
				</div>
			</div>
		</div>
		<h3>*******************************************************</h3><br><br>
		<div id="table"><h2>Ask a new question:</h2>
			<div id="row">
				<div id="column1">Area:</div>
				<div id="column2">
					<select id="select" name="areaElements_askNew">
						<?php
							echo $area;
							echo "</select></div>";
						?>
					</select>
					<input id="button" type="submit" name="areabtn_askNew" value="Select">
				</div>
			</div>
			<div id="row">
				<div id="column1">Sub-area:</div>
				<div id="column2">
					 <select id="select" name="sub_areaElement">
						<?php
							echo $sub_area;
							echo "</select></div>";
						?>
					</select>
				</div>
			</div>
			<div id="row">
				<div id="column1">E-mail:</div>
				<div id="column2">
					<input id="text" type="text" name="questioner_email">
				</div>
			</div>
			<div id="row">
				<div id="column1">Question:</div>
				<div id="column2"></div>
			</div>
			<div id="row">
				<div id="column1">
					<textarea id="text" name="questionText" style="height: 50px;"></textarea>
				</div>
				<div id="column2">
					<input id="button" type="submit" name="submit_questionBtn" value="Submit Question">
				</div>
			</div>
		</div>
	</form>
</body>
</html>