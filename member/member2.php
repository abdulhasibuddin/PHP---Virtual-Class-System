<?php
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	require '../login(08.09.2017)_session/model/config.php';

	$currentMember = $area_menu = $subarea_menu = $tutorial_menu = $selected_tutorial = "";
	$tutorialSrl = 1;
	$i = 0;
	$newArea = $newSub_area = $existing_Area = $selected_SubArea = $tutorialType = "";
	$newAreaErr = $newSub_areaErr = "";
	$errFlag = $isAdmin = 0;

	$query = "SELECT * FROM area";
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$i++;
			$res = $row['area'];
			$area_menu .= '<option value="'.$res.'">'.$res.'</option>';
		}
	}


	if($_SERVER['REQUEST_METHOD']=="POST"){

		//EDIT TUTORIAL::-------------------------------------------------------------
		if(isset($_POST['areabtn_Edit'])){
			$selectedArea = $_POST['areaElements_Edit'];
			//echo "<br>selectedArea : ".$selectedArea;
			$subarea_menu = "";
			$query = "SELECT sub_area.* FROM area, sub_area WHERE area.id = sub_area.area_id AND area.area = '$selectedArea'";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$subarea_menu .= "<option>".$row['sub_area']."</option>";
				}
			}
		}

		if(isset($_POST['tutorialType_Edit']) AND isset($_POST['sub_areaBtn_Edit'])){
			$selectedSub_Area = $_POST['sub_areaElement_Edit'];
			$tutorialType = $_POST['tutorialType_Edit'];
			//echo "<br>selectedArea : ".$selectedArea;
			$tutorial_menu = "";
			$query = "SELECT tutorial.* FROM sub_area, tutorial WHERE sub_area.id = tutorial.subarea_id AND sub_area.sub_area = '$selectedSub_Area' AND tutorial.type = '$tutorialType'";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$tutorial_menu .= "<option>".$row['tutorial_name']."</option>";
				}
			}
		}

		if(isset($_POST['edit_TutorialBtn'])){
			//$selectedSub_Area = $_POST['sub_areaElement_Edit'];
			$tutorialName = $_POST['TutorialElement'];
			//$tutorialType = $_POST['tutorialType_Edit'];

			$query = "SELECT tutorial.* FROM tutorial WHERE tutorial_name = '$tutorialName'";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$tutorialType = $row['type'];
				}
			}

			$_SESSION['tutorialName'] = $tutorialName;
			$_SESSION['tutorialType'] = $tutorialType;

			if($_SESSION['tutorialType'] == "general"){
				header("location: ../tutorial/tutorial.php");
			}
			elseif($_SESSION['tutorialType'] == "video"){
				header("location: ../tutorial/tutorial_video.php");
			}
			elseif($_SESSION['tutorialType'] == "audio"){
				header("location: ../tutorial/tutorial_audio.php");
			}
		}

		//ADD NEW TUTORIAL::----------------------------------------------------------
		if(isset($_POST['areabtn'])){
			$selectedArea = $_POST['areaElements'];
			$subarea_menu = "";
			$query = "SELECT sub_area.* FROM area, sub_area WHERE area.id = sub_area.area_id AND area.area = '$selectedArea'";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$subarea_menu .= "<option>".$row['sub_area']."</option>";
				}
			}
		}

		if(isset($_POST['tutorialName']) AND $_POST['tutorialName'] != "" AND isset($_POST['create_TutorialBtn']) AND isset($_POST['tutorialType'])){

			$selected_SubArea = $_POST['sub_areaElement'];
			$tutorialType = $_POST['tutorialType'];
			$newTutorial = $_POST['tutorialName'];
			
			$query = "SELECT * FROM sub_area WHERE sub_area = '$selected_SubArea'";
			$result = $conn->query($query);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$subarea_id = $row['id'];
				}
			}
			$query = "SELECT * FROM member WHERE email = '$user'";
			$result = $conn->query($query);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$membership_no = $row['membership_no'];
				}
			}

			$query = "INSERT INTO tutorial (subarea_id, tutorial_name, type, membership_no) VALUES (?, ?, ?, ?)";
			$stmt = $conn->prepare($query); //Processing prepared statement
			$stmt->bind_param("issi", $subarea_id, $newTutorial, $tutorialType, $membership_no); //Binding parameters
			$stmt->execute(); //Executing prepared statement
			$stmt->close(); //Closing prepared statement
			echo "<div style='color:green;'>New tutorial '".$newTutorial."' of type ".$tutorialType." is created successfully!</div>";

			/*if($conn->query($query) == TRUE){
				echo "<div style='color:green;'>Table ".$newTutorial." of type ".$tutorialType." has been created successfully!</div>";
			}
			elseif($newArea != ""){
				echo "<div style='color:red;'>Error creating table ".$newTutorial."!";
			}*/
		}

		//ADD NEW AREA::---------------------------------------------------------------
		if(isset($_POST['newArea']) AND $_POST['newArea'] != ""){
			$newArea = $_POST['newArea'];
			if(preg_match("/^[a-zA-Z_]$/", $newArea)) { //Regular expression comparison
				//If input is invalid::
				$newAreaErr =  "<div style='color:red;'>Only letters and (_) allowed!</div>";
				echo $newAreaErr;
			}
			else{

				$query = "INSERT INTO area (area) VALUES (?)";
				$stmt = $conn->prepare($query); //Processing prepared statement
				$stmt->bind_param("s", $newArea); //Binding parameters
				$stmt->execute(); //Executing prepared statement
				$stmt->close(); //Closing prepared statement

				echo "<div style='color:green;'>Area $newArea created successfully.</div>";
			}
		}

		//ADD NEW SUB_AREA::--------------------------------------------------------------
		if(!isset($_POST['existing_Area']) AND isset($_POST['newSub_area']) AND !empty($_POST['newSub_area'])){
			echo "Select area first!";
		}
		elseif(isset($_POST['ExistingAreaBtn']) AND isset($_POST['newSub_area'])) {
			$newSub_area = $_POST['newSub_area'];
			$existing_Area = $_POST['existing_Area'];
			$existing_AreaId = 0;
			echo "newSub_area=".$newSub_area."<br>existing_Area=".$existing_Area."<br>";

			$query = "SELECT * FROM area WHERE area='$existing_Area'";
			$result = $conn->query($query);
			if($result->num_rows > 0){
				while ($row = $result->fetch_assoc()) {
					$existing_AreaId = $row['id'];
				}
			}

			$query = "INSERT INTO sub_area (area_id, sub_area) VALUES (?, ?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("is", $existing_AreaId, $newSub_area); //Binding parameters
			$stmt->execute(); //Executing prepared statement
			$stmt->close();

			echo "<div style='color:green;'>Sub-area ".$newSub_area." created successfully!</div>";
		}

		if (isset($_POST['logout'])) {
			header("location: ./../login(08.09.2017)_session/content/logOut.php");
		}
		if (isset($_POST['adminBtn'])) {
			// if(isset($_SESSION['email'])){
			// 	$currentMember = $_SESSION['email'];
				$query = "SELECT admin.* FROM admin, member WHERE admin.membership_no = member.membership_no AND member.email = '$user'";
				$result = $conn->query($query);
				if($result->num_rows > 0){
					$_SESSION['admin'] = $user;
					//$isAdmin = 1;	
					header("location: ../login(08.09.2017)_session/view/loginPage.php");
				}
				else{
					$adminMsg = "You are not an admin!";
				}
			// }
		}
	}
?>