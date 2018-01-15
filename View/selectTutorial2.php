<?php
	$currentMember = $area_menu = $subarea_menu = $tutorial_menu = $selected_tutorial = "";
	$tutorialSrl = 1;
	$i = 0;
	$newArea = $newSub_area = $existing_Area = $selected_SubArea = $tutorialType = "";
	$newAreaErr = $newSub_areaErr = "";
	$errFlag = 0;

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
				header("location: showTutorial.php");
			}
			elseif($_SESSION['tutorialType'] == "video"){
				//header("location: showTutorial_video.php");
			}
			elseif($_SESSION['tutorialType'] == "audio"){
				//header("location: showTutorial_audio.php");
			}
		}
	}
?>