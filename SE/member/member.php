<?php
	//require 'member2.php';
	//This file executes if the session 'user' is set i.e. an autheticated user exists::
	//This file is required in 'resetAccount2.php'
	require '../login(08.09.2017)_session/model/config.php';
	include '../login(08.09.2017)_session/content/session.php';
	session_set_cookie_params(time()+$lifetime, $path, $domain, $secure, $httponly);
	session_start(); //Start session
	session_regenerate_id(true); //Generates new session at each page load
	//require 'member2.php';
	$_SESSION['tutorial'] = "";
	$user = ""; //Username of the current session will be assigned in this variable

	//If session 'user' is set (i.e. an autheticated user exists), print it; else go to the login page::
	if(isset($_SESSION['email'])){
		$user = $_SESSION['email']; //Getting username from the current session
		require 'member2.php';
		echo "<div style='text-align: right; color: indigo;'><h4>" . $user . "</h4></div>"; //print the username on the top-right corner of the page
		//echo "<h1 style='color:green'>Welcome " . $user ."</h1><h2 style='color:green;'>You're now Logged In!</h2>"; //Welcome mssage for the authenticated user
	}
	else{
		header("location: ../login(08.09.2017)_session/view/index.php");
	}

	$areaList = $sub_areaList = $selectedArea = $existingAreas = $selectedSub_Area = $newTutorial = "";
	$menu = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Membership Forum</title>
</head>
<body>
	<!--'POST' method prevents data from exposing on the url bar-->
	<!--Don't use $_SERVER['PHP_SELF'] as it is vulnerable to Cross-Site Scripting(XSS)-->
	<!--If you have to use $_SERVER['PHP_SELF'], then use it as htmlspecialchars($_SERVER['PHP_SELF'])-->
	<form action="" method="post">
		<div id="table"><h3>Edit Tutorial</h3>
			<div id="row">
				<div id="column1">Area:</div>
				<div id="column2">
					<select name="areaElements_Edit">
						<?php
							$query = "SELECT * FROM area";
							$stmt = $conn->prepare($query); //Processing prepared statement
							//$stmt->bind_param("s", $eMail); //Binding parameters
							$stmt->execute(); //Executing prepared statement
							$result = $stmt->get_result(); //Get the result
							$result->fetch_all(); //Fetch all the column values of the selected row
							$stmt->close(); //Closing prepared statement
							//$conn->close(); //Close database connection

							foreach ($result as $element) {
								$i++;
								$res = $element['area'];
								$menu .= '<option value="'.$res.'">'.$res.'</option>';
							}
							echo $menu;
							$menu = "";
							echo "</select></div>";
						?>
					</select>
					<input type="submit" name="areabtn_Edit" value="Select Area">
					<?php
						if(isset($_POST['areabtn_Edit'])){
							$selectedArea = $_POST['areaElements_Edit'];
							//echo "<br>selectedArea : ".$selectedArea;
							$menu = "";
							$query = "SELECT * FROM $selectedArea";//sub_area WHERE area = ?";
							$stmt = $conn->prepare($query); //Processing prepared statement
							//$stmt->bind_param("s", $selectedArea); //Binding parameters
							$stmt->execute(); //Executing prepared statement
							$result = $stmt->get_result(); //Get the result
							$result->fetch_all(); //Fetch all the column values of the selected row
							$stmt->close(); //Closing prepared statement
							$conn->close(); //Close database connection

							foreach ($result as $element) {
								$menu .= "<option>".$element['sub_area']."</option>";
							}
							//echo $menu;
							//echo "</select></div>";
						}
					?>
				</div>
			</div>
			<div id="row">
				<div id="column1">Sub-area:</div>
				<div id="column2">
					 <select name="sub_areaElement_Edit">
						<?php
							echo $menu;
							echo "</select></div>";
							$menu = "";
						?>
					</select>
					<input type="submit" name="sub_areaBtn_Edit" value="Select Sub-area">
					<?php
						if(isset($_POST['sub_areaBtn_Edit'])){
							$selectedSub_Area = $_POST['sub_areaElement_Edit'];
							//echo "<br>selectedArea : ".$selectedArea;
							$menu = "";
							$query = "SELECT * FROM $selectedSub_Area";//sub_area WHERE area = ?";
							$stmt = $conn->prepare($query); //Processing prepared statement
							//$stmt->bind_param("s", $selectedArea); //Binding parameters
							$stmt->execute(); //Executing prepared statement
							$result = $stmt->get_result(); //Get the result
							$result->fetch_all(); //Fetch all the column values of the selected row
							$stmt->close(); //Closing prepared statement
							$conn->close(); //Close database connection

							foreach ($result as $element) {
								$menu .= "<option>".$element['tutorial_name']."</option>";
							}
							//echo $menu;
							//echo "</select></div>";
						}
					?>
				</div>
			</div>
			<div>
				<div id="column1">Tutorial:</div>
				<div id="column2">
					 <select name="TutorialElement">
						<?php
							echo $menu;
							echo "</select></div>";
						?>
					</select>
					<input type="submit" name="edit_TutorialBtn" value="EDIT TUTORIAL!">
					<?php
						if(isset($_POST['edit_TutorialBtn'])){
							$_SESSION['tutorial'] = $_POST['TutorialElement'];
							header("location: ../tutorial/tutorial.php");
						}
					?>
				</div>
			</div>
		</div>
		<br><?php//------------------------------------------------------------------------------?>
		<div id="table"><h3>Add New Tutorial</h3>
			<div id="row">
				<div id="column1">Tutorial Name:</div>
				<div id="column2">
					<input type="text" name="tutorialName">
				</div>
			</div>
			<div id="row">
				<div id="column1">Area:</div>
				<div id="column2">
					<select name="areaElements">
						<?php
							$query = "SELECT * FROM area";
							$stmt = $conn->prepare($query); //Processing prepared statement
							//$stmt->bind_param("s", $eMail); //Binding parameters
							$stmt->execute(); //Executing prepared statement
							$result = $stmt->get_result(); //Get the result
							$result->fetch_all(); //Fetch all the column values of the selected row
							$stmt->close(); //Closing prepared statement
							//$conn->close(); //Close database connection

							foreach ($result as $element) {
								$i++;
								$res = $element['area'];
								$menu .= '<option value="'.$res.'">'.$res.'</option>';
							}
							echo $menu;
							$menu = "";
							echo "</select></div>";
						?>
					</select>
					<input type="submit" name="areabtn" value="Select">
					<?php
						if(isset($_POST['areabtn'])){
							$selectedArea = $_POST['areaElements'];
							//echo "<br>selectedArea : ".$selectedArea;
							$menu = "";
							$query = "SELECT * FROM $selectedArea";//sub_area WHERE area = ?";
							$stmt = $conn->prepare($query); //Processing prepared statement
							//$stmt->bind_param("s", $selectedArea); //Binding parameters
							$stmt->execute(); //Executing prepared statement
							$result = $stmt->get_result(); //Get the result
							$result->fetch_all(); //Fetch all the column values of the selected row
							$stmt->close(); //Closing prepared statement
							$conn->close(); //Close database connection

							foreach ($result as $element) {
								$menu .= "<option>".$element['sub_area']."</option>";
							}
							//echo $menu;
							//echo "</select></div>";
						}
					?>
				</div>
			</div>
			<div id="row">
				<div id="column1">Sub-area:</div>
				<div id="column2">
					 <select name="sub_areaElement">
						<?php
							echo $menu;
							echo "</select></div>";
						?>
					</select>
					<input type="submit" name="sub_areaBtn" value="CREATE TUTORIAL!">
				</div>
			</div>
		</div>
		<br>
		<div id="table2"><h3>Add New Area</h3>
			<div id="row2">
				<div id="col1">Area: </div>
				<div id="col2">
					<input type="text" name="newArea">
				</div>
			</div>
			<div id="row2">
				<div>
					<input type="submit" value="Add New Area">
				</div>
			</div>
		</div>
		<div id="table3"><h3>Add New Sub-area</h3>
			<div id="row3">
				<div id="column1">Area:</div>
				<div id="column2">
					<select name="existing_Area">
						<?php
							$menu = "";
							$query = "SELECT * FROM area";
							$stmt = $conn->prepare($query); //Processing prepared statement
							//$stmt->bind_param("s", $eMail); //Binding parameters
							$stmt->execute(); //Executing prepared statement
							$result = $stmt->get_result(); //Get the result
							$result->fetch_all(); //Fetch all the column values of the selected row
							$stmt->close(); //Closing prepared statement
							//$conn->close(); //Close database connection
							$i = 0;
							foreach ($result as $element) {
								$i++;
								$res = $element['area'];
								$menu .= '<option value="'.$res.'">'.$res.'</option>';
							}
							echo $menu;
							$menu = "";
							echo "</select></div>";
						?>
					</select>
					<!--<input type="submit" name="ExistingAreaBtn" value="Select Existing Area">-->
				</div>
			<div id="row3">
				<div id="col1">Sub-area: </div>
				<div id="col2">
					<input type="text" name="newSub_area">
				</div>
			</div>
			<div id="row3">
				<div>
					<input type="submit" name="ExistingAreaBtn" value="Add New Sub-area">
					<!--<input type="submit" value="Add New Sub-area">-->
				</div>
			</div>
		</div>
	</div>
		<footer id="footerId"><a href="../login(08.09.2017)_session/content/logOut.php"><strong>Logout</strong></a></footer> <!--Log-out link-->
	</form>
</body>
</html>
